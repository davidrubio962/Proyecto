<?php
 
                        // Dirección o IP del servidor MySQL
                        $host = "localhost";

                        $puerto = "3310";

                        // Nombre de usuario del servidor MySQL
                        $usuario = "root";

                        // Contraseña del usuario
                        $contrasena = "123456";

                        // Nombre de la base de datos
                        $baseDeDatos ="prueba";

                        // Nombre de la tabla a trabajar
                        $tabla = "usuarios";

                        function Conectarse()
                        {
                        global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;

                        if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena)))
                        { 

                            exit(); 
                                }
                        else
                            {

                            }
                        if (!mysqli_select_db($link, $baseDeDatos)) 
                            { 

                            exit(); 
                            }
                        else
                            {

                        }
                        return $link; 
                        } 

                        $link = Conectarse();

  if (!empty($_POST['documentid']) && !empty($_POST['password']) == !empty($_POST['repassword'])) {

    $query = "INSERT INTO usuarios (Name, LastName, Email, password, repassword, documentid, tipo_documento, fech_birth, Num_celular) VALUES (
        '".$_POST["Name"]."', '".$_POST["LastName"]."', '".$_POST["Email"]."', '".$_POST["password"]."', '".$_POST["repassword"]."', '".$_POST["documentid"]."', null, null, '".$_POST["Num_celular"]."'
    )";


  }



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login InnoBar</title>

<script>



  var idCliente;
  var nombreCliente ;
  var direccionCliente; 
  var telefonoCliente;
  var nombreProducto;
  var precio;
  var cantidad;
  var total;
  var subtotal;
  var p=0;
  var iva;
  var subtotalP=0;
  var fecha= new Date();
  var imprimir;
  var numero_Factura=0;


function generarFactura(){

  
  idCliente=document.getElementById("idCliente").value;
  nombreCliente=document.getElementById("nombreCliente").value;
  direccionCliente=document.getElementById("direccionCliente").value;


 
  
  document.write(fecha.getDate() + "/" + (fecha.getMonth()+1) + "/" + fecha.getFullYear()+"</br>"+"</br>"+"</br>");
  document.write("Identificacion del Cliente:"+'&nbsp;'+idCliente+"<br>"+"<br>");
  document.write("Nombre del Cliente:"+'&nbsp;'+nombreCliente+"<br>"+"<br>");
  document.write("Direccion:"+'&nbsp;'+direccionCliente+"<br>"+"<br>");

  
  
for (subtotal=0; nombreProducto != "*"; subtotal++) {


nombreProducto=prompt('Ingrese Nombre del Producto');
document.write("Nombre Producto:  "+'&nbsp;'+nombreProducto+'&nbsp;'+'&nbsp;');

precio=parseFloat(prompt('Ingrese Precio'));
document.write("Precio:  "+'&nbsp;'+precio+'&nbsp;'+'&nbsp;');

cantidad=parseInt(prompt('Ingrese Cantidad'));
document.write("Cantidad:  "+'&nbsp;'+cantidad+'&nbsp;'+'&nbsp;');


nombreProducto=prompt('Ingrese "*" Para terminar o cualquier tecla para continuar');

  subtotal=precio*cantidad;
  subtotalP=subtotalP+parseInt(subtotal);
  iva=subtotalP*0.19;
  total=subtotalP+iva;
  

  document.write("SubTotal :"+'&nbsp;'+subtotal+"<br>"+"<br>"+"<br>");
  

} 
document.write("Subtotal : "+'&nbsp;'+subtotalP+"<br>"+"<br>");
document.write("Iva 19% :"+'&nbsp;'+iva+"<br>"+"<br>");
document.write("Total :"+'&nbsp;'+total+"<br>"+"<br>");
document.write('<button onclick="window.print()">Imprimir Factura</button>');

}

generarFactura()


</script>

    <link rel="stylesheet" href="css/estilos.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>


    <div class="contenedor-form">
        <div class="toggle">
    </div>

        <div class="formulario">
            <h2>Factura</h2>

            <form  method="POST" action="#">

                <input type="text" placeholder="Nombre del Cliente" name="nombreCliente" id="nombreCliente"  required>

                 <input  minlength="10" maxlength="10"  type="text" name="idCliente" id="idCliente" placeholder="Número de Identificación" required >




                   <input type="email" name="direccionCliente" id="direccionCliente" placeholder="Correo Electronico" required>            



        
                <input type="submit"  name="Continuar" onclick="generarFactura()"   value="Generar Factura"/></td>

            </form>
 

        </div>


    </div>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
</body>
</html>

