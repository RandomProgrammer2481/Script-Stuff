


function rollDice() {
    let results = [];
    let count = {
        1: 0,
        2: 0,
        3: 0,
        4: 0,
        5: 0,
        6: 0
    };
    let elements = [...document.querySelectorAll(".countData")]
    
    for (let i = 0; i < 8; i++) {
        let randomNumber = Math.floor(Math.random()* 6 + 1)
        results.push(randomNumber);
        count[randomNumber] ++
    }
    console.log(results, count);

    elements.forEach((el, index) => {
        el.textContent = count[index + 1];
    });
}


if (button) {
    button.addEventListener("click", rollDice);
} else {
    console.log("no button found");
}
