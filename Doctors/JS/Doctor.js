let sidBar = document.querySelector(".side-bar");

document.querySelector("#menu-btn").onclick = () => {
    sidBar.classList.toggle("active");
    
}


let menu = document.querySelectorAll(".drow-menu");
let icon = document.querySelector(".add");
icon.onclick = () => {
    menu.classList.toggle("active");
}