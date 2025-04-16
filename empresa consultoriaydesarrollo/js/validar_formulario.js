//obtener el formulario y los campos
const formulario = document.getElementById('formularioContacto');
const nombreInput = document.getElementById('nombreForm');
const emailInput = document.getElementById('emailForm');
const region = document.getElementById('region-pais');
const ciudad = document.getElementById('cuidad-pais');
const requerimientosTextarea = document.getElementById('exampleFormControlTextarea1');

// función para validar el formulario
function validarFormulario(event) {
    event.preventDefault(); // Evitar el envío del formulario si hay errores
    let errores = [];
    //validar nombre
    if(nombreInput.value.trim() === ''){
        errores.push('El nombre es obligatorio.');
    }
    
  // Validar el correo electrónico
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(emailInput.value.trim())) {
    errores.push('El campo "Email" debe contener un correo válido.');
  }

  // Validar la región
  if (region.value === 'Seleccione región') {
    errores.push('Debe seleccionar una región.');
  }

  // Validar la ciudad
  if (ciudad.value === 'Seleccione ciudad') {
    errores.push('Debe seleccionar una ciudad.');
  }

  // Validar los requerimientos
  if (requerimientosTextarea.value.trim() === '') {
    errores.push('El campo "Requerimientos" es obligatorio.');
  }

  // Mostrar errores o enviar el formulario
  if (errores.length > 0) {
    alert(errores.join('\n')); // Mostrar los errores en un cuadro de alerta
  } else {
    alert('Formulario enviado correctamente.');
    formulario.submit(); // Enviar el formulario si no hay errores
  }
}

// Agregar el evento de validación al formulario
formulario.addEventListener('submit', validarFormulario);