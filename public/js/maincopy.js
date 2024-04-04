// // Obtener referencia al botón de apertura de la ventana modal
// var openModalBtn = document.getElementById("$producto->id_carrito");

// // Asignar función de controlador de eventos al botón de apertura
// openModalBtn.addEventListener("click", function(event) {
//   event.preventDefault(); // Evitar el comportamiento predeterminado del botón
//   $('#mymodal').modal('show'); // Mostrar la ventana modal utilizando el selector de jQuery y el método modal de Bootstrap
// });



function buscador(){
  // console.log(arrayPHP);
  texto = quitarAcentos();
  filtro = [];

  /* Buscamos en el array algo relacionado con el bucle */
  for(i=0; i<arrayPHP.length; i++){
      for(j=0; j<atributos.length-1; j++){

          // console.log(atributos[j]);
          if (arrayPHP[i][atributos[j]] == null){
              campo = "";
          }else if(!isNaN(arrayPHP[i][atributos[j]])){
              campo = arrayPHP[i][atributos[j]]+"".toLowerCase();
          }else{
              campo = arrayPHP[i][atributos[j]].toLowerCase();
          }
          
          // console.log(campo);
          if (campo.indexOf(texto) > -1){ /* Si no coincide la función tira un -1 */
              filtro.push(arrayPHP[i]);
              break;
              // console.log(filtro);
          }
      }
  }

  //Si no se encuentran coincidencias igualamos la tabla
  if(filtro.length == 0){
      document.getElementById("buscador").value = "";
      alert("No hay coincidencias");
      filtro = arrayPHP;
  }

  //Modificamos el arrayJS para mostrar los datos del filtro
  arrayJS = filtro.slice();

  //Graficamos la tabla
  resetValues();
  pages = numPaginas(arrayJS);
  delTable();
  crearTabla(arrayJS, pages);
}

function quitarAcentos(){
  //Seleccionamos el buscador de la página y lo que se escribe en él
  buscadores = document.getElementById("buscador");
  cadena = buscadores.value;
  //Constante que me almacena lla forma de convertir caracteres raros
  let acentos = {'á':'a','é':'e','í':'i','ó':'o','ú':'u','Á':'A','É':'E','Í':'I','Ó':'O','Ú':'U', 'ü':'u'};

  //quitamos las tildes
  noTildes = cadena.split('').map( letra => acentos[letra] || letra).join('').toString().toLowerCase();	
  // console.log(noTildes);
  return noTildes;
}

/* ------------------------------------------------*/
/* CODIGO DE FILTRAR */
/* ------------------------------------------------*/

function filtrar(option, atributo){
  //Inicializamos filtro a cero
  filtro = [];

  //Comparamos el id de tipo persona con el id tipo 
  // console.log(atributo + " " + atributo);
  if (option.id == "todos"){
      filtro = arrayPHP;
  }else{
      for(i=0; i<arrayPHP.length; i++){
          if (arrayPHP[i][atributo] == option.id){
              filtro.push(arrayPHP[i]);
          }
      }
  }

      /* Si no hay coincidencias devuelve un mensaje y todo el array */
      if(filtro.length == 0){
        document.getElementById("tbody").innerHTML = "No hay na";
        //   alert("No hay elementos de este filtro");
        filtro = arrayPHP;
      }else{
        filtro = arrayPHP;

      }
      
  
  arrayJS = filtro;
  //Modificamos el arrayJS para mostrar los datos del filtro
  

  //Creamos la tabla con el filtro aplicado
  resetValues();
  pages = numPaginas(arrayJS);
  delTable();
  crearTabla(arrayJS, pages);
}

function resetValues(){
  elementos = document.querySelectorAll(".page-item");
  // console.log(elementos);
  for (i=1; i<elementos.length-1; i++) {
      if (elementos[i].classList.contains("active")){
          elementos[i].classList.remove("active");
      }

      if (elementos[i].classList.contains("disabled")){
          elementos[i].classList.remove("disabled");
      }

      elementos[i].firstChild.innerHTML = i;
  }

  if (!(elementos[0].classList.contains("disabled"))){
      elementos[0].classList.add("disabled");
  }

  if (!(elementos[1].classList.contains("disabled"))){
      elementos[1].classList.add("disabled");
  }

  if (elementos[elementos.length-1].classList.contains("disabled")){
      // console.log(elementos[elementos.length-1]);
      elementos[elementos.length-1].classList.remove("disabled");
  }
}

window.addEventListener("afterprint", function(event) {
  console.log(event);
});

/* ------------------------------------------------*/
/* CODIGO DE VENTANAS MODALES */
/* ------------------------------------------------*/

/* ============ Abre la ventana Modal ============ */
function openModal(boton){

  /* Hacemos visible el modal que se necesite */
  if(boton.classList.contains("edit")){
      modal = document.getElementById("modalEdit");
      select = modal.getElementsByTagName("select");
      textarea = modal.getElementsByTagName("textarea");

    

  }

  if(boton.classList.contains("delete")){
      modal = document.getElementById("modal1");

      /* Personalizamos la ruta en función del elemento que se quiera eliminar */
      let modalBorrar = document.getElementById("modalBorrar");
      modalBorrar.href = funciones[0]+"/"+funciones[1]+"/"+funciones[2]+"/"+boton.name;
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


/* ------------------------------------------------*/
/* CODIGO DE PAGINACIÓN */
/* ------------------------------------------------*/


/* ============ Al cargar la pagina ============ */


window.addEventListener("load", function() { 

  /* COOKIES */
  // save_config();

  if (!(typeof arrayJS === 'undefined')){ /* Evita errores en el console.log */
      if (arrayJS.length == 0){ /* Si no hay datos desactivamos el menu de navegación */
          elementos = document.querySelectorAll(".page-item");
          for (i=0; i<elementos.length; i++){
              if (!(elementos[i].classList.contains("disabled"))){
                  elementos[i].classList.add("disabled");
              }
          }
          alert("No hay elementos disponibles");
      }else{
          // Si hay datos creamos la primera página
          pages = numPaginas(arrayJS);
          crearTabla(arrayJS, pages);
      }
  }
});

/* ============================================ */


/* ============ Al cambiar de página ============ */

function paginar(boton){

  /* Gestion ordenar */
  if (boton.classList.contains("ordenar")){
      let elementos = document.querySelectorAll(".ordenar");
      
      for (i=0; i<elementos.length; i++){
          elementos[i].parentNode.style.color = "black";
          if (elementos[i].classList.contains("fa-arrow-up-wide-short")){
              elementos[i].classList.remove("fa-arrow-up-short-wide");
              elementos[i].classList.add("fa-arrow-up-wide-short");
          }
          if (elementos[i] == boton){
              
              array = cargarArray(boton, ordenar[i]);
          }
      }
      boton = document.getElementsByClassName("page-item")[1];
  }else{
      array = arrayJS;
  }

  //Determinamos el número de paginas
  pages = numPaginas(array);

  /* Si es una llamada del navegador de las páginas */
  if (boton.classList.contains("page-link")){
      paginador(boton, pages);
  }
  
  delTable();
  crearTabla(array, pages);
}
/* ================================================ */

/* ============ Devuelve el array que se necesite ============ */
function cargarArray(boton, argumento){
  // console.log(argumento);
  
  /* Ordenamos el array en función de su argumento */
  array = arrayJS.sort((a,b) =>{

      /* Si es una fecha */
      if ( !(isNaN(Date.parse(a[argumento]))) ){
          return new Date(a[argumento]) - new Date(b[argumento]);

      }else{
          if (a[argumento]+"".toLowerCase() > b[argumento]+"".toLowerCase()){
              return 1;
          }else if (a[argumento]+"".toLowerCase() < b[argumento]+"".toLowerCase()){
              return -1;
          }
          return 0;
      }
  });

  /* Si Ya se ha ordenado previamente */
  if (boton.classList.contains("fa-arrow-up-short-wide")){
      boton.classList.replace("fa-arrow-up-short-wide", "fa-arrow-up-wide-short");
      boton.parentNode.style.color = "#96823b";
      array.reverse();
  }else{
      boton.parentNode.style.color = "#96823b";
      boton.classList.replace("fa-arrow-up-wide-short", "fa-arrow-up-short-wide");
  }
 

  
  // console.log(array);
  
  return array;
}
/* =========================================================== */

/* ============ Carga el número de páginas ============ */
function numPaginas(array){

  let anterior = document.getElementsByClassName("page-item")[0];
  let btn1 = document.getElementsByClassName("page-item")[1];
  let btn2 = document.getElementsByClassName("page-item")[2];
  let btn3 = document.getElementsByClassName("page-item")[3];
  let siguiente = document.getElementsByClassName("page-item")[4];

  /* check pages */
  let numPaginas = array.length/10;
  if(!(Number.isInteger(numPaginas))) {
      numPaginas = Math.trunc(numPaginas)+1
  }
  

  if(numPaginas > 0){
      btn1.classList.replace("disabled", "active");
  }
  if (numPaginas == 1){
      btn2.classList.add("disabled");
      btn3.classList.add("disabled");
      siguiente.classList.add("disabled");
  }else if(numPaginas == 2){
      if (btn1.classList.contains("disabled")){
          btn1.classList.remove("disabled");
      }else if(btn2.classList.contains("disabled")){
          btn2.classList.remove("disabled");
      }
      btn3.classList.add("disabled");
  }

  return numPaginas;
}
/* ==================================================== */

/* ============ Gestiona el navegador de las páginas ============ */
/* ============================================================== */
function paginador(link, numPaginas){

  let activo = document.querySelectorAll(".active a")[0];
  let anterior = document.getElementsByClassName("page-item")[0];
  let btn1 = document.getElementsByClassName("page-item")[1];
  let btn2 = document.getElementsByClassName("page-item")[2];
  let btn3 = document.getElementsByClassName("page-item")[3];
  let siguiente = document.getElementsByClassName("page-item")[4];
  
  /* Quitamos la clase active del boton actual */
  activo.parentNode.classList.remove('active'); /* Seleccionamos el li del elemento activo y le quitamos el active */

  /* Si van al primer elemento...  */
  if (link.innerHTML=="1" || (activo.innerHTML=="2" && link.innerHTML=="Anterior")){
      if (numPaginas == "2"){
          siguiente.classList.remove("disabled");
      }
      btn1.classList.add('active'); /* Seleccionamos el primer li y le añadimos la clase active */
      anterior.classList.add('disabled'); /* desactivamos el botón Anterior */
  }
  /* Si sale del primer elemento */
  else if (link.innerHTML - activo.innerHTML == 2 && (link.innerHTML=="3" || link.innerHTML=="2")){
      /* Renombramos los botones de una manera especial */
      btn1.firstChild.innerHTML=parseInt(link.innerHTML)-1;
      btn2.firstChild.innerHTML=link.innerHTML;
      btn3.firstChild.innerHTML=parseInt(link.innerHTML)+1;
      
      anterior.classList.remove('disabled'); /* Quitaremos la clase disabled */
      btn2.classList.add('active'); /* Seleccionamos el primer li y le añadimos la clase active */
  }
  /* Si van al ultimo elemento... */
  else if (link.innerHTML==numPaginas || (activo.innerHTML==numPaginas-1 && link.innerHTML=="Siguiente")){ //AQUI HAY QUE DETERMINAR EL NUM DE PÁGINAS
      /* Si el ultimo es la página 2*/
      if(activo.innerHTML == "1"){
          btn2.classList.add('active');
          siguiente.classList.replace('active', "disabled");
          anterior.classList.remove('disabled');
      }else{
          btn3.classList.add('active'); /* Seleccionamos el primer li y le añadimos la clase active */
      }
      siguiente.classList.add('disabled'); /* desactivamos el botón Anterior */
  }
  /* Si sale del ultimo elemento */
  else if (link.innerHTML - activo.innerHTML == -2 && (link.innerHTML==numPaginas-1 || link.innerHTML==numPaginas-2)){
      /* Renombramos los botones de una manera especial */
      btn1.firstChild.innerHTML=parseInt(link.innerHTML)-1;
      btn2.firstChild.innerHTML=parseInt(link.innerHTML)+1;
      btn3.firstChild.innerHTML=parseInt(link.innerHTML)+2;
      siguiente.classList.remove('disabled'); /* Quitaremos la clase disabled */
      btn2.classList.add('active'); /* Seleccionamos el primer li y le añadimos la clase active */
  }
  else{
      /* Si el botón anterior esta desactivado */
      if (anterior.classList.contains( 'disabled' )){ 
          anterior.classList.remove('disabled'); /* Quitaremos la clase disabled */
      }
          /* Si el botón siguiente esta desactivado */
      if (siguiente.classList.contains('disabled')){ /* Quitaremos la clase disabled */
          siguiente.classList.remove('disabled');
      }

      /* Si avanza con los botones de números */
      if (link.innerHTML !="Anterior" && link.innerHTML != "Siguiente" && link.innerHTML > activo.innerHTML && activo.innerHTML != numPaginas){
          btn1.firstChild.innerHTML=activo.innerHTML;
          btn3.firstChild.innerHTML=parseInt(activo.innerHTML)+2;
          btn2.firstChild.innerHTML=parseInt(activo.innerHTML)+1;
      }
      /* Si retocede con los botones de números */
      else if(link.innerHTML !="Anterior" && link.innerHTML != "Siguiente" && link.innerHTML < activo.innerHTML){
          btn1.firstChild.innerHTML=parseInt(activo.innerHTML)-2;
          btn3.firstChild.innerHTML=activo.innerHTML;
          btn2.firstChild.innerHTML=activo.innerHTML-1;
      }
      btn2.classList.add('active'); /* Seleccionamos el primer li y le añadimos la clase active */
  }

  /* Cambiamos el número de los botones con siguiente */
  if(link.innerHTML=="Siguiente" && activo.innerHTML != numPaginas-1){
      btn1.firstChild.innerHTML=activo.innerHTML;
      btn3.firstChild.innerHTML=parseInt(activo.innerHTML)+2;
      btn2.firstChild.innerHTML=parseInt(activo.innerHTML)+1;
  }
  /* Cambiamos el número de los botones Anterior */
  else if (link.innerHTML=="Anterior"&& activo.innerHTML != 2 && activo.innerHTML!=numPaginas){
      btn1.firstChild.innerHTML=parseInt(activo.innerHTML)-2;
      btn3.firstChild.innerHTML=activo.innerHTML;
      btn2.firstChild.innerHTML=activo.innerHTML-1;
  }
}
/* ============================================================== */


/* ============ Elimina la tabla anterior ============ */
function delTable(){
  document.querySelectorAll("tbody")[0].remove();
}
/* ==================================================== */
/* ============ Hace la tabla en función del numero de páginas y el array ============ */
function crearTabla(array, numPaginas){

  /* Indicamos el número de elementos que deseamos en la página */
  let activo = document.querySelectorAll(".active a")[0];

  inicio = (activo.innerHTML+0)-10;
  // console.log(numPaginas+" "+activo.innerHTML);
  if (activo.innerHTML == numPaginas){
      // console.log(array.length);
      fin = array.length;
  }else{
      fin = (activo.innerHTML+0);
  }

  // console.log(inicio+" "+fin);

  /* Seleccionamos la tabla y creamos el body de la tabla */
  let table = document.getElementsByTagName("table")[0];
  let tblBody = document.createElement("tbody");

   /* Crea las celdas */
  for (i=inicio; i<fin; i++) {
      /* Crea las hileras de la tabla */
      let fila = document.createElement("tr");

      for (j = 0; j<atributos.length; j++) {
          // Crea un elemento <td> y un nodo de texto, haz que el nodo de
          // texto sea el contenido de <td>, ubica el elemento <td> al final
          // de la hilera de la tabla

          let celda = document.createElement("td");
          textoCelda = document.createTextNode(array[i][atributos[j]]);


          if (j==atributos.length-1){

                    /* Creamos los botones de editar y borrar */
                    id = array[i][atributos[j]];
   
                    if (tableName == "Carrito"){
                        borrar = document.createElement("button");
                        borrar.classList.add("btn", "color-logo", "btn-square-md", "mx-lg-2", "my-2", "delete");
                        borrar.setAttribute("onclick", "openModal(this);");
                        borrar.setAttribute("name", array[i][atributos[j]]);
                        icono2 = document.createElement("i");
                        icono2.classList.add("fa-solid", "fa-trash-can");
                        borrar.appendChild(icono2);
                        celda.appendChild(borrar);

                      } else {

                        editFetch = document.createElement("button");
                        editFetch.classList.add("btn", "color-logo", "btn-square-md", "mx-lg-2", "my-2", "edit");
                        editFetch.setAttribute("onclick", "editarCampo(this);");
                        editFetch.setAttribute("name", id);
                        icono1 = document.createElement("i");
                        icono1.classList.add("fa-solid", "fa-pen-to-square");
                        editFetch.appendChild(icono1);
                        celda.appendChild(editFetch);
  
                        borrar = document.createElement("button");
                        borrar.classList.add("btn", "color-logo", "btn-square-md", "mx-lg-2", "my-2", "delete");
                        borrar.setAttribute("onclick", "openModal(this);");
                        borrar.setAttribute("name", array[i][atributos[j]]);
                        icono2 = document.createElement("i");
                        icono2.classList.add("fa-solid", "fa-trash-can");
                        borrar.appendChild(icono2);
                        celda.appendChild(borrar);
  
                      }   

          }

          if (j != atributos.length-1){
              celda.appendChild(textoCelda);
              
          }
          fila.appendChild(celda);
      }

      // Agrega la hilera al final de la tabla
      tblBody.appendChild(fila);
  }
  // Colocamos el body en la tabla
  table.appendChild(tblBody);
}

function crearButtons(tableName, celda, id, fila){
    
  switch (tableName) {
      case "Usuarios":
          /* Botón editar */
          editFetch = document.createElement("button");
          editFetch.classList.add("btn", "color-logo", "btn-square-md", "mx-lg-2", "my-2", "edit");
          editFetch.setAttribute("onclick", "editarCampo(this);");
          editFetch.setAttribute("name", id);
          icono1 = document.createElement("i");
          icono1.classList.add("fa-solid", "fa-pen-to-square");
          editFetch.appendChild(icono1);
          celda.appendChild(editFetch);

          /* Botón borrar */
          borrar = document.createElement("button");
          borrar.classList.add("btn", "color-logo", "btn-square-md", "mx-lg-2", "my-2", "delete");
          borrar.setAttribute("onclick", "openModal(this);");
          borrar.setAttribute("name", id);
          icono2 = document.createElement("i");
          icono2.classList.add("fa-solid", "fa-trash-can");
          borrar.appendChild(icono2);
          celda.appendChild(borrar);
          break;
      case "Categorias":
            /* Botón editar */
            editFetch = document.createElement("button");
            editFetch.classList.add("btn", "color-logo", "btn-square-md", "mx-lg-2", "my-2", "edit");
            editFetch.style("background-color: #96823b");
            editFetch.setAttribute("onclick", "editarCampo(this);");
            editFetch.setAttribute("name", id);
            icono1 = document.createElement("i");
            icono1.classList.add("fa-solid", "fa-pen-to-square");
            editFetch.appendChild(icono1);
            celda.appendChild(editFetch);
  
            /* Botón borrar */
            borrar = document.createElement("button");
            borrar.classList.add("btn", "color-logo", "btn-square-md", "mx-lg-2", "my-2", "delete");
            borrar.setAttribute("onclick", "openModal(this);");
            borrar.setAttribute("name", id);
            icono2 = document.createElement("i");
            icono2.classList.add("fa-solid", "fa-trash-can");
            borrar.appendChild(icono2);
            celda.appendChild(borrar);
            break;
        case "Productos":
            /* Botón editar */
            editFetch = document.createElement("button");
            editFetch.classList.add("btn", "color-logo", "btn-square-md", "mx-lg-2", "my-2", "edit");
            editFetch.style("background-color: #96823b");
            editFetch.setAttribute("onclick", "editarCampo(this);");
            editFetch.setAttribute("name", id);
            icono1 = document.createElement("i");
            icono1.classList.add("fa-solid", "fa-pen-to-square");
            editFetch.appendChild(icono1);
            celda.appendChild(editFetch);
  
            /* Botón borrar */
            borrar = document.createElement("button");
            borrar.classList.add("btn", "color-logo", "btn-square-md", "mx-lg-2", "my-2", "delete");
            borrar.setAttribute("onclick", "openModal(this);");
            borrar.setAttribute("name", id);
            icono2 = document.createElement("i");
            icono2.classList.add("fa-solid", "fa-trash-can");
            borrar.appendChild(icono2);
            celda.appendChild(borrar);
            break;
        case "Carrito":

            /* Botón borrar */
            borrar = document.createElement("button");
            borrar.classList.add("btn", "color-logo", "btn-square-md", "mx-lg-2", "my-2", "delete");
            borrar.setAttribute("onclick", "openModal(this);");
            borrar.setAttribute("name", id);
            icono2 = document.createElement("i");
            icono2.classList.add("fa-solid", "fa-trash-can");
            borrar.appendChild(icono2);
            celda.appendChild(borrar);
            break;
    }
    return celda;
}

function editarCampo(boton){
    openModal(boton);
    cargarDatos(boton.name);
}

async function cargarDatos(idCampo){
    

    await fetch(funciones[0]+"/"+funciones[1]+"/"+arrayfetch[0]+"/"+idCampo,{
        headers: {
            "Content-Type": "application/json"
        },
        credentials: 'include'
    })
        .then((resp) => resp.json())
        .then(function(data) {
            console.log(data);

            /* Pillamos los inputs y selects del formEditar */
            const Form = document.getElementById("editForm");
            const inputs = Form.getElementsByTagName("input");
            const select = Form.getElementsByTagName("select");
            const textarea = Form.getElementsByTagName("textarea");



            /* Relleno los datos de los inputs */
            for(i=0; i<inputs.length; i++){
                if (inputs[i].name == "imagen"){
                    foto = document.getElementById("idFoto");
                    foto.setAttribute("src", rutaFoto[0]+rutaFoto[1]+data[0][inputs[i].name]);
                }else{
                    inputs[i].value = data[0][inputs[i].name];
                }

            }

            /* Relleno los datos de los textarea */
            for(i=0; i<textarea.length; i++){
             
                textarea[i].value = data[0][textarea[i].name];
               
            }

            /* Selecciona los datos correctos de los selects */
            if (select != null){
                for(i=0; i<select.length; i++){

                    options = select[i].getElementsByTagName("option");

                    for(j=0; j<options.length; j++){
                        
                        
                        if(options[j].value == data[0][select[i].name]){
                            options[j].selected = true;

                        }
                    }
                }
            }


            
        })
}


async function editarDatos(){

    const datosForm = new FormData(document.getElementsByTagName("form")[0]);
    const form = document.getElementsByTagName("form")[0];
    const id = form.getElementsByTagName("input")[0].value;
    
    await fetch(funciones[0]+"/"+funciones[1]+"/"+arrayfetch[1], {
        method: "POST",
        body: datosForm,
    })

    
        .then((resp) => resp.json())
        .then(function(data) {

                
            if (data){

                
                campo = document.getElementsByName(id)[0].parentNode;
                fila = campo.parentNode;
                campos = fila.getElementsByTagName("td");
                const rol = document.querySelector("#ponerRol");
                // const rol = document.querySelector("#ponerRol");;

                    for(i=0; i<campos.length-1; i++){



                        campos[i].innerHTML =  datosForm.get(formData[i]);
                            if(campos[5]){

                                campos[5].innerHTML = rol.dataset.nombre;
                            
                                }

                    }
                
                    

                    console.log(rol.dataset.nombre);
                    console.log(campos[5]);

            }else{
                alert("error");
            }
        })
    }
        

