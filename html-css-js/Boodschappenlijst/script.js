const table = document.getElementById("groceryList")
const productQuantities = document.getElementsByClassName("productQuantity")
const productPrices = document.getElementsByClassName("productPrice")
const productTotalCosts = document.getElementsByClassName("productTotalCost")
const totalCost = document.getElementById("totalCost")


function logToConsole() { 
    console.log('Aantal producten is gewijzigd.')
    let runningCount = 0
    for (let i = 0; i < productTotalCosts.length; i ++) {
        console.log("index = " + i)
        let amount = productQuantities[i].value
        let price = productPrices[i].textContent
        let subtotal = Number((price * amount).toFixed(2))
        
        runningCount = runningCount + subtotal
        productTotalCosts[i].textContent = subtotal
    }
    totalCost.textContent = runningCount
}

table.addEventListener("change", logToConsole)