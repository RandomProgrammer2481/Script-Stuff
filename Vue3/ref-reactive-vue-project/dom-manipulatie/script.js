let name = "Johan";
const button = document.getElementById("clicky");
const text = document.getElementById("text");
const colors = ["red", "green", "blue", "yellow", "magenta"]
const max = 5


function updateH1() {
    text.textContent = "Hi " + name;
    let i = Math.floor(Math.random() * max)
    text.style.color = colors.at(i)

    if (text.style.display === "none" || text.style.display === "") {
    text.style.display = "block";
    } else {
    text.style.display = "none";
    }
}

if (button) {
    button.addEventListener("click", updateH1);
} else {
    console.log("well that sucks no button found")
}
    