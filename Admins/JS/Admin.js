let list=document.querySelector(".icon i");
let navBar=document.querySelector(".nav-bar");
let sideBar=document.querySelector(".Dashboard");

list.onclick=()=>{
      
    if(sideBar.classList.contains("hidden")){
        sideBar.classList.remove("hidden") ;
        navBar.style.cssText="width:82%";
    }else{
     sideBar.classList.add("hidden");
    navBar.style.cssText="width:100%";
    }
    
}