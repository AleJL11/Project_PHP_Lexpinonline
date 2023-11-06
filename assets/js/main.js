// Quitar propiedad disabled a input

/*const   button      = document.getElementById("perfil__button-edit"),
        inputs      = document.querySelectorAll("#perfil #perfil__input");

button?.addEventListener("click", e => {
    e.preventDefault();

    inputs.forEach(input => {
        if (input.disabled == true ) {
        input.disabled = false;
        } else {
            input.disabled = true;
        } 
    });
    
})*/

var input_focus_edit = "";

document.getElementById("perfil__button-edit").onclick = editarInput;

const elements_edit = document.querySelectorAll("input[type='text'], input[type='email']");

for (var i = 0; i < elements_edit.length; i++) {
    elements_edit[i].addEventListener("focus", function() {
        input_focus_edit = this;
    });
}

function editarInput() {
    input_focus_edit.removeAttribute("readonly");
}

// Eliminar caracteres del input

var input_focus = "";

document.getElementById("perfil__button-delete").onclick = limpiarInput;

const elements = document.querySelectorAll("input[type='text'], input[type='email']");

for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener("focus", function() {
        input_focus = this;
    });
}

function limpiarInput() {
    input_focus.value = "";
}


