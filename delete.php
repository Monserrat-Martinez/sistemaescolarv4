<?php
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '\config\database.php';
require __DIR__ . '\vendor\autoload.php';

DB::table('calificaciones')
->where('idcalificaciones', $_GET['id'])
->delete();
//echo '<script>alert("se elimino la calificacion")</script> ';
?>
<DOCTYPE html>
<html>
    <head>
        <script src="node_modules\axios\dist\axios.min.js"></script>
        <script src= "node_modules\bulma\css\bulma.min.css"></script>
    </head>
    <body>

    <script>
        alert("calificacion eliminada");
        location.href='consultar.php';

    </script>
    </body>
</html>