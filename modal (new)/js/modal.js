// Get the modal

var createmodal = document.getElementsByClassName("container-all")[0];
// Get the <span> element that closes the modal

var cancelar = document.getElementById("cerrar");


// Get the button that opens the modal
// var btn = document.getElementsByClassName("btn-edit")[0];
var btncreate = document.getElementsByClassName("link")[0];

// When the user clicks the button, open the modal 
btncreate.onclick = function() {
    createmodal.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == createmodal) {
        createmodal.style.display = "none";
    }
}
// When the user clicks on <span> (x), close the modal
cancelar.onclick = function() {
    createmodal.style.display = "none";
}