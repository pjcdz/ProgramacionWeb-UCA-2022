// Get the modal

var createmodal = document.getElementsByClassName("create-modal")[0];
var editmodal = document.getElementsByClassName("edit-modal")[0];
var removemodal = document.getElementsByClassName("remove-modal")[0];

// Get the button that opens the modal
// var btn = document.getElementsByClassName("btn-edit")[0];
var btncreate = document.getElementsByClassName("btn-create")[0];
var btnedit = document.getElementsByClassName("btn-edit")[0];
var btnremove = document.getElementsByClassName("btn-remove")[0];

// Get the <span> element that closes the modal
var createcancelar = document.getElementById("create-c");
var createguardar = document.getElementById("create-g");

var cancelar = document.getElementById("cancelar");
var guardar = document.getElementById("guardar");

var no = document.getElementById("no");
var si = document.getElementById("si");

// When the user clicks the button, open the modal 
btncreate.onclick = function() {
    createmodal.style.display = "block";
}
btnedit.onclick = function() {
    editmodal.style.display = "block";
}
btnremove.onclick = function() {
    removemodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
createcancelar.onclick = function() {
    createmodal.style.display = "none";
}

createguardar.onclick = function() {
    createmodal.style.display = "none";
}

cancelar.onclick = function() {
    editmodal.style.display = "none";
}

guardar.onclick = function() {
    editmodal.style.display = "none";
}

no.onclick = function() {
    removemodal.style.display = "none";
}

si.onclick = function() {
    removemodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == createmodal) {
        createmodal.style.display = "none";
    }
    if (event.target == editmodal) {
        editmodal.style.display = "none";
    }
    if (event.target == removemodal) {
        removemodal.style.display = "none";
    }
}