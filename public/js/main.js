
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

    if(boton.classList.contains("valorar")) {
        modal = document.getElementById("modalValorar");
        id_venta = document.getElementById("id_venta").value;
        id_ventamodal = document.getElementById("id_ventamodal");
        id_ventamodal.value = id_venta;

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

function mostrarCategorias() {

    let divCategorias = document.getElementById("listacategorias");

    if(divCategorias.classList.contains("d-none")) {

        divCategorias.classList.remove("d-none");

    } else {

        divCategorias.classList.add("d-none");

    }

}

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

                //elemento = document.getElementById(tipo+"_"+idTipo);
                //elemento.remove();
                window.location.reload();

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

// con esta funcion imprimo cada pagina
function mostrarPagina(numeroPagina) {
    paginaActual = numeroPagina;

    var inicio = (paginaActual - 1) * numeroporpagina;
    var fin = inicio + numeroporpagina;
    var datosPagina = datosFiltrados.slice(inicio, fin);

    var contenedor = document.getElementById('contenedor');
    contenedor.innerHTML = ''; // Limpiar el contenedor antes de agregar nuevos elementos

    var puestoInicial = (paginaActual - 1) * numeroporpagina + 1;

    datosPagina.forEach(function(usuario, index) {

        // Crear un div que contenga todas las columnas del usuario
        var divUsuario = document.createElement('a');
        divUsuario.className = 'usuario col-12 d-flex text-decoration-none text-dark'; // Agrega la clase 'usuario' y 'row' para el formato de Bootstrap
        divUsuario.href = ruta+"/perfil/"+usuario.id_usuario;

        // Crear columnas para cada dato del usuario
        var divColPuesto = document.createElement('div');
        divColPuesto.className = 'col-2 d-flex justify-content-center';
        var h4Puesto = document.createElement('h4');
        h4Puesto.textContent = puestoInicial + index;
        divColPuesto.appendChild(h4Puesto);
        divUsuario.appendChild(divColPuesto);

        var divColNombre = document.createElement('div');
        divColNombre.className = 'col-4 d-flex justify-content-center';
        var h4Nombre = document.createElement('h4');
        h4Nombre.textContent = usuario.nombre;
        divColNombre.appendChild(h4Nombre);
        divUsuario.appendChild(divColNombre);

        var divColVentas = document.createElement('div');
        divColVentas.className = 'col-2 d-flex justify-content-center';
        var h4Ventas = document.createElement('h4');
        h4Ventas.textContent = usuario.totalVentas;
        divColVentas.appendChild(h4Ventas);
        divUsuario.appendChild(divColVentas);

        var divColValoracion = document.createElement('div');
        divColValoracion.className = 'col-4 d-flex justify-content-center';
        var h4Valoracion = document.createElement('h4');
        h4Valoracion.textContent = usuario.valoracionMedia !== null ? usuario.valoracionMedia.toFixed(2) + '/5' : 'N/A';
        divColValoracion.appendChild(h4Valoracion);
        divUsuario.appendChild(divColValoracion);

        // Agregar el div del usuario al contenedor
        contenedor.appendChild(divUsuario);

    });

    actualizarPaginacion();
}

function siguientePagina() {
    // necesito el totalpaginas para que cuando le de al boton de siguiente no se pase
    if (paginaActual < totalPaginas) {
        paginaActual++;
        mostrarPagina(paginaActual);
    }

    actualizarPaginacion();
}

function anteriorPagina() {
    // aqui solamente lo necesito para pasar a mostrarPagina el numero de datos por pagina
    if (paginaActual > 1) {
        paginaActual--;
        mostrarPagina(paginaActual);
    }

    actualizarPaginacion();
}

function actualizarPaginacion() {
    var paginationContainer = document.getElementById('pagination');
    paginationContainer.innerHTML = ''; // Limpiar la paginación antes de generar los números de página

    // Añadir botón de anterior
    var anteriorBtn = document.createElement('li');
    anteriorBtn.className = 'page-item';
    if (paginaActual === 1) {
        anteriorBtn.classList.add('disabled');
    } 
    anteriorBtn.innerHTML = '<a class="page-link text-decoration-none text-dark" href="#" aria-label="Previous" onclick="anteriorPagina()"><span aria-hidden="true">&laquo;</span><span class="visually-hidden">Previous</span></a>';
    paginationContainer.appendChild(anteriorBtn);

    // Añadir números de página
    for (var i = 1; i <= totalPaginas; i++) {
        var paginaBtn = document.createElement('li');
        paginaBtn.className = 'page-item';
        if (i === paginaActual) {
            paginaBtn.innerHTML = '<a class="page-link text-decoration-none text-dark" href="#" onclick="mostrarPagina(' + i + ')" style="background-color: #A898D5">' + i + '</a>';
        } else {
            paginaBtn.innerHTML = '<a class="page-link text-decoration-none text-dark" href="#" onclick="mostrarPagina(' + i + ')">' + i + '</a>';
        }
        paginationContainer.appendChild(paginaBtn);
    }

    // Añadir botón de siguiente
    var siguienteBtn = document.createElement('li');
    siguienteBtn.className = 'page-item';
    if (paginaActual === totalPaginas || totalPaginas === 0) {
        siguienteBtn.classList.add('disabled');
    }
    siguienteBtn.innerHTML = '<a class="page-link text-decoration-none text-dark" href="#" aria-label="Next" onclick="siguientePagina()"><span aria-hidden="true">&raquo;</span><span class="visually-hidden">Next</span></a>';
    paginationContainer.appendChild(siguienteBtn);
}

function buscarProducto(consulta) {

    datosBuscador = [];

    // Filtrar los datos según la consulta
    datosFiltrados.forEach(function(dato) {
    if (
        dato.nombre.toLowerCase().includes(consulta.toLowerCase()) ||
        dato.apellidos.toLowerCase().includes(consulta.toLowerCase())
    ) {
        datosBuscador.push(dato);
    }

    });

    return datosBuscador;
}

function calcularVentasPorUsuario(datos, periodo, categoria = "") {
    // Filtrar ventas según el período de tiempo seleccionado

    var fechaLimite = new Date();
    switch (periodo) {
        case 'semana':
            fechaLimite.setDate(fechaLimite.getDate() - 7);
            break;
        case 'mes':
            fechaLimite.setMonth(fechaLimite.getMonth() - 1);
            break;
        case 'anyo':
            fechaLimite.setFullYear(fechaLimite.getFullYear() - 1);
            break;
        default:
            fechaLimite.setDate(fechaLimite.getDate() - 7); // Por defecto, filtrar por la última semana
            break;
    }

    var ventasFiltradas = datos.filter(function(venta) {

        var fechaVenta = new Date(venta.fecha_venta);
        var dentroDelPeriodo = fechaVenta >= fechaLimite;

        // Filtrar por categoría si se especifica
        var categoriaCoincide = categoria === "" || venta.id_categoria.toString() === categoria.toString();

        return dentroDelPeriodo && categoriaCoincide;
    });

    // Objeto para almacenar los datos de ventas por usuario
    var ventasPorUsuario = {};

    // Calcular total de ventas y puntuaciones por usuario en el período seleccionado
    ventasFiltradas.forEach(function(venta) {
        if (!ventasPorUsuario.hasOwnProperty(venta.id_usuario)) {
            ventasPorUsuario[venta.id_usuario] = {
                id_usuario: venta.id_usuario,
                nombre: venta.nombre,
                apellidos: venta.apellidos,
                totalVentas: 0,
                totalPuntuaciones: 0,
                cantidadValoraciones: 0
            };
        }
        ventasPorUsuario[venta.id_usuario].totalVentas++;
        if (venta.puntuacion !== null) {
            ventasPorUsuario[venta.id_usuario].totalPuntuaciones += venta.puntuacion;
            ventasPorUsuario[venta.id_usuario].cantidadValoraciones++;
        }
    });

    // Calcular la valoración media por usuario
    for (var usuarioId in ventasPorUsuario) {
        if (ventasPorUsuario.hasOwnProperty(usuarioId)) {
            var usuario = ventasPorUsuario[usuarioId];
            if (usuario.cantidadValoraciones > 0) {
                usuario.valoracionMedia = usuario.totalPuntuaciones / usuario.cantidadValoraciones;
            } else {
                usuario.valoracionMedia = null; // Si no hay valoraciones, se establece como null
            }
        }
    }

    // Ordenar por el número de ventas (en orden descendente)
    var ventasPorUsuarioOrdenadas = Object.values(ventasPorUsuario).sort(function(a, b) {
        return b.totalVentas - a.totalVentas;
    });

    return ventasPorUsuarioOrdenadas;
}

function mostrarVentas() {

    var pestanaVenta = document.getElementById("pestanaVentas");
    var pestanaCompras = document.getElementById("pestanaCompras");
    var tipoColumna = document.getElementById("tipoColumna");

    tipoColumna.innerHTML = "Ventas";

    pestanaVenta.classList.add("fw-bold");
    pestanaCompras.classList.remove("fw-bold");

    datos = "";
    datos = ventasConsulta;

    datosFiltrados = Object.values(calcularVentasPorUsuario(datos, tiempoSeleccionado, categoriaSeleccionada));

    numeroporpagina = 10;
    totalPaginas = Math.ceil(datosFiltrados.length / numeroporpagina);
    paginaActual = 1;

    actualizarPaginacion();
    mostrarPagina(paginaActual);


}

function mostrarCompras() {

    var pestanaCompras = document.getElementById("pestanaCompras");
    var pestanaVenta = document.getElementById("pestanaVentas");
    var tipoColumna = document.getElementById("tipoColumna");

    tipoColumna.innerHTML = "Compras";
    pestanaVenta.classList.remove("fw-bold");
    pestanaCompras.classList.add("fw-bold");

    datos = "";
    datos = comprasConsulta;

    datosFiltrados = Object.values(calcularVentasPorUsuario(datos, tiempoSeleccionado, categoriaSeleccionada));

    numeroporpagina = 10;
    totalPaginas = Math.ceil(datosFiltrados.length / numeroporpagina);
    paginaActual = 1;

    actualizarPaginacion();
    mostrarPagina(paginaActual);


}



function etiquetasOriginales() {
    var etiquetas = document.querySelectorAll('*');
    etiquetas.forEach(function(elemento) {
        // Guardar los estilos originales en el objeto de datos del elemento
        elemento.originalStyles = {
            backgroundColor: elemento.style.backgroundColor,
            color: elemento.style.color
            // Agregar más propiedades de estilo si es necesario
        };

        // Verificar y guardar las clases de Bootstrap
        if (elemento.classList.contains('text-dark')) {
            elemento.originalStyles.bootstrapTextDark = true;
        }
        if (elemento.classList.contains('text-white')) {
            elemento.originalStyles.bootstrapTextWhite = true;
        }

        // Verificar y guardar los colores de los iconos SVG
        if (elemento.tagName === 'svg') {
            var paths = elemento.querySelectorAll('path');
            paths.forEach(function(path, index) {
                if (!elemento.originalStyles.svgColors) {
                    elemento.originalStyles.svgColors = [];
                }
                elemento.originalStyles.svgColors[index] = path.getAttribute('fill');
            });
        }
    });
    return etiquetas;
}



function restaurarEstilosOriginales() {

    var etiquetas = etiquetasDefault; // Obtener las etiquetas con estilos originales

    etiquetas.forEach(function(elemento) {
        var estilosOriginales = elemento.originalStyles; // Obtener los estilos originales del objeto de datos

        // Restaurar los estilos originales
        if (estilosOriginales) {
            elemento.style.backgroundColor = estilosOriginales.backgroundColor;
            elemento.style.color = estilosOriginales.color;
            // Restaurar más propiedades de estilo si es necesario
        }

        // Restaurar las clases de Bootstrap
        if (estilosOriginales.bootstrapTextDark) {
            elemento.classList.add('text-dark');
        }
        if (estilosOriginales.bootstrapTextWhite) {
            elemento.classList.add('text-white');
        }

        // Restaurar los colores de los iconos SVG
        if (estilosOriginales.svgColors && elemento.tagName === 'svg') {
            var paths = elemento.querySelectorAll('path');
            paths.forEach(function(path, index) {
                path.setAttribute('fill', estilosOriginales.svgColors[index]);
            });
        }
    });

    localStorage.removeItem('estadoContraste'); // Eliminar el estado de contraste almacenado en el localStorage

}

function cambiarContraste() {
    var estadoGuardado = localStorage.getItem('estadoContraste'); // Obtener el estado actual guardado

    if (estadoGuardado !== null) {
        estadoActual = estadoGuardado; // Establecer el estado actual al guardado en el almacenamiento local
    }

    if (estadoActual === 'normal') {
        aplicarEstilos(estadoActual); 
    }

    var siguienteEstado;

    // Determinar el siguiente estado al llamar desde el botón
    if (event && event.type === 'click') {
        if (estadoActual === 'normal') {
            siguienteEstado = 'negro';
        } else if (estadoActual === 'negro') {
            siguienteEstado = 'azul';
        } else if (estadoActual === 'azul') {
            siguienteEstado = 'amarillo';
        } else if (estadoActual === 'amarillo') {
            siguienteEstado = 'negro';
        }

        // Aplicar estilos para el siguiente estado
        aplicarEstilos(siguienteEstado);
    } else {
        // Aplicar estilos para el estado actual
        aplicarEstilos(estadoActual);
    }
}

// Función para aplicar estilos de acuerdo al estado proporcionado
function aplicarEstilos(estado) {

    var elementos = document.querySelectorAll('*');

    if (estado === 'normal') {
        return;
    }

    elementos.forEach(function(elemento) {
        // Cambiar estilos de fondo y texto para elementos HTML
        if (estado === 'negro') {
            elemento.style.backgroundColor = '#000000'; // Fondo negro
            elemento.style.color = '#FFFFFF'; // Letra blanca
        } else if (estado === 'azul') {
            elemento.style.backgroundColor = '#1A237E'; // Fondo azul oscuro
            elemento.style.color = '#FFFF00'; // Letra amarilla
        } else if (estado === 'amarillo') {
            elemento.style.backgroundColor = '#FFFFCC'; // Fondo amarillo claro
            elemento.style.color = '#000080'; // Letra azul marino
        }

        // Cambiar color fill de elementos SVG
        if (elemento.tagName === 'svg') {
            var paths = elemento.querySelectorAll('path');
            paths.forEach(function(path) {
                if (estado === 'negro') {
                    path.setAttribute('fill', '#FFFFFF');
                } else if (estado === 'azul') {
                    path.setAttribute('fill', '#FFFF00');
                } else if (estado === 'amarillo') {
                    path.setAttribute('fill', '#000080');
                }
            });
        }

        // Eliminar clases de Bootstrap que establecen el color del texto a blanco
        if (elemento.classList.contains('text-white')) {
            elemento.classList.remove('text-white');
        }
        if (elemento.classList.contains('text-dark')) {
            elemento.classList.remove('text-dark');
        }
    });

    // Guardar el estado en el almacenamiento local solo cuando se llama desde el botón
    if (event && event.type === 'click') {
        localStorage.setItem('estadoContraste', estado);
    }
}

var etiquetasDefault = etiquetasOriginales();
var estadoActual = 'normal'; // Cambia el estado predeterminado a 'normal'
cambiarContraste();


