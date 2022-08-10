#Notas:
Definir el archivo dirs.php en el directorio raíz para centralizar las rutas:

```

dirs.php:

<?php

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].);
define('ADMIN_PATH', ROOT_PATH.''%RUTA DESDE LA RAIZ HASTA CARPETA DEL PROYECTO%'/Users/admin/');
define('CLIENT_PATH', ROOT_PATH.''%RUTA DESDE LA RAIZ HASTA CARPETA DEL PROYECTO%'/Users/client/');
define('DB_PATH', ROOT_PATH.''%RUTA DESDE LA RAIZ HASTA CARPETA DEL PROYECTO%'/Users/db/');
define('HELPERS_PATH', ROOT_PATH.''%RUTA DESDE LA RAIZ HASTA CARPETA DEL PROYECTO%'/Users/helpers/');
define('MODELS_PATH', ROOT_PATH.''%RUTA DESDE LA RAIZ HASTA CARPETA DEL PROYECTO%'/Users/models/');
define('PARTIALS_PATH', ROOT_PATH.''%RUTA DESDE LA RAIZ HASTA CARPETA DEL PROYECTO%'/Users/partials/');
define('CONTROLLERS_PATH', ROOT_PATH.''%RUTA DESDE LA RAIZ HASTA CARPETA DEL PROYECTO%'/Users/controllers/');

?>

```

Archivo .env.php localizado en 'Users\db\' está configurado de la siguiente forma:

```
<?php
const SERVIDOR = "%server%";
const BD = "%database%";
const USUARIO = "%user%";
const PASSWORD = "%password%";
?>

```
