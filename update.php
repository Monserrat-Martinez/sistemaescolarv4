<?php
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '\config\database.php';
require __DIR__ . '\vendor\autoload.php';

DB::table('calificaciones')
->where('idcalificaciones', $_POST['idcalificaciones'])
->update(['calificacion' => $_POST['calificacion']]);
?>
<DOCTYPE html>
<html>
    <head>
        <script src="node_modules\axios\dist\axios.min.js"></script>
        <script src= "node_modules\bulma\css\bulma.min.css"></script>
    </head>
    <body>

    <script>
        alert("calificacion actualizada");
        location.href='consultar.php';

    </script>
    </body>
</html>
