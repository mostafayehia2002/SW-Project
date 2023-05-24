console.log("ok");

let list=document.querySelector(".icon i");
let sideBar=document.querySelector(".side-bar");
let section=document.querySelector(".section");

list.onclick=()=>{
    section.classList.toggle("active") ;
    sideBar.classList.toggle("hidden") ;
}


//menu
let menu = document.querySelectorAll(".link");

menu.forEach((m) => {
    m.onclick = () => {
        if (m.lastElementChild.style.display == "none") {
            m.lastElementChild.style.display = "block";
        } else {
            m.lastElementChild.style.display = "none";
        }
    }

})


//profile
let profile = document.querySelector(".profile");
let profile_list = document.querySelector(".profile-list");
profile.onclick = () => {
    profile_list.classList.toggle('show');
}
