console.log("main.js is connnected");

//message if admin add users
let faild=document.querySelector(".faild");   
let success=document.querySelector(".success");
    if(faild){
        setTimeout(()=>{
            faild.style.display="none";
            }); 
    }else if(success){
        setTimeout(()=>{
            success.style.display="none";  
           },3000);
    }
