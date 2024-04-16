

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

function confirmarCompra(){

        formulario = document.getElementById("formVenta");

        formulario.submit();

    } 

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

    let formulario = document.getElementById('formAnadir');
    let ruta = formulario.dataset.ruta; // Obtener ruta de la función asincrónica

    //console.log(formulario);
    //console.log(ruta);

    let formData = new FormData(formulario); // Crear un objeto FormData para enviar los datos del formulario

    for (let value of formData.values()) {
        //console.log(value);
    }

        // Lógica para editar los datos de manera asíncrona
        await fetch(ruta, {
            method: 'POST',
            body: formData,
    })
        .then((resp) => resp.json())
        .then(function(data) {

            if (data){

                window.location.reload();

            }else{
                alert("error");
            }
        })

}

async function editarDatos() {

    let formulario = document.getElementById('formEditar');
    let ruta = formulario.dataset.ruta; // Obtener ruta de la función asincrónica
    let rutastatic = formulario.dataset.rutastatic; // Obtener ruta de la función asincrónica

    // ESTO ME PERMITIRA CAMBIAR LOS DATOS CON EL TIPO DE ID DE LO QUE QUIERO EDITAR EN ASINCRONO
    let tipo = formulario.dataset.tipo; 

    let formData = new FormData(formulario); // Crear un objeto FormData para enviar los datos del formulario

    let idTipo = formData.get('id_'+tipo);

        // Lógica para editar los datos de manera asíncrona
        await fetch(ruta, {
            method: 'POST',
            body: formData,
    })
        .then((resp) => resp.json())
        .then(function(data) {

            if (data){

                dividTipo = document.getElementById(tipo+"_"+idTipo);

                if (formData.has("id_"+tipo)) {

                    formData.forEach((value, key) => {

                        key = key.replace(/\[|\]/g, '');

                        let elemento = dividTipo.querySelector('#' + key);
                        
                        if (elemento !== null) {
                            elemento.innerHTML = value;

                            if(key == "precio") {

                                elemento.innerHTML = value + " €";

                            }

                            if(key == "imagenes") {

                                let rutafinal = rutastatic+"/imgbase/"+data;
                                elemento.src = rutafinal;

                            }
                        }

                    });
                } 
            }
        })

        closeModal();

}

async function borrarDatos() {

    let formulario = document.getElementById('formBorrar');
    let ruta = formulario.dataset.ruta; // Obtener ruta de la función asincrónica

    // ESTO ME PERMITIRA CAMBIAR LOS DATOS CON EL TIPO DE ID DE LO QUE QUIERO EDITAR EN ASINCRONO
    let tipo = formulario.dataset.tipo; 

    let formData = new FormData(formulario); // Crear un objeto FormData para enviar los datos del formulario

    let idTipo = formData.get('id_'+tipo);

        // Lógica para editar los datos de manera asíncrona
        await fetch(ruta, {
            method: "POST",
            body: formData,
    })
        .then((resp) => resp.json())
        .then(function(data) {

            if (data){

                elemento = document.getElementById(tipo+"_"+idTipo);
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

function siguientePagina() {
    // necesito el totalpaginas para que cuando le de al boton de siguiente no se pase
    if (paginaActual < totalPaginas) {
        paginaActual++;
        mostrarPagina(paginaActual);
    }
}

function anteriorPagina() {
    // aqui solamente lo necesito para pasar a mostrarPagina el numero de datos por pagina
    if (paginaActual > 1) {
        paginaActual--;
        mostrarPagina(paginaActual);
    }
}

// con esta funcion imprimo cada pagina
function mostrarPagina(pagina) {

    var inicio = (pagina - 1) * numeroporpagina;
    var fin = inicio + numeroporpagina;
    var datosPagina = datos.slice(inicio, fin);

    var contenedor = document.getElementById('contenedor');
    contenedor.innerHTML = ''; // Limpiar el contenedor antes de agregar nuevos elementos

    datosPagina.forEach(function(dato) {
        var divCol = document.createElement('div');
        divCol.className = 'col-4';
        divCol.id = tipo+'_' + dato.id_+tipo;

        console.log(tipo+'_' + dato.id_+tipo);

        var cardContainer = document.createElement('div');
        cardContainer.className = 'card-container';
        cardContainer.style.position = 'relative';

        var card = document.createElement('div');
        card.className = 'card';

        var linkImagen = document.createElement('a');
        linkImagen.href = ruta + dato.id_+tipo;
        linkImagen.className = 'text-decoration-none text-dark';

        var imagen = document.createElement('img');
        imagen.src = rutastatic +'/imgbase/'+dato.ruta;
        imagen.className = 'card-img-top';
        imagen.alt = '...';

        linkImagen.appendChild(imagen);
        card.appendChild(linkImagen);

        if (dato.id_usuario === id_usuario) {
            var dropdownContainer = document.createElement('div');
            dropdownContainer.className = 'dropdown';

            var dropdownButton = document.createElement('a');
            dropdownButton.href = '#';
            dropdownButton.className = 'btn-light rounded text-decoration-none text-dark p-1';
            dropdownButton.role = 'button';
            dropdownButton.id = 'dropdownMenuLink';
            dropdownButton.dataset.toggle = 'dropdown';
            dropdownButton.dataset.bsToggle = 'tooltip';
            dropdownButton.dataset.placement = 'top';
            dropdownButton.title = 'Editar';
            dropdownButton.setAttribute('aria-expanded', 'false');
            dropdownButton.style.position = 'absolute';
            dropdownButton.style.top = '10px';
            dropdownButton.style.right = '10px';

            var svgIcon = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
            svgIcon.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
            svgIcon.setAttribute('width', '16');
            svgIcon.setAttribute('height', '16');
            svgIcon.setAttribute('fill', 'currentColor');
            svgIcon.setAttribute('class', 'bi bi-pencil');
            svgIcon.setAttribute('viewBox', '0 0 16 16');

            var svgPath = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            svgPath.setAttribute('d', 'M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325');

            svgIcon.appendChild(svgPath);
            dropdownButton.appendChild(svgIcon);
            dropdownContainer.appendChild(dropdownButton);

            var dropdownMenu = document.createElement('ul');
            dropdownMenu.className = 'dropdown-menu';
            dropdownMenu.style.position = 'absolute';
            dropdownMenu.style.top = '100%';
            dropdownMenu.style.right = '0';
            dropdownMenu.setAttribute('aria-labelledby', 'dropdownMenuLink');

            var editarItem = document.createElement('li');
            var editarLink = document.createElement('a');
            editarLink.className = 'dropdown-item editar';
            editarLink.href = '#';
            editarLink.id = dato.id_+tipo;
            editarLink.textContent = 'Editar';
            editarLink.onclick = function() {
                openModal(this);
            };
            editarItem.appendChild(editarLink);

            var borrarItem = document.createElement('li');
            var borrarLink = document.createElement('a');
            borrarLink.className = 'dropdown-item text-danger borrar';
            borrarLink.href = '#';
            borrarLink.id = dato.id_+tipo;
            borrarLink.textContent = 'Borrar';
            borrarLink.onclick = function() {
                openModal(this);
            };
            borrarItem.appendChild(borrarLink);

            dropdownMenu.appendChild(editarItem);
            dropdownMenu.appendChild(borrarItem);

            dropdownContainer.appendChild(dropdownMenu);
            card.appendChild(dropdownContainer);
        }

        var linkDato = document.createElement('a');
        linkDato.href = ruta + dato.id_+tipo;
        linkDato.className = 'card-body text-decoration-none text-dark';

        var divDflex = document.createElement('div');
        divDflex.className = 'd-flex';

        var divColTitulo = document.createElement('div');
        divColTitulo.className = 'col-8';

        var tituloDato = document.createElement('h5');
        tituloDato.className = 'card-title';
        tituloDato.id = 'nombre_'+tipo;
        tituloDato.textContent = dato.nombre_+tipo;

        divColTitulo.appendChild(tituloDato);

        var divPrecio = document.createElement('div');
        divPrecio.className = 'col-4 d-flex justify-content-end';

        var precioDato = document.createElement('h5');
        precioDato.className = 'card-title';
        precioDato.id = 'precio';
        precioDato.textContent = dato.precio + ' €';

        divPrecio.appendChild(precioDato);

        divDflex.appendChild(divColTitulo);
        divDflex.appendChild(divPrecio);

        linkDato.appendChild(divDflex);

        var descripcionDato = document.createElement('p');
        descripcionDato.className = 'card-text';
        descripcionDato.id = 'descripcion';
        descripcionDato.textContent = dato.descripcion;

        linkDato.appendChild(descripcionDato);

        card.appendChild(linkDato);
        cardContainer.appendChild(card);
        divCol.appendChild(cardContainer);
        contenedor.appendChild(divCol);
    });
}