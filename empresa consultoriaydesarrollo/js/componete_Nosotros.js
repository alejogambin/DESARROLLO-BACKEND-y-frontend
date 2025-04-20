//ruta al archivo JSON
const NOSOTROS_JSON_URL = 'empresa consultoriaydesarrollo/json/Nosotros.json';

//Elementos del DOM donde se mostraran la mision y vision 
const misionElement = document.getElementById('mision');
const visionElement = document.getElementById('vision');

// Función para cargar la misión 
function cargarMision() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', NOSOTROS_JSON_URL, true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      const data = JSON.parse(xhr.responseText);

      // Mostrar la misión en el elemento correspondiente
      misionElement.innerHTML = `<p>${data[0].mision}</p>`;
    } else {
      console.error('Error al cargar el archivo JSON de misión.');
    }
  };
  xhr.send();
}

function cargarVision() {
  ///realizar una solicitud HTTP para obtener el archivo JSON
  const xhr = new XMLHttpRequest();
  ///abrir la conexión con el método GET y la URL del archivo JSON
  xhr.open('GET', NOSOTROS_JSON_URL, true);
  /// Definir la función que se ejecutará cuando se reciba la respuesta
  xhr.onload = function () {
    if (xhr.status === 200) {
      /// Convertir la respuesta JSON en un objeto JavaScript
      const data = JSON.parse(xhr.responseText);

      // Mostrar la visión en el elemento correspondiente
      visionElement.innerHTML = `<p>${data[0].vision}</p>`;
    } else {
      console.error('Error al cargar el archivo JSON de visión.');
    }
  };
  xhr.send();
}

// Llamar a las funciones para cargar la misión y visión al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    cargarMision();
    cargarVision();
  });