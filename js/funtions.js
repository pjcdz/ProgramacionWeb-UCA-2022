// Get the modal

// var removemodal = document.getElementsByClassName("remove-modal")[0];

// // Get the button that opens the modal
// // var btn = document.getElementsByClassName("btn-edit")[0];
// var btnremove = document.getElementsByClassName("btn-remove")[0];

// // Get the <span> element that closes the modal
// var no = document.getElementById("no");
// var si = document.getElementById("si");

// // When the user clicks the button, open the modal 
// btnremove.onclick = function() {
//     removemodal.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal

// no.onclick = function() {
//     removemodal.style.display = "none";
// }

// si.onclick = function() {
//     removemodal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == removemodal) {
//         removemodal.style.display = "none";
//     }
// }

function isInputNumber(evt){
    var ch = String.fromCharCode(evt.which);
    
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
    
}

function SubmitEmail() {
    event.preventDefault();

    var email = $('input[name=email]').val();

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(email.match(mailformat) && email != '') {
        var formData = {email: email};
        $('#message').html('<span style="color: red">Processing form. . . please wait. . .</span>');
        $.ajax({url: "submit.php", type: 'POST', data: formData, success: function(response)
        {
            var res = JSON.parse(response);
            console.log(res);
            if(res.success == true)
                $('#message').html('<span style="color: green">Form submitted successfully</span>');
            else
                $('#message').html('<span style="color: red">Form not submitted. Some error in running the database query.</span>');
        }
        });
    }
    else
    {
        alert("Ingresaste un email invalido");
    }
}