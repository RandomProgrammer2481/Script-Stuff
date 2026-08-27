//References
const button = document.getElementById("diceRoll");
const displayTotalOne = [...document.querySelectorAll(".partOneTotal")];
const displayTotalTwo = document.getElementById("partTwoTotal");
const displayTotal = document.getElementById("total");

//Event listeners
if (button) {
  button.addEventListener("click", rollDice);
} else {
  console.log("no button found");
}

//Generates 5 numbers and saves them in array results[]
//then prints them to console
function rollDice() {
  let results = [];
  let diceDisplay = [...document.querySelectorAll(".diceResult")];
  let numberDisplay = [...document.querySelectorAll(".numberScore")];
  let specialDisplay = [...document.querySelectorAll(".specialScore")];

  for (let i = 0; i < 5; i++) {
    let randomNumber = Math.floor(Math.random() * 6 + 1);
    results.push(randomNumber);
  }
  console.log(results);

  let numberScores = calcNumberScores(results);
  let specialScores = calcSpecialScores(results);
  let specialScoresTotal = 0;
  let numberScoresTotal = 0;

  for (let i = 0; i < 7; i++) {
    specialScoresTotal += specialScores[i];
    numberScoresTotal += numberScores[i];
  }

  let totalScore = numberScoresTotal + specialScoresTotal;

  diceDisplay.forEach((el, index) => {
    el.textContent = results[index];
  });

  numberDisplay.forEach((el, index) => {
    // Has to be index + 1 bc numberScores[0] is always undefined
    el.textContent = numberScores[index + 1];
  });

  specialDisplay.forEach((el, index) => {
    el.textContent = specialScores[index];
  });

  displayTotalOne.forEach((el) => {
    el.textContent = numberScoresTotal;
  });

  displayTotalTwo.textContent = specialScoresTotal;
  displayTotal.textContent = totalScore;
}

// loops through all scores in results. and adds them to the position equal to the score.
function calcNumberScores(results) {
  let scores = [0, 0, 0, 0, 0, 0, 0];

  for (let i = 0; i < results.length; i++) {
    scores[results[i]] = scores[results[i]] + results[i];
  }

  return scores;
}

function calcSpecialScores(results) {
  let scores = [0, 0, 0, 0, 0, 0, 0];
  let resultsOrdered = [...results].sort((a, b) => a - b);
  let orderCount = 0;
  let duplicateCount = {
    1: 0,
    2: 0,
    3: 0,
    4: 0,
    5: 0,
    6: 0,
  };

  for (let i = 0; i < results.length; i++) {
    scores[6] += results[i];
    duplicateCount[results[i]]++;

    if (resultsOrdered[i] == resultsOrdered[i - 1] + 1) {
      orderCount++;
    }
  }

  //checks for yahtzee, four of a kind, and three of a kind
  if (Object.values(duplicateCount).includes(5)) {
    scores[5] = 50;
  } else if (Object.values(duplicateCount).includes(4)) {
    scores[1] = results.reduce((a, b) => a + b);
  } else if (Object.values(duplicateCount).includes(3)) {
    scores[0] = results.reduce((a, b) => a + b);
  }

  //auxillary check for full house
  if (
    Object.values(duplicateCount).includes(3) &&
    Object.values(duplicateCount).includes(2)
  ) {
    scores[2] = 25;
  }

  //check for streets
  if (orderCount >= 4) {
    scores[4] = 40;
  } else if (orderCount >= 3) {
    scores[3] = 30;
  }

  return scores;
}
