

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login InnoBar</title>
    <link rel="stylesheet" href="css/estilos.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style type="text/css">
            .ocultar {
                display: none;
            }

            .mostrar {
                display: block;
            }
        </style>
</head>

<body>


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>


    <div class="contenedor-form">
        <div class="toggle">
            <span> Crear Cuenta</span>
        </div>
        
        <div class="formulario">
            <h2>Iniciar Sesión</h2>
            <form method="POST" action="db/validar.php">
                <input minlength="8" maxlength="10" type="text" name="user" placeholder="Numero de Identificación" required>
                <input minlength="8" maxlength="16" type="password" name="pass" placeholder="Contraseña" required>
                <input type="submit" value="Iniciar Sesión">
                <br><br><br>
                            <a href="recuperarcuenta.php" style="color:#FF8000;">Olvide mi Contraseña?</a>
            <br>
            </form>
        </div>
        
        <div class="formulario">

       <div id="msg"></div>

        <!-- Mensajes de Verificación -->
        <div id="error" class="alert alert-danger ocultar" role="alert" >
            <font color="red">Las Contraseñas no coinciden, vuelve a intentar !</font> 
        </div>
        <div id="ok" class="alert alert-success ocultar" role="alert">
            Las Contraseñas coinciden ! (Procesando formulario ... )
        </div>            

            <h2>Crea tu Cuenta</h2>
            <form  method="POST" action="db/incertar.php" id="miformulario" onsubmit="verificarPasswords(); return false" onsubmit="verificarususario(); return false">


                <input type="text" name="Name" placeholder="ingresa tu nombres" required>

                <input type="text" name="LastName" placeholder="Ingresa tu apellido" required>
                
                <input type="email" name="Email" placeholder="Correo Electronico" required>

                 <input name="password" maxlength="16" minlength="8" type="password" placeholder="Contraseña" id="pass1" required>

                 <input name="repassword" maxlength="16" minlength="8" type="password" placeholder="Confirmar Contraseña" id="pass2" required>

                 <select class="seleccion" name="opciones" type ="lista">
                    <option disabled selected="">Seleccionar tipo documento</option>
                    <option value="CC">Cédula de Ciudadania</option>
                    <option value="CE">Cédula de Extranjeria</option>
                    <option value="Pasaporte">Pasaporte</option>
         
                </select>  

                 <br><br>

                 <input  minlength="8" maxlength="10"  name="documentid" type="text" placeholder="Número de Identificación" required >

         
    

                <br><br>

            <div class="col-xs-10 col-xs-offset-3">
            <div class="form-group">
                 <label for="fecha_inicio">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" name="fecha_inicio" placeholder="" required>
             </div>
        </div>
    


        <br><br>

                <input name="Num_celular" type="text" placeholder="Número de Celular" required= "" pattern="[0-9]+">
                



                <input type="submit" value="Registrarse">
                <br><br>
            </form>
            <br>
                        <a href="index.php" style="color:#FF8000;">Ya tienes cuenta?</a>
        </div>



        <div class="reset-password">


        </div>
    </div>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>


<!--Script de la Validacion de la contraseña-->
<script type="text/javascript"> 

        function verificarPasswords() {

            // Ontenemos los valores de los campos de contraseñas 
            pass1 = document.getElementById('pass1');
            pass2 = document.getElementById('pass2');

            // Verificamos si las constraseñas no coinciden 
            if (pass1.value != pass2.value) {

                // Si las constraseñas no coinciden mostramos un mensaje 
                document.getElementById("error").classList.add("mostrar");

                return false;
            }
            
            else {

                // Si las contraseñas coinciden ocultamos el mensaje de error
                document.getElementById("error").classList.remove("mostrar");

                // Mostramos un mensaje mencionando que las Contraseñas coinciden 
                document.getElementById("ok").classList.remove("ocultar");

                // Desabilitamos el botón de login 
                document.getElementById("login").disabled = true;

                // Refrescamos la página (Simulación de envío del formulario) 
                setTimeout(function() {
                    location.reload();
                }, 3000);

                return true;
            }

        } 
      
    </script>

</body>
</html>

<script type="text/javascript">
 
    $('Formfechas').submit(function(e){

        e.preventDefault();

        var form = $($this);
        var url = form.attr('action');

        $.ajax(
        {
            type: "POST",
            url: 'fechas.php',
            data: form.serialize(),
            success: function(data)
            {
                $('#tabla_resultado').html('');
                $('#tabla_resultado').append(data); 
            }
        });
    }); 

</script>