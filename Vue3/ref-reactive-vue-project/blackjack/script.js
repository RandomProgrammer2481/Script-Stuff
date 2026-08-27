const deck = {
    1: "hearts1", 2: "hearts2", 3: "hearts3", 4: "hearts4", 5: "hearts5",
    6: "hearts6", 7: "hearts7", 8: "hearts8", 9: "hearts9", 10: "hearts10",
    11: "hearts11", 12: "hearts12", 13: "hearts13",
    14: "diamonds1", 15: "diamonds2", 16: "diamonds3", 17: "diamonds4", 18: "diamonds5",
    19: "diamonds6", 20: "diamonds7", 21: "diamonds8", 22: "diamonds9", 23: "diamonds10",
    24: "diamonds11", 25: "diamonds12", 26: "diamonds13",
    27: "clubs1", 28: "clubs2", 29: "clubs3", 30: "clubs4", 31: "clubs5",
    32: "clubs6", 33: "clubs7", 34: "clubs8", 35: "clubs9", 36: "clubs10",
    37: "clubs11", 38: "clubs12", 39: "clubs13",
    40: "spades1", 41: "spades2", 42: "spades3", 43: "spades4", 44: "spades5",
    45: "spades6", 46: "spades7", 47: "spades8", 48: "spades9", 49: "spades10",
    50: "spades11", 51: "spades12", 52: "spades13"
};

let drawnCards = []
let dealerCards = []
let playerCards = []
let gameActive = false
let dealerScore = 0
let playerScore = 0
let turnCounter = 0

const dealerTotal = document.getElementById("dealerTotal")
const dealerCardsContainer = document.getElementById("dealerCards")
const playerTotal = document.getElementById("playerTotal")
const playerCardsContainer = document.getElementById("playerCards")
const hitButton = document.getElementById("hit")
const stayButton = document.getElementById("stay")
const replayButton = document.getElementById("replay")
const endGameText = document.getElementById("endGameText")

const hiddenElements = document.getElementsByClassName("hidden")

hitButton.addEventListener("click", () => hit(false))
stayButton.addEventListener("click", stay)
replayButton.addEventListener("click", replay)

function drawCard(isDealer) {
    let randomNumber = Math.floor(Math.random() * 52) + 1

    while (drawnCards.includes(randomNumber)) {
        randomNumber = Math.floor(Math.random() * 52) + 1
    }

    drawnCards.push(randomNumber)
    let card = deck[randomNumber]

    if (isDealer) {
        dealerCards.push(card)
        addCardToScreen(card, true)
    } else {
        playerCards.push(card)
        addCardToScreen(card, false)
    }
}

function hit(isDealer) {
    if (!gameActive) {
        deal();
    } else {
        drawCard(isDealer)
    }

    console.log(playerCards)
    console.log(dealerCards)


    playerScore = calcScore(playerCards)
    dealerScore = calcScore(dealerCards)
    dealerTotal.textContent = "Dealer Total: " + dealerScore
    playerTotal.textContent = "Player Total: " + playerScore
    console.log(playerScore)
    console.log(dealerScore)

    if (playerScore == 21 && turnCounter == 0) {
        endGame("win", "Congratulations! You Win! You got Blackjack")
    } else if (playerScore > 21) {
        endGame("lose", "Too bad! You Lose! You busted!")
    }

    if (!isDealer) {
        turnCounter += 1 
    }
}

function stay() {
    
    
    if (playerScore == 16) {
        while (dealerScore < 16) {
            hit(true)
        }
    } else {
        while (dealerScore < 17) {
            hit(true)
        }
    }

    if (dealerScore > 21) {
        endGame("win", "Congratulations! You Win! The Dealer busted!")
    } else if (dealerScore > playerScore && dealerScore == 21) {
        endGame("lose", "Too bad! You Lose! The Dealer got Blackjack!")
    } else if (dealerScore > playerScore) {
        endGame("lose", "Too bad! You lose! You didn't score high enough!")
    } else if (dealerScore < playerScore) {
        endGame("win", "Congratulations! You Win! Your score is higher!")
    } else if (dealerScore == playerScore) {
        endGame("draw", "It's a Draw! You have the same score!")
    }
}

function deal() {
    drawCard(false)
    drawCard(true)
    drawCard(false)

    hitButton.textContent = "Hit"

    gameActive = true
}

function calcScore(cardArray) {
    let score = 0
    let aceCounter = 0

    for (let i = 0; i < cardArray.length; i++) {
        let str = cardArray[i]
        let num = parseInt(str.replace(/[a-z]/gi, ""));

        if (num == 1) {
            score += 11
            aceCounter ++
        }
        else if (num > 10 && num < 14) {
            score += 10
        }
        else {
            score += num
        }

    }

    if (score > 21 && aceCounter > 0) {
        while (aceCounter > 0 && score > 21) {
            score -= 10
            aceCounter -= 1
        }
    }
    return score
}

function addCardToScreen(card, isDealer) {
    const img = document.createElement("img")
    img.src = "cards/" + card + ".png"
    
    if (isDealer) {
        document.getElementById("dealerCards").appendChild(img)
    } else {
        document.getElementById("playerCards").appendChild(img)
    }
}

function endGame(endState, text) {
    hitButton.style.display = "none"
    stayButton.style.display = "none"
   
    endGameText.textContent = text

   if (endState == "win") {
    endGameText.style.color = "green"
   } else if (endState == "lose") {
    endGameText.style.color = "red"
   } else if (endState == "draw") {
    endGameText.style.color = "orange"
   }

   for (let i = 0; i < hiddenElements.length; i++) {
    hiddenElements[i].style.display = "inline"
   }

}

function replay() {
    drawnCards = []
    dealerCards = []
    playerCards = []
    gameActive = false
    dealerScore = 0
    playerScore = 0
    turnCounter = 0

    while (dealerCardsContainer.firstChild) {
        dealerCardsContainer.removeChild(dealerCardsContainer.firstChild)
    }

    while (playerCardsContainer.firstChild) {
        playerCardsContainer.removeChild(playerCardsContainer.firstChild)
    }

    for (let i = 0; i < hiddenElements.length; i++) {
    hiddenElements[i].style.display = "none"
   }

    hitButton.style.display = "inline"
    stayButton.style.display = "inline"



    hit(false)

}