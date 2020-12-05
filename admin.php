<?php
require_once 'header.php'
?>
<DOCTYPE html>
<html>
<head></head>
<body>

<div class="box">
    <div class= "columns is-centered is-2">
    
        <div class= "column is-half">
    
            <div class= "notificacion is-link">
                <h1>SISTEMA ESCOLAR</h1>
            </div>

            <form method='post' action='admin.php'>
                <div class="field">
                    <label class="label">CALIFICACIÓN</label>
                    <div class="control">
                        <input class="input" type="text" name="calificacion">
                    </div>
                </div>

                <div class="control">
                    <button class="button is-primary" style="background-color: rgb(178, 35, 4)" type="button" onclick="insertar()">Submit</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

    <script>
        function insertar()
        {
            axios.post(`api/insertar`, 
            {
              calificacion: document.forms[0].calificacion.value,
            }).then(resp => 
            {
              if (resp.data.ins)
              {
                alert("AGREGAR CALIFICACION");
              }
              else
              {
                alert("DATOS GUARDADOS");
              }

            }).catch(error => 
            {
              console.log(error)
            })
        }
    </script>

</body>
</html>