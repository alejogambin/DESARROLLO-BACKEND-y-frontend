//obtener el formulario y los campos
const formulario = document.getElementById('formularioContacto');
const nombreInput = document.getElementById('nombreForm');
const emailInput = document.getElementById('emailForm');
const region = document.getElementById('region-pais');
const ciudad = document.getElementById('cuidad-pais');
const requerimientosTextarea = document.getElementById('exampleFormControlTextarea1');

// Función para limpiar el formulario
function limpiarFormulario() {
  nombreInput.value = '';
  emailInput.value = '';
  region.value = 'Seleccione región';
  ciudad.value = 'Seleccione ciudad';
  requerimientosTextarea.value = '';
  limpiarErrores(); // También limpia los mensajes de error
}

//Funcion para limpiar mensajes de error 
function limpiarErrores() {
  document.querySelectorAll('error-menssage').forEach((span) => {
    span.textContent = '';
  })
}
// función para validar el formulario
function validarFormulario(event) {
  event.preventDefault(); // Evitar el envío del formulario si hay errores
  limpiarErrores(); // Limpiar mensajes de error previos

  let errores = 0;
  //validar nombre
  if (nombreInput.value.trim() === '') {
    document.getElementById('error-nombre').textContent = 'El campo "Nombre Completo" es obligatorio.';
    errores++;
  }

  // Validar el correo electrónico
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(emailInput.value.trim())) {
    document.getElementById('error-email').textContent = 'El campo "Email" debe contener un correo válido.';
    errores++;
  }

  // Validar la región
  if (region.value === 'Seleccione región') {
    document.getElementById('error-region').textContent = 'Debe seleccionar una región.';
    errores++;
  }

  // Validar la ciudad
  if (ciudad.value === 'Seleccione ciudad') {
    document.getElementById('error-ciudad').textContent = 'Debe seleccionar una ciudad.';
    errores++;
  }

  // Validar los requerimientos
  if (requerimientosTextarea.value.trim() === '') {
    document.getElementById('error-requerimientos').textContent = 'El campo "Requerimientos" es obligatorio.';
    errores++;
  }

  // Mostrar errores o enviar el formulario
  if (errores === 0) {
    Swal.fire({
      title: "Envio Exitoso!",
      text: "Nos pondremos en contacto la a brevedad!",
      icon: "success"
      })
    limpiarFormulario();
  }
}


// Agregar el evento de validación al formulario
formulario.addEventListener('submit', validarFormulario);