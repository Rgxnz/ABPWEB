# Corvital

Integrantes: 

Oriol Arcarons
Julio Arroyo
Izan Pardell
Biel Raventós


El siguiente proyecto está compuesto por los siguientes archivos:

conexion.php

Necesario para establecer conexión con la base de datos MySQL

login.php

Página generada para gestionar los logins a la página web mediante un formulario POST que consulta la tabla de humans buscando el email, luego valida la  contraseña usando password_verify para comparar con el hash almacenado.

logout.php

Cierra completamente la sesión del usuario eliominando sus datos con  session_unset(), para eliminar todas las variables de sesiones activas, y session_destroy(), para destruir completamente la sesión actual, luego lo redirige a login.php usando header() y termina el proceso con exit.

register.php

Verifica con PDO si un email ya está registrado mediante una consulta preparada SELECT. Si no existe, cifra la contraseña con password_hash y guarda el nuevo usuario con un INSERT seguro. 

