let sidBar = document.querySelector(".side-bar");

document.querySelector("#menu-btn").onclick = () => {
    sidBar.classList.toggle("active");
    console.log("mmmm");
    console.log(sidBar);
}
document.querySelector(".side-bar .close-btn").onclick = () => {
    sidBar.classList.add("active");
}