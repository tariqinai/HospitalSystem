var navbar = document.getElementById("navbar");
var sidenav = document.getElementById("sidenav");
sidenav.style.width = "0px";
navbar.onclick= function(){
  if(sidenav.style.width=="0px"){
    sidenav.style.width = "100%";
  }
  else(
    sidenav.style.width = "0px"
  )
}
