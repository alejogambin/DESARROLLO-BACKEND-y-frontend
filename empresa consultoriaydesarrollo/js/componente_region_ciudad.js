// Ruta al archivo JSON
const JSON_URL = '/empresa consultoriaydesarrollo/json/tlp.json';

// Obtener los elementos del DOM
const regionSelect = document.getElementById('region-pais');
const ciudadSelect = document.getElementById('cuidad-pais');

// Función para cargar las regiones
function cargarRegiones() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', JSON_URL, true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      const data = JSON.parse(xhr.responseText);

      // Llenar el select de regiones
      let regionOptions = '<option selected>Seleccione región</option>';
      data.regiones.forEach((region) => {
        regionOptions += `<option value="${region.region}">${region.region}</option>`;
      });
      regionSelect.innerHTML = regionOptions;

      // Agregar evento para cargar comunas al seleccionar una región
      regionSelect.addEventListener('change', function () {
        cargarComunas(data, this.value);
      });
    }
  };
  xhr.send();
}

// Función para cargar las comunas según la región seleccionada
function cargarComunas(data, regionSeleccionada) {
  const region = data.regiones.find((r) => r.region === regionSeleccionada);

  if (region) {
    let comunaOptions = '<option selected>Seleccione ciudad</option>';
    region.comunas.forEach((comuna) => {
      comunaOptions += `<option value="${comuna}">${comuna}</option>`;
    });
    ciudadSelect.innerHTML = comunaOptions;
  } else {
    ciudadSelect.innerHTML = '<option selected>Seleccione ciudad</option>';
  }
}

// Llamar a la función para cargar las regiones al cargar la página
document.addEventListener('DOMContentLoaded', cargarRegiones);