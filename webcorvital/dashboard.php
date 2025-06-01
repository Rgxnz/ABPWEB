<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CorVital - Encuentra tu especialista</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <!-- Fondo animado -->
    <div class="animated-bg">
        <svg viewBox="0 0 1200 200" preserveAspectRatio="none">
            <path class="wave" d="M0,100 Q300,200 600,100 T1200,100 V200 H0 Z"/>
        </svg>
    </div>
  <!-- HEADER -->
    <header class="header">
        <div class="contenedor-header">
        <h1 class="logo">
            <img src="imagenes/logosinfondo.png" alt="Logo CorVital">
        </h1>
        <nav class="nav">
            <a href="#" id="link-inicio">Inicio</a>
            <a href="#" id="link-sobre">Nosotros</a>
            <a href="#" id="link-servicios">Requisitos</a>
            <a href="#" id="link-contacto">Organos</a>
        </nav>

        <div class="acciones">
            <div class="usuario-header">
                <div class="usuario-foto-nombre">
                    <img src="imagenes/logosinfondo.png" alt="Foto de perfil" class="foto-perfil-header">
                    <div class="usuario-nombre"><?= htmlspecialchars($_SESSION["usuario"]) ?></div>
                </div>
                <div class="usuario-menu">
                    <button class="usuario-menu-btn">&#9662;</button>
                    <div class="usuario-menu-dropdown">
                        <div class="usuario-dropdown-perfil">
                            <img src="imagenes/logosinfondo.png" alt="Foto de perfil" class="foto-perfil-dropdown">
                            <div class="nombre-perfil-dropdown"><?= htmlspecialchars($_SESSION["usuario"]) ?></div>
                        </div>
                        <a href="perfil.php">Perfil</a>
                        <a href="logout.php" class="logout-btn">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>
        
    </header>

    <main>
        <!-- HERO SECTION -->
        <section class="hero">
        <div class="contenedor-hero">
            <h2>Clínicas cerca de ti</h2>
            <form class="buscador">
            <input type="text" placeholder="¿Qué clínicas buscas?" />
            <input type="text" placeholder="Ubicación" />
            <button type="submit">Buscar</button>
            </form>
        </div>
        </section>

        <!-- SECCIONES INFORMATIVAS -->
        <section class="info">
        <div class="contenedor-info">
            <div class="info-box">
            <h3>Agenda rápida</h3>
            <p>Reserva citas en minutos con disponibilidad real.</p>
            </div>
            <div class="info-box">
            <h3>Médicos verificados</h3>
            <p>Consulta opiniones y certificaciones reales.</p>
            </div>
            <div class="info-box">
            <h3>Sin llamadas</h3>
            <p>Haz todo en línea sin esperar en el teléfono.</p>
            </div>
        </div>
        </section>

        <!-- SOBRE NOSOTROS -->
        <section class="sobre-nosotros" style="display: none;">
            <div class="contenedor-sobre">
                <h2 class="sobre-titulo">ADN CorVital</h2>
                <div class="sobre-grid">
                <div class="sobre-card" data-modal="modal-mision">
                    <span class="sobre-icono">💙</span>
                    <h3>Misión</h3>
                </div>
                <div class="sobre-card" data-modal="modal-vision">
                    <span class="sobre-icono">🩺</span>
                    <h3>Visión</h3>
                </div>
                </div>
                <div class="sobre-grid">
                <div class="sobre-card" data-modal="modal-historia">
                    <span class="sobre-icono">🏥</span>
                    <h3>Nuestra Historia</h3>
                </div>
                </div>
            </div>

            <!-- Modales -->
            <div class="sobre-modal" id="modal-mision">
                <div class="sobre-modal-contenido">
                <span class="sobre-modal-cerrar">&times;</span>
                <h3>Misión</h3>
                <p>Nuestra misión es conectar a las personas con los mejores especialistas de salud de manera rápida, segura y confiable.</p>
                </div>
            </div>
            <div class="sobre-modal" id="modal-vision">
                <div class="sobre-modal-contenido">
                <span class="sobre-modal-cerrar">&times;</span>
                <h3>Visión</h3>
                <p>Ser la plataforma líder en servicios de salud digital, facilitando el acceso a atención médica de calidad para todos.</p>
                </div>
            </div>
            <div class="sobre-modal" id="modal-historia">
                <div class="sobre-modal-contenido">
                <span class="sobre-modal-cerrar">&times;</span>
                <h3>Nuestra Historia</h3>
                <p>CorVital nació en 2024 con el objetivo de transformar la experiencia de encontrar y agendar citas médicas, integrando tecnología y calidez humana.</p>
                </div>
            </div>
        </section>

        <!-- SERVICIOS -->
        <section id="servicios" class="seccion" style="display: none;">
            <h2 class="servicios-titulo">Condiciones</h2>
            <div class="servicios-grid">
            <div class="servicio-card">
                <h3>Requisitos Donante</h3>
                <ul>
                    <li>Edad minima 18</li>
                    <li>Edad maxima 40</li>
                    <li>Motivo de la donacion</li>
                    <li>Vacunas al día</li>
                    <li>
                        <label for="dieta-donante">Tipo de dieta:</label>
                        <select id="dieta-donante" name="dieta-donante">
                        <option value="">Elige una opcion</option>
                        <option value="bajar-grasa">Bajar grasa</option>
                        <option value="aumento-masa">Aumento masa magra</option>
                        <option value="medica">Médica</option>
                        </select>
                    </li>
                </ul>
            </div>
            <div class="servicio-card">
                <h3>Requisitos Paciente</h3>
                <ul>
                    <li>Edad minima 18</li>
                    <li>Edad maxima 40</li>
                    <li>Motivo del cambio</li>
                    <li>Vacunas al día</li>
                    <li>
                        <label for="dieta-paciente">Tipo de dieta:</label>
                        <select id="dieta-paciente" name="dieta-paciente">
                        <option value="">Elige una opcion</option>
                        <option value="bajar-grasa">Bajar grasa</option>
                        <option value="aumento-masa">Aumento masa magra</option>
                        <option value="medica">Médica</option>
                        </select>
                    </li>
                </ul>
            </div>
            </div>
            <div class="servicio-lista-org">
            <h3>Lista de Org.</h3>
            <div class="buscador-org">
                <input type="text" id="nombre-org" placeholder="Ingrese el nombre" />
                <button id="buscar-org">Buscar</button>
            </div>
            <div id="resultado-org" class="resultado-org"></div>
            </div>
        </section>
    
        <!-- CONTACTO -->
        <section id="contacto" class="seccion" style="display: none;">
            <h2>Consulta</h2>
            <form id="contact-form" enctype="multipart/form-data">
                <label for="tipo-consulta">Selecciona una opción: Puedes elegir buscar Órganos o Humanos registrados</label><br />
                <div class="input-group">
                    <select id="tipo-consulta" name="tipo-consulta" required>
                        <option value="" disabled selected>Elige una opción</option>
                        <option value="organos">Órganos</option>
                        <option value="humanos">Humanos registrados</option>
                    </select>
                </div>
                <div id="opciones-adicionales"></div>
                <button class="btn-registro" type="button" id="btn-buscar-contacto">Buscar</button>
            </form>

            <div id="resultado-organos"></div>
            <div id="resultado-cantidad-humanos"></div>

            <!-- Contenedor flex para los formularios de registro -->
            <div class="registro-formularios-flex">
                <!-- Registro Humano -->
                <div class="registro-humano-box">
                    <h3>Registro Humano</h3>
                    <form id="form-registro-humano" autocomplete="off">
                        <div class="input-group">
                            <label for="nombre-humano">Nombre:</label>
                            <input type="text" id="nombre-humano" name="nombre" required>
                        </div>
                        <div class="input-group">
                            <label for="apellido-humano">Apellido:</label>
                            <input type="text" id="apellido-humano" name="apellido" required>
                        </div>
                        <div class="input-group">
                            <label for="edad-humano">Edad:</label>
                            <input type="number" id="edad-humano" name="edad" min="0" required>
                        </div>
                        <div class="input-group">
                            <label for="gender-humano">Género:</label>
                            <select id="gender-humano" name="gender" required>
                                <option value="" disabled selected>Elige una opción</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="bloodtype-humano">Tipo de sangre:</label>
                            <select id="bloodtype-humano" name="bloodType" required>
                                <option value="" disabled selected>Elige una opción</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="email-humano">Email:</label>
                            <input type="email" id="email-humano" name="email" required>
                        </div>
                        <div class="input-group">
                            <label for="telefono-humano">Teléfono:</label>
                            <input type="tel" id="telefono-humano" name="telefono">
                        </div>
                        <button type="submit" class="btn-registro">Registrar</button>
                    </form> 
                    <div id="mensaje-registro-humano"></div>
                </div>
                <!-- Registro Órgano -->
                <div class="registro-organo-box">
                    <h3>Registrar Órgano</h3>
                    <form id="form-registro-organo" autocomplete="off">
                        <div class="input-group">
                            <label for="nombre-organo">Nombre del órgano:</label>
                            <input type="text" id="nombre-organo" name="nombre-organo" required>
                        </div>
                        <button type="submit" class="btn-registro">Registrar</button>
                    </form>
                    <div id="mensaje-registro-organo"></div>
                </div>
            </div>
        </section>

        <!-- Solo debe haber UNA sección con este id -->
        <section id="trabaja-nosotros" class="seccion" style="display: none;">
            <form id="form-trabaja">
                <label for="nombre-trabaja">Nombre:</label><br />
                <input type="text" id="nombre-trabaja" name="nombre-trabaja" required /><br />

                <label for="apellido-trabaja">Apellido:</label><br />
                <input type="text" id="apellido-trabaja" name="apellido-trabaja" required /><br />

                <label for="puesto-trabaja">Puesto al que postulas:</label><br />
                <select id="puesto-trabaja" name="puesto-trabaja" required>
                <option value="" disabled selected>Elige un puesto</option>
                <option value="medico">Médico</option>
                <option value="enfermeria">Enfermería</option>
                <option value="administrativo">Administrativo</option>
                <option value="tecnologia">Tecnología</option>
                <option value="atencion">Atención al cliente</option>
                <option value="otro">Otro</option>
                </select><br />

                <label for="area-trabaja">Área:</label><br />
                <select id="area-trabaja" name="area-trabaja" required>
                <option value="" disabled selected>Elige un área</option>
                <option value="clinica">Clínica</option>
                <option value="soporte">Soporte</option>
                <option value="recursos-humanos">Recursos Humanos</option>
                <option value="sistemas">Sistemas</option>
                <option value="marketing">Marketing</option>
                <option value="finanzas">Finanzas</option>
                </select><br />

                <label for="direccion-trabaja">Dirección:</label><br />
                <input type="text" id="direccion-trabaja" name="direccion-trabaja" required /><br />

                <label for="descripcion-trabaja">Descripción:</label><br />
                <textarea id="descripcion-trabaja" name="descripcion-trabaja" rows="4" required></textarea><br />

                <label for="cv-trabaja">Cargar CV:</label>
                <input type="file" id="cv-trabaja" name="cv-trabaja" accept=".pdf,.doc,.docx" required />

                <button type="submit">Postular</button>
            </form>
        </section>
    </main>

  <!-- PIE DE PÁGINA -->
    <footer class="footer">
        <div class="contenedor-footer">
        <div class="col">
            <h4>CorVital</h4>
            <p>Tu bienestar, nuestra misión.</p>
        </div>
        <div class="col">
            <h4>Compañía</h4>
            <ul>
            <li><a href="#" id="link-trabaja">Trabaja con nosotros</a></li>
            <li><a href="#">Ayuda</a></li>
            </ul>
        </div>
        <div class="col">
            <h4>Recursos</h4>
            <ul>
            <li><a href="#">Especialidades</a></li>
            <li><a href="#">Condiciones tratadas</a></li>
            <li><a href="#">Guías de salud</a></li>
            </ul>
        </div>
        <div class="col">
            <h4>Contacto</h4>
            <ul>
            <li><a href="#">soporte@corvital.com</a></li>
            <li><a href="#">+52 55 1234 5678</a></li>
            </ul>
        </div>
        <p class="footer-copy">© 2025 CorVital. Todos los derechos reservados.</p>
    </footer>

  <script src="script.js"></script>
</body>
</html>
