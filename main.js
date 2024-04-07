function myNav(){
    let bar = document.querySelector(".bar");
    let nav = document.querySelector(".navigation");
    bar.onclick = ()=>{
        if(nav.style.left == "0%"){
            nav.style.left = "-100%";
            bar.src = "pic/menu.png"
        }else{
            nav.style.left = "0%";
            bar.src = "pic/x.png"
        }
    }
}
myNav();

window.onload = ()=>{
    let homeContent = document.querySelector(".home-content");
    homeContent.style.left = "50px"
}










