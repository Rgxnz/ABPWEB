#README
Corvital
Integrantes:

Oriol Arcarons, Julio Arroyo, Izan Pardell, Biel Raventós

El siguiente proyecto está compuesto por los siguientes archivos:

conexion.php

Necesario para establecer conexión con la base de datos MySQL

login.php

Página generada para gestionar los logins a la página web mediante un formulario POST que consulta la tabla de humans buscando el email, luego valida la contraseña usando password_verify para comparar con el hash almacenado.

logout.php

Cierra completamente la sesión del usuario eliominando sus datos con session_unset(), para eliminar todas las variables de sesiones activas, y session_destroy(), para destruir completamente la sesión actual, luego lo redirige a login.php usando header() y termina el proceso con exit.

register.php

Verifica con PDO si un email ya está registrado mediante una consulta preparada SELECT. Si no existe, cifra la contraseña con password_hash y guarda el nuevo usuario con un INSERT seguro.

dashboard.php

Muestra la página princial de CorVital. Solo es accesible si el usuario está autentificado con (!isset($_SESSION["usuario"])). Desde esta página puedes consultar  los tipos de órganos disponibles y los usuarios registrados. También permite añadir nuevos usuarios o tipos de órganos.  

index.html

Página principal accesible sin autentificación.

perfil.php

Esta página contiene un registro para que el usuario autentificado añada información personal a su perfil, y estos se suban a la base de datos.

script.js

Contiene funciones enfocadas a mostrar y ocultar secciones para poder hacer los distintos apartados de la página desde el mismo dashboard. Además de funciones comunes, también contiene las funciones para acceder y añadir contenido la API mediante el  fetch y una función para la persistencia de datos con localstorage.
