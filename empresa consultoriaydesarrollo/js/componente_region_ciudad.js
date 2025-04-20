// Ruta al archivo JSON
const JSON_URL = 'empresa consultoriaydesarrollo/json/tlp.json';

// Obtener los elementos del DOM
const regionSelect = document.getElementById('region-pais');
const ciudadSelect = document.getElementById('cuidad-pais');

// Función para cargar las regiones
function cargarRegiones() {
  // Crear un nuevo objeto XMLHttpRequest
  const xhr = new XMLHttpRequest();
  // Abrir la conexión con el método GET y la URL del archivo JSON
  xhr.open('GET', JSON_URL, true);
  // Definir la función que se ejecutará cuando se reciba la respuesta
  xhr.onload = function () {
    // Verificar si la solicitud fue exitosa (código de estado 200)
    if (xhr.status === 200) {
      // Convertir la respuesta JSON en un objeto JavaScript
      const data = JSON.parse(xhr.responseText);

      // Llenar el select de regiones
      let regionOptions = '<option selected>Seleccione región</option>';
      ///recorrer el array de regiones y crear una opción para cada una
      data.regiones.forEach((region) => {
        ///agregar la opción al select de regiones
        regionOptions += `<option value="${region.region}">${region.region}</option>`;
      });
      ///asignar las opciones al select de regiones
      regionSelect.innerHTML = regionOptions;

      // Agregar evento para cargar comunas al seleccionar una región
      regionSelect.addEventListener('change', function () {
        /// cargar las comunas según la región seleccionada
        cargarComunas(data, this.value);
      });
    }
  };
  //ENVIAR LA SOLICITUD
  xhr.send();
}

// Función para cargar las comunas según la región seleccionada
function cargarComunas(data, regionSeleccionada) {
  const region = data.regiones.find((r) => r.region === regionSeleccionada);
// Verificar si se encontró la región seleccionada
  if (region) {
    /// limpiar el select de ciudades
    let comunaOptions = '<option selected>Seleccione ciudad</option>';
    region.comunas.forEach((comuna) => {
      ///agregar la opción al select de ciudades
      comunaOptions += `<option value="${comuna}">${comuna}</option>`;
    });
    // Asignar las opciones al select de ciudades
    ciudadSelect.innerHTML = comunaOptions;
  } else {
    // Si no se encuentra la región, limpiar el select de ciudades
    ciudadSelect.innerHTML = '<option selected>Seleccione ciudad</option>';
  }
}

// Llamar a la función para cargar las regiones al cargar la página
document.addEventListener('DOMContentLoaded', cargarRegiones);