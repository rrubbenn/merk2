

/* ------------------------------------------------*/
/* CODIGO DE VENTANAS MODALES */
/* ------------------------------------------------*/

/* ============ Abre la ventana Modal ============ */
function openModal(boton){
  /* Hacemos visible el modal que se necesite */
    if(boton.classList.contains("anadir")){
        modal = document.getElementById("modalAnadir");

        let formulario = document.getElementById('formAnadir');
        let rutafija = formulario.dataset.rutafija; 

        if (rutafija.substring());
        rellenarSelect(rutafija, 'anadir');
    }

    if(boton.classList.contains("editar")){
        modal = document.getElementById("modalEditar");
        input_idproducto = document.getElementById("id_producto");
        input_idproducto.value = boton.id;
        rellenarModal();

    }

    if(boton.classList.contains("borrar")){
        modal = document.getElementById("modalBorrar");
        input_idproducto = document.getElementById("id_producto_borrar");
        input_idproducto.value = boton.id;

    }

    if(boton.classList.contains("cambiarimgperfil")) {
        modal = document.getElementById("modalCambiarImagenPerfil");

    }

    if(boton.classList.contains("cancelar")) {
        modal = document.getElementById("modalCancelar");
    }
    if(boton.classList.contains("confirmar")) {
        modal = document.getElementById("modalConfirmar");
    }

    modal.style.display="flex";
};
/* =============================================== */


/* ============ Cierra la ventana Modal ============ */
function closeModal(){
  let modales = document.getElementsByClassName("modal-container");
  for (modales in modal){
      modal.style.display="none";
  }
}
/* ================================================== */

/* ============ Cierra la ventana modal al hacer click fuera de la ventana ============ */
window.onclick = function(event) {
  let modales = document.getElementsByClassName("modal-container");
  // console.log(modales);
  if(modales != null){
      for (i=0; i<modales.length; i++){
          if (event.target == modales[i]) {
              modal.style.display = "none";
          }
      }
  }
}
/* ===================================================================================== */

async function rellenarModal(){
    
    let formulario = document.getElementById('formEditar');
    let ruta = formulario.dataset.rutarellenar;
    let rutafija = formulario.dataset.rutafija; 

    let formData = new FormData(formulario); // Crear un objeto FormData para enviar los datos del formulario

    rellenarSelect(rutafija, 'editar'); 
    
    let arrayDatos = [];

    for (let entrada of formData.entries()) {
        let nombre = entrada[0]; 
        arrayDatos.push(nombre);
    }

    await fetch(ruta, {
        method: "POST",
        body: formData,
    })
        .then((resp) => resp.json())
        .then(function(data) {

            let datos = data;

            arrayDatos.forEach(element => {

                if (element == 'id_categoria') {
                    
                    let categoriaAseleccionar = datos[element];
                    let selectElement = document.getElementById('editar_'+element);
                    console.log(selectElement);

                    for(var i = 0; i < selectElement.options.length; i++) {
                        var option = selectElement.options[i];
                        // Verificar si el valor de la opción coincide con la categoría deseada
                        if (parseInt(option.value) === parseInt(categoriaAseleccionar)) {
                            // Establecer el atributo selected a true para seleccionar esta opción
                            option.selected = true;
                            break;
                        }
                    }

                }
                
                if (document.getElementById('editar_'+element) != null) {
                    document.getElementById('editar_'+element).value = datos[element];
                }
                

            });

        })
}

async function addDatos() {

    let formulario = document.getElementById('formAdd');
    let ruta = formulario.dataset.ruta; // Obtener ruta de la función asincrónica

    console.log(formulario);
    console.log(ruta);


    let formData = new FormData(formulario); // Crear un objeto FormData para enviar los datos del formulario

    for (let value of formData.values()) {
        console.log(value);
    }

        // Lógica para editar los datos de manera asíncrona
        await fetch(ruta, {
            method: 'POST',
            body: datosForm,
    })
        .then((resp) => resp.json())
        .then(function(data) {

                
            if (data){

                

            }else{
                alert("error");
            }
        })

        alert('Datos editados exitosamente');

}

async function editarDatos() {

    let formulario = document.getElementById('formEditar');
    let ruta = formulario.dataset.ruta; // Obtener ruta de la función asincrónica

    // ESTO ME PERMITIRA CAMBIAR LOS DATOS CON EL TIPO DE ID DE LO QUE QUIERO EDITAR EN ASINCRONO
    let idasync = formulario.dataset.idasync; 

    let formData = new FormData(formulario); // Crear un objeto FormData para enviar los datos del formulario

        // Lógica para editar los datos de manera asíncrona
        await fetch(ruta, {
            method: 'POST',
            body: formData,
    })
        .then((resp) => resp.json())
        .then(function(data) {

                
            if (data){

                    

                    formData.forEach((value, key) => {
                        if (key == idasync) {

                            console.log("key: "+key);
                            console.log("value: "+value);

                            

                        }


                    // Obtener el elemento de la modal correspondiente al campo actual
                    //let elemento = document.getElementById(key);
                    //if (elemento) {
                        // Actualizar el valor del elemento de la modal con el valor del formData
                        //console.log(elemento);
                        //elemento.textContent = value;
                    //}
                });

            }else{
                alert("error");
            }
        })

        closeModal();

}

async function borrarDatos() {

    let formulario = document.getElementById('formBorrar');
    let ruta = formulario.dataset.ruta; // Obtener ruta de la función asincrónica

    let formData = new FormData(formulario); // Crear un objeto FormData para enviar los datos del formulario

    let idProducto = formData.get('id_producto');

        // Lógica para editar los datos de manera asíncrona
        await fetch(ruta, {
            method: "POST",
            body: formData,
    })
        .then((resp) => resp.json())
        .then(function(data) {

            if (data){

                elemento = document.getElementById("producto_"+idProducto);
                elemento.remove();

            }else{
                alert("error");
            }
        })

        closeModal();

}

async function rellenarSelect(rutafija, tipomodal){
    if (tipomodal == 'anadir') {

        let documentSelect = document.getElementById('anadir_id_categoria')

        let rellenarselect = 'rellenar_categoria';

        await fetch(rutafija+"/"+rellenarselect, {
            headers: {
                "Content-Type": "application/json"
            },
            credentials: 'include'
        })
            .then((resp) => resp.json())
            .then(function(data) {

                let datos = data

                console.log(datos);

                // Limpiar select
                documentSelect.innerHTML = '';

                // Añadir opciones al select
                datos.forEach(element => {
                    documentSelect.options.add(new Option(element.nombre_categoria, element.id_categoria));
                });

            });

    } else if (tipomodal == 'editar') {
        let documentSelect = document.getElementById('editar_id_categoria')

        let rellenarselect = 'rellenar_categoria';

        await fetch(rutafija+"/"+rellenarselect, {
            headers: {
                "Content-Type": "application/json"
            },
            credentials: 'include'
        })
            .then((resp) => resp.json())
            .then(function(data) {

                let datos = data

                //console.log(datos);

                // Limpiar select
                documentSelect.innerHTML = '';

                // Añadir opciones al select
                datos.forEach(element => {
                    documentSelect.options.add(new Option(element.nombre_categoria, element.id_categoria));
                });

            });
    } 
}

async function marcardesmarcarFavorito(rutaurl, marcador, id_producto) {

    if (marcador == true) {

        await fetch(rutaurl+"/favorito/delfavorito/"+id_producto, {
            headers: {
                "Content-Type": "application/json"
            },
            credentials: 'include'
        })
            .then((resp) => resp.json())
            .then(function(data) {

                let datos = data

                if (datos == true) {

                    if (document.getElementById("producto_"+id_producto)) { 

                        producto = document.getElementById(id_producto);

                        var botonesFav = document.querySelectorAll("#producto_"+id_producto+" .fav");
                        var botonesUnfav = document.querySelectorAll("#producto_"+id_producto+" .unfav");

                        for (var i = 0; i < botonesFav.length; i++) {
                            // Remover la clase "d-none"
                            botonesFav[i].classList.add("d-none");
                        }
                        
                        // Iterar sobre los elementos con la clase "unfav"
                        for (var i = 0; i < botonesUnfav.length; i++) {
                            // Agregar la clase "d-none"
                            botonesUnfav[i].classList.remove("d-none");
                        }

                    } else {

                        var botonesFav = document.getElementsByClassName("fav");

                        // Obtener todos los elementos con la clase "unfav"
                        var botonesUnfav = document.getElementsByClassName("unfav");

                        for (var i = 0; i < botonesFav.length; i++) {
                            // Remover la clase "d-none"
                            botonesFav[i].classList.add("d-none");
                        }
                        
                        // Iterar sobre los elementos con la clase "unfav"
                        for (var i = 0; i < botonesUnfav.length; i++) {
                            // Agregar la clase "d-none"
                            botonesUnfav[i].classList.remove("d-none");
                        }

                    }

                    

                } else if (datos == false) {

                    console.log("error");

                }

            });

    } else if (marcador == false) {

        await fetch(rutaurl+"/favorito/addfavorito/"+id_producto, {
            headers: {
                "Content-Type": "application/json"
            },
            credentials: 'include'
        })
            .then((resp) => resp.json())
            .then(function(data) {

                let datos = data

                if (datos == true) {

                    if (document.getElementById("producto_"+id_producto)) { 

                        producto = document.getElementById(id_producto);

                        var botonesFav = document.querySelectorAll("#producto_"+id_producto+" .fav");
                        var botonesUnfav = document.querySelectorAll("#producto_"+id_producto+" .unfav");

                        for (var i = 0; i < botonesFav.length; i++) {
                            // Remover la clase "d-none"
                            botonesFav[i].classList.remove("d-none");
                        }
                        
                        // Iterar sobre los elementos con la clase "unfav"
                        for (var i = 0; i < botonesUnfav.length; i++) {
                            // Agregar la clase "d-none"
                            botonesUnfav[i].classList.add("d-none");
                        }

                    } else {

                        var botonesFav = document.getElementsByClassName("fav");

                        // Obtener todos los elementos con la clase "unfav"
                        var botonesUnfav = document.getElementsByClassName("unfav");
    
                        for (var i = 0; i < botonesFav.length; i++) {
                            // Remover la clase "d-none"
                            botonesFav[i].classList.remove("d-none");
                        }
                        
                        // Iterar sobre los elementos con la clase "unfav"
                        for (var i = 0; i < botonesUnfav.length; i++) {
                            // Agregar la clase "d-none"
                            botonesUnfav[i].classList.add("d-none");
                        }

                    }

                } else if (datos == false) {

                    console.log("error");

                }

            });
    } 

}