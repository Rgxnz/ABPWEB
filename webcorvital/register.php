<?php
session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: dashboard.php");
    exit;
}

// Configuración de la base de datos
$host = "localhost";
$dbname = "corvital"; // Cambia por el nombre de tu base de datos
$user = "root";
$pass = ""; // Cambia si tienes contraseña

// Conexión PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Verificar si el email ya existe
    $stmt = $pdo->prepare("SELECT * FROM humans WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        $error = "El email ya está registrado";
    } else {
        // Hash de la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertar en la base de datos
        $stmt = $pdo->prepare("INSERT INTO humans (email, password) VALUES (?, ?)");
        $stmt->execute([$email, $hashedPassword]);

        header("Location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
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
                <a href="login.php" class="login">Iniciar sesión</a>
            </div>
            </div>
        </header>

        <div class="auth-container">
            <h1>Registro de usuario</h1>
            <?php if ($error): ?>
                <div class="error"><?= $error ?></div>
            <?php endif; ?>
            <form method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Registrarse</button>
            </form>
            <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
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

