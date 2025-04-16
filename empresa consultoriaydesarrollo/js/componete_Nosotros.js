//ruta al archivo JSON
const NOSOTROS_JSON_URL = './json/Nosotros.json';

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
  const xhr = new XMLHttpRequest();
  xhr.open('GET', NOSOTROS_JSON_URL, true);
  xhr.onload = function () {
    if (xhr.status === 200) {
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