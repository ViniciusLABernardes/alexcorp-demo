document.addEventListener("DOMContentLoaded",(function(){const e=document.querySelector(".scrollDownButton"),o=document.querySelector(".logo-container-bottom a"),t=document.querySelector("footer"),n=document.querySelector("main"),i=window.location.pathname;["/login.html","/cadastro.html"].includes(i,"/forum.html")||window.addEventListener("scroll",(()=>{n.getBoundingClientRect().bottom<=window.innerHeight?(t.classList.add("footer-visible"),e.style.display="none"):(t.classList.remove("footer-visible"),e.style.display="flex")})),o.addEventListener("click",(function(e){e.preventDefault();const o=document.querySelector("header").offsetTop;window.scrollTo({top:o,behavior:"smooth"})})),e&&e.addEventListener("click",(function(){const e=1*window.innerHeight;window.scrollBy({top:e,behavior:"smooth"})}))}));