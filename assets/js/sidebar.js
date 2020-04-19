var clic = 1;
function sidebar(){ 
   if(clic==1){
       /* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        // Icono de menu
        document.getElementById('btn-menu').innerHTML = "&times;";
   clic = clic + 1;
   } else{
       /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        // Icono de una X
        document.getElementById('btn-menu').innerHTML = "&#9776";   
        clic = 1;
   }   
}

function closeBar() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    // Icono de una X
    document.getElementById('btn-menu').innerHTML = "&#9776";
}