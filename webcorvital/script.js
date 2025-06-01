document.querySelector('.buscador')?.addEventListener('submit', e => {
  e.preventDefault();
  alert('Buscando especialistas...');
});

// Mostrar sección Sobre Nosotros y ocultar Inicio
function mostrarSobreNosotros() {
  document.querySelector('.hero').style.display = 'none';
  document.querySelector('.info').style.display = 'none';
  document.querySelector('.sobre-nosotros').style.display = 'block';
  document.getElementById('servicios').style.display = 'none'; // Oculta servicios
  document.getElementById('contacto').style.display = 'none';
  document.getElementById('trabaja-nosotros').style.display = 'none';
  localStorage.setItem('seccionActiva', 'sobre-nosotros');
}
// Mostrar sección Inicio y ocultar Sobre Nosotros
function mostrarInicio() {
  document.querySelector('.hero').style.display = '';
  document.querySelector('.info').style.display = '';
  document.querySelector('.sobre-nosotros').style.display = 'none';
  document.getElementById('servicios').style.display = 'none'; // Oculta servicios
  document.getElementById('contacto').style.display = 'none';
  document.getElementById('trabaja-nosotros').style.display = 'none';
  localStorage.setItem('seccionActiva', 'inicio');
}

function mostrarContacto() {
  document.querySelector('.hero').style.display = 'none';
  document.querySelector('.info').style.display = 'none';
  document.querySelector('.sobre-nosotros').style.display = 'none';
  document.getElementById('servicios').style.display = 'none'; // Oculta servicios
  document.getElementById('contacto').style.display = 'block';
  document.getElementById('trabaja-nosotros').style.display = 'none';
  localStorage.setItem('seccionActiva', 'contacto');
}

function mostrarServicios() {
  document.querySelector('.hero').style.display = 'none';
  document.querySelector('.info').style.display = 'none';
  document.querySelector('.sobre-nosotros').style.display = 'none';
  document.getElementById('servicios').style.display = 'block';
  document.getElementById('contacto').style.display = 'none';
  document.getElementById('trabaja-nosotros').style.display = 'none';
  localStorage.setItem('seccionActiva', 'servicios');
}

// Mostrar sección Trabaja con Nosotros
function mostrarTrabajaNosotros() {
  document.querySelector('.hero').style.display = 'none';
  document.querySelector('.info').style.display = 'none';
  document.querySelector('.sobre-nosotros').style.display = 'none';
  document.getElementById('servicios').style.display = 'none';
  document.getElementById('contacto').style.display = 'none';
  document.getElementById('trabaja-nosotros').style.display = 'block';
  localStorage.setItem('seccionActiva', 'trabaja-nosotros');
}

// Restaurar la última sección activa al cargar la página
window.addEventListener('DOMContentLoaded', () => {
  const seccion = localStorage.getItem('seccionActiva');
  if (seccion === 'sobre-nosotros') mostrarSobreNosotros();
  else if (seccion === 'servicios') mostrarServicios();
  else if (seccion === 'contacto') mostrarContacto();
  else if (seccion === 'trabaja-nosotros') mostrarTrabajaNosotros();
  else mostrarInicio();
});

document.getElementById('link-sobre').addEventListener('click', function (e) {
    e.preventDefault();
    mostrarSobreNosotros();
});

document.getElementById('link-inicio').addEventListener('click', function (e) {
    e.preventDefault();
    mostrarInicio();
});

document.getElementById('link-contacto').addEventListener('click', function (e) {
  e.preventDefault();
  mostrarContacto();
});

document.getElementById('link-servicios').addEventListener('click', function (e) {
  e.preventDefault();
  mostrarServicios();
});

// Evento para mostrar Trabaja con Nosotros
document.getElementById('link-trabaja').addEventListener('click', function (e) {
  e.preventDefault();
  mostrarTrabajaNosotros();
});

const footerSobre = document.getElementById('footer-sobre');
if (footerSobre) {
  footerSobre.addEventListener('click', function (e) {
    e.preventDefault();
    mostrarSobreNosotros();
  });
}

// Ejemplo de datos de órganos (puedes modificar según tu lógica real)
const organos = [
  { nombre: "Corazon", cantidad: 2, precio: "$50,000" },
  { nombre: "Riñon", cantidad: 5, precio: "$30,000" },
  { nombre: "Hgado", cantidad: 1, precio: "$70,000" }
];

document.getElementById('buscar-org').addEventListener('click', function () {
  const nombre = document.getElementById('nombre-org').value.trim().toLowerCase();
  const resultado = organos.find(org => org.nombre.toLowerCase() === nombre);
  const resultadoDiv = document.getElementById('resultado-org');
  if (resultado) {
    resultadoDiv.innerHTML = `
      <strong>${resultado.nombre}</strong><br>
      Cantidad disponible: ${resultado.cantidad}<br>
      Precio: ${resultado.precio}
    `;
  } else {
    resultadoDiv.textContent = "Órgano no encontrado.";
  }
});


 // Para validar la seleccion de organos 
document.getElementById('buscar-org').addEventListener('click', function () {
  const dietaDonante = document.getElementById('dieta-donante').value;
  const dietaPaciente = document.getElementById('dieta-paciente').value;
  const nombre = document.getElementById('nombre-org').value.trim().toLowerCase();
  const resultadoDiv = document.getElementById('resultado-org');

  // Validar: al menos uno debe estar seleccionado
  if (!dietaDonante && !dietaPaciente) {
    resultadoDiv.textContent = "Completa la casilla superior";
    return;
  }

  // Buscar órgano solo si hay nombre
  if (nombre) {
    const resultado = organos.find(org => org.nombre.toLowerCase() === nombre);
    if (resultado) {
      resultadoDiv.innerHTML = `
        <strong>${resultado.nombre}</strong><br>
        Cantidad disponible: ${resultado.cantidad}<br>
        Precio: ${resultado.precio}
      `;
    } else {
      resultadoDiv.textContent = "Órgano no encontrado.";
    }
  } else {
    resultadoDiv.textContent = "";
  }
});

// Limpia el resultado cuando el input queda vacío
document.getElementById('nombre-org').addEventListener('input', function () {
  if (this.value.trim() === "") {
    document.getElementById('resultado-org').textContent = "";
  }
});

// MODALES SOBRE NOSOTROS
document.querySelectorAll('.sobre-card').forEach(card => {
  card.addEventListener('click', function() {
    const modalId = this.getAttribute('data-modal');
    document.getElementById(modalId).classList.add('activo');
  });
});

document.querySelectorAll('.sobre-modal-cerrar').forEach(btn => {
  btn.addEventListener('click', function() {
    this.closest('.sobre-modal').classList.remove('activo');
  });
});

// Cerrar modal al hacer clic fuera del contenido
document.querySelectorAll('.sobre-modal').forEach(modal => {
  modal.addEventListener('click', function(e) {
    if (e.target === this) {
      this.classList.remove('activo');
    }
  });
});

// Mostrar la sección de perfil y ocultar las demás
document.addEventListener('DOMContentLoaded', function() {
    var linkPerfil = document.getElementById('perfil-menu-link');
    if (linkPerfil) {
        linkPerfil.addEventListener('click', function(e) {
            e.preventDefault();
            // Oculta todas las secciones
            document.querySelectorAll('.seccion').forEach(function(sec) {
                sec.style.display = 'none';
            });
            // Muestra la sección de perfil
            var perfil = document.getElementById('perfil');
            if (perfil) perfil.style.display = 'block';
        });
    }
});

// Detectar cambio en el select de tipo-consulta
document.addEventListener('DOMContentLoaded', function() {
    const tipoConsulta = document.getElementById('tipo-consulta');
    const btnBuscar = document.getElementById('btn-buscar-contacto');
    const resultadoOrganos = document.getElementById('resultado-organos');
    const resultadoCantidadHumanos = document.getElementById('resultado-cantidad-humanos');

    btnBuscar.addEventListener('click', function() {
        resultadoOrganos.classList.remove('show-result');
        resultadoCantidadHumanos.classList.remove('show-result');
        resultadoOrganos.style.display = 'none';
        resultadoCantidadHumanos.style.display = 'none';
        resultadoOrganos.innerHTML = '';
        resultadoCantidadHumanos.innerHTML = '';

        if (tipoConsulta.value === 'organos') {
            fetch('http://localhost:8082/OrgansTypes')
                .then(res => res.json())
                .then(data => {
                    if (Array.isArray(data) && data.length > 0) {
                        let html = `<strong>Cantidad de órganos disponibles:</strong> ${data.length}<br><br>`;
                        html += '<h4>Órganos disponibles:</h4><ul>';
                        data.forEach(organo => {
                            html += `<li><strong>Órgano:</strong> ${organo.nombre || organo.name || 'Sin nombre'}</li>`;
                        });
                        html += '</ul>';
                        resultadoOrganos.innerHTML = html;
                        resultadoOrganos.style.display = 'block';
                        setTimeout(() => resultadoOrganos.classList.add('show-result'), 10);
                    } else {
                        resultadoOrganos.innerHTML = 'No hay órganos disponibles.';
                        resultadoOrganos.style.display = 'block';
                        setTimeout(() => resultadoOrganos.classList.add('show-result'), 10);
                    }
                })
                .catch(() => {
                    resultadoOrganos.innerHTML = 'Error al obtener los órganos.';
                    resultadoOrganos.style.display = 'block';
                    setTimeout(() => resultadoOrganos.classList.add('show-result'), 10);
                });
        } else if (tipoConsulta.value === 'humanos') {
            fetch('http://localhost:8082/Humans')
                .then(res => res.json())
                .then(data => {
                    if (Array.isArray(data)) {
                        let html = `<strong>Cantidad de humanos registrados:</strong> ${data.length}<br><br>`;
                        html += '<h4>Datos de humanos registrados:</h4><ul>';
                        data.forEach(humano => {
                            html += `<li><ul>`;
                            Object.keys(humano).forEach(key => {
                                if (key.toLowerCase() !== 'password') {
                                    html += `<li><strong>${key}:</strong> ${humano[key]}</li>`;
                                }
                            });
                            html += `</ul></li>`;
                        });
                        html += '</ul>';
                        resultadoCantidadHumanos.innerHTML = html;
                        resultadoCantidadHumanos.style.display = 'block';
                        setTimeout(() => resultadoCantidadHumanos.classList.add('show-result'), 10);
                        resultadoOrganos.style.display = 'none';
                    } else {
                        resultadoCantidadHumanos.innerHTML = 'No se pudo obtener la cantidad de humanos registrados.';
                        resultadoCantidadHumanos.style.display = 'block';
                        setTimeout(() => resultadoCantidadHumanos.classList.add('show-result'), 10);
                    }
                })
                .catch(() => {
                    resultadoCantidadHumanos.innerHTML = 'Error al obtener los humanos registrados.';
                    resultadoCantidadHumanos.style.display = 'block';
                    setTimeout(() => resultadoCantidadHumanos.classList.add('show-result'), 10);
                });
        }
    });
});

// Registro de humanos en la API
document.addEventListener('DOMContentLoaded', function() {
    const formRegistro = document.getElementById('form-registro-humano');
    const mensajeRegistro = document.getElementById('mensaje-registro-humano');
    if (formRegistro) {
        formRegistro.addEventListener('submit', function(e) {
            e.preventDefault();
            mensajeRegistro.textContent = '';
            const data = {
                nombre: document.getElementById('nombre-humano').value,
                apellido: document.getElementById('apellido-humano').value,
                edad: document.getElementById('edad-humano').value,
                gender: document.getElementById('gender-humano').value,
                bloodType: document.getElementById('bloodtype-humano').value,
                email: document.getElementById('email-humano').value,
                telefono: document.getElementById('telefono-humano').value
            };
            fetch('http://localhost:8082/Humans', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
            .then(res => res.ok ? res.json() : Promise.reject(res))
            .then(() => {
                mensajeRegistro.style.color = 'green';
                mensajeRegistro.textContent = '¡Humano registrado exitosamente!';
                formRegistro.reset();
            })
            .catch(() => {
                mensajeRegistro.style.color = 'red';
                mensajeRegistro.textContent = 'Error al registrar humano. Intenta nuevamente.';
            });
        });
    }
});

// Registro de órganos en la API
document.addEventListener('DOMContentLoaded', function() {
    const formRegistroOrgano = document.getElementById('form-registro-organo');
    const mensajeRegistroOrgano = document.getElementById('mensaje-registro-organo');
    if (formRegistroOrgano) {
        formRegistroOrgano.addEventListener('submit', function(e) {
            e.preventDefault();
            mensajeRegistroOrgano.textContent = '';
            const data = {
                nombre: document.getElementById('nombre-organo').value
            };
            fetch('http://localhost:8082/OrgansTypes', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
            .then(res => res.ok ? res.json() : Promise.reject(res))
            .then(() => {
                mensajeRegistroOrgano.style.color = 'green';
                mensajeRegistroOrgano.textContent = '¡Órgano registrado exitosamente!';
                formRegistroOrgano.reset();
            })
            .catch(() => {
                mensajeRegistroOrgano.style.color = 'red';
                mensajeRegistroOrgano.textContent = 'Error al registrar órgano. Intenta nuevamente.';
            });
        });
    }
});