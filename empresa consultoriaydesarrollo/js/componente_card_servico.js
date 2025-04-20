// ruta al archivo JSON
const SERVICIOS_JSON_URL = 'empresa consultoriaydesarrollo/json/servicio.json';

//contenedor donde se mostraran las tarjetas de servicios
const serviciosContainer = document.getElementById('servicios-container');

//función para cargar los servicios desde el archivo JSON
function cargarServicios() {
  ///realizar una solicitud HTTP para obtener el archivo JSON
  // Crear un nuevo objeto XMLHttpRequest
  const xhr = new XMLHttpRequest();
  ///abrir la conexión con el método GET y la URL del archivo JSON
  xhr.open('GET', SERVICIOS_JSON_URL, true);
  // Definir la función que se ejecutará cuando se reciba la respuesta
  xhr.onload = function () {
    ///verificar si la solicitud fue exitosa (código de estado 200)
    ///si la solicitud fue exitosa, procesar la respuesta
    if (xhr.status === 200) {
      //parsing the JSON response
      // Convertir la respuesta JSON en un objeto JavaScript
      const data = JSON.parse(xhr.responseText);
      //generar las tarjetas de servicios
      let serviciosHTML = '';
      //recorrer los servicios y crear una tarjeta para cada uno
      //recorrer el array de servicios y crear una tarjeta para cada uno
      data.forEach((servicio) => {
    serviciosHTML += `
        <div class="col-lg-3 col-md-4 col-sm-6 mt-3 d-flex justify-content-center">
            <div class="card shadow rounded-3" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-center">${servicio.nombre}</h5>
                <p class="card-text">${servicio.descripcion}</p>
                <p class="card-text"><strong>Costo:</strong> $${servicio.costo}</p>
                <p class="card-text"><strong>Duración:</strong> ${servicio.duracion} horas</p>
              </div>
            </div>
          </div>
        `;
        });
        //insertar las tarjetas en el contenedor
        serviciosContainer.innerHTML = serviciosHTML;
    } else {
      console.error('Error al cargar el archivo JSON de servicios.');
    }
  };
  ///enviar la solicitud
  xhr.send();
}
//llamar a la función para cargar los servicios al cargar la página
document.addEventListener('DOMContentLoaded', cargarServicios);