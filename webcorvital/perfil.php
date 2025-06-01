<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CorVital</title>
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
            <a href="perfil.php" class="nav-mi-perfil">Mi Perfil</a>
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
        <!-- Sección de Perfil de Usuario -->
        <section id="perfil" class="seccion">
            <form id="perfil-form">
                <label for="nombre-perfil">Nombre:</label><br />
                <div class="input-group">
                    <input type="text" id="nombre-perfil" name="nombre-perfil" required />
                </div>

                <label for="genero-perfil">Género:</label><br />
                <div class="input-group">
                    <select id="genero-perfil" name="genero-perfil" required>
                        <option value="" disabled selected>Elige una opción</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>

                <label for="altura-perfil">Altura (m):</label><br />
                <div class="input-group">
                    <input type="number" id="altura-perfil" name="altura-perfil" min="50" max="250" required />
                </div>

                <label for="fecha-nacimiento-perfil">Fecha de nacimiento:</label><br />
                <div class="input-group">
                    <input type="date" id="fecha-nacimiento-perfil" name="fecha-nacimiento-perfil" required />
                </div>

                <label for="fumado-perfil">Fumador:</label><br />
                <div class="input-group">
                    <select id="fumado-perfil" name="fumado-perfil" required>
                        <option value="" disabled selected>Elige una opción</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <label for="capital-perfil">Capital:</label><br />
                <div class="input-group">
                    <input type="text" id="capital-perfil" name="capital-perfil" required />
                </div>

                <label for="tipo-sangre-perfil">Tipo de sangre:</label><br />
                <div class="input-group">
                    <select id="tipo-sangre-perfil" name="tipo-sangre-perfil" required>
                        <option value="" disabled selected>Elige una opción</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>

                <br />
                <button type="submit" class="btn-registro">Guardar cambios</button>
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