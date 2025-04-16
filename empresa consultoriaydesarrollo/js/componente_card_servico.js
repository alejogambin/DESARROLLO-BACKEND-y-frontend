// ruta al archivo JSON
const SERVICIOS_JSON_URL = './json/servicio.json';

//contenedor donde se mostraran las tarjetas de servicios
const serviciosContainer = document.getElementById('servicios-container');

//función para cargar los servicios desde el archivo JSON
function cargarServicios() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', SERVICIOS_JSON_URL, true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      const data = JSON.parse(xhr.responseText);

      //generar las tarjetas de servicios
      let serviciosHTML = '';
      data.forEach((servicio) => {
    serviciosHTML += `
        <div class="container d-flex flex-wrap justify-content-center align-items-center">
        <div class="col-lg-3 d-flex justify-content-center">    
        <div class="card">
        <h3 class="card-title">${servicio.nombre}</h3>
        <p class="card-description">${servicio.descripcion}</p>
        <p class="card-cost">costo: $${servicio.costo}</p>
        <p class="card-duration">${servicio.duracion} horas</p>
        </div></div></div>
        `;
        });
        //insertar las tarjetas en el contenedor
        serviciosContainer.innerHTML = serviciosHTML;
    } else {
      console.error('Error al cargar el archivo JSON de servicios.');
    }
  };
  xhr.send();
}
//llamar a la función para cargar los servicios al cargar la página
document.addEventListener('DOMContentLoaded', cargarServicios);