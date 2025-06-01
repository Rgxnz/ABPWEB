<?php
session_start();
require 'conexion.php';

if (isset($_SESSION["usuario"])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inputEmail = $_POST["email"];
    $inputPassword = $_POST["password"];

    // Buscar el usuario en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM humans WHERE email = ?");
    $stmt->execute([$inputEmail]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($inputPassword, $usuario["password"])) {
        $_SESSION["usuario"] = $usuario["email"];
        $_SESSION["rol"] = "humano";
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Fondo animado -->
    <div class="animated-bg">
        <svg viewBox="0 0 1200 200" preserveAspectRatio="none">
            <path class="wave" d="M0,100 Q300,200 600,100 T1200,100 V200 H0 Z"/>
        </svg>
    </div>

    <main>
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
                <a href="#" class="login">Iniciar sesión</a>
            </div>
            </div>
        </header>

        <div class="auth-container">
            <h1>Inicio de sesión</h1>
            <?php if ($error): ?>
                <div class="error"><?= $error ?></div>
            <?php endif; ?>
            <form method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Entrar</button>
            </form>
            <div >
            <a class="reg-php" href="register.php">¿No tienes cuenta? Regístrate</a>
            </div>
        </div>
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
        </div>
        <p class="footer-copy">© 2025 CorVital. Todos los derechos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>