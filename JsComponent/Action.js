console.log("ok");

let list = document.querySelector(".icon i");
let navBar = document.querySelector(".nav-bar1");
let sideBar = document.querySelector(".Dashboard");
list.onclick = () => {

    if (sideBar.classList.contains("hidden")) {
        sideBar.classList.remove("hidden");
        navBar.style.cssText = "width:82%";
        
    } else {
        sideBar.classList.add("hidden");
        navBar.style.cssText = "width:100%";
    }

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
    if (profile_list.style.display == "none") {

        profile_list.style.display = "block";
    } else {

        profile_list.style.display = "none";
    }
}
