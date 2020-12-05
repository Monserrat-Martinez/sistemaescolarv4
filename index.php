<?php
require_once "header1.php";
?>
<DOCTYPE html>
    <html>
    <head>
      <link rel="stylesheet" href="node_modules\bulma\css\bulma.min.css">
      <script src="node_modules\axios\dist\axios.min.js"></script>
    </head>
      <body>
        <div class="box">
          <div class= "columns is-centered is-2">
    
            <div class= "column is-half">
    
              <div class= "notificacion is-link">
                <h1></h1>
              </div>
                  <form action="api/login" method="POST">
                      <div data-role='fieldcontain'>
                        <label></label>
                        Please enter your details to log in
                      </div>
    
                      <div class="field">
                        <p class="control  has-icons-left has-icons-right">
                          <input class="input" type="email"  placeholder="Email" id= 'user' name='user'>
                          <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                          </span>
                          <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                          </span>
                        </p>
                      </div>
    
                      <div class="field">
                        <p class="control has-icons-left">
                          <input class="input" type="password" placeholder="password" id='pass' name='pass'>
                          <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span>
                        </p>
                      </div>
                      
                      <div class= "field">
                        <div class="control">
                          <button class="button is-primary" style="background-color: rgb(178, 35, 4)" type="button" onclick="login()">Submit</button>
                        </div>
                      </div>
                  </form>
            </div>
          </div>
        </div>

        <script>
          function login()
          {
            axios.post(`api/login/${document.forms[0].user.value}`, {
              usuario: document.forms[0].user.value,
              password: document.forms[0].pass.value,
            }).then(resp => {
              if (resp.data.aceptado)
              {
                if (resp.data.mensaje)
                {
                  alert("BIENVENIDO ADMINISTRADOR");
                  location.href='admin.php';
                }
                else
                {
                  alert("BIENVENIDO ALUMNO")
                  location.href='user.php';
                }
              }
              else
              {
                alert("no aceptado")
              }

            }).catch(error => {
              console.log(error)
            })
          }
      </script>
</body>
</html>