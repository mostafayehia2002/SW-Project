console.log("ok");

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


//
let faild=document.querySelector(".faild");   
let success=document.querySelector(".success");
    if(faild){
        setTimeout(()=>{
            faild.style.display="none";
            },3000); 
    }else if(success){
        setTimeout(()=>{
            success.style.display="none";  
           },3000);
    }


    //menu
    let menu=document.querySelector(".menu");
    let dropdown=document.querySelector(".dropdown-menu");


    menu.onclick=()=>{
        if(dropdown.style.display=="none"){
            dropdown.style.display="block";
        }else{
            dropdown.style.display="none";
        }
    }