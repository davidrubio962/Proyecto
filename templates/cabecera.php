<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <?php
 
                        // Dirección o IP del servidor MySQL
                        $host = "localhost";

                        $puerto = "3310";

                        // Nombre de usuario del servidor MySQL
                        $usuario = "root";

                        // Contraseña del usuario
                        $contrasena = "123456";

                        // Nombre de la base de datos
                        $baseDeDatos ="innobar";

                        // Nombre de la tabla a trabajar
                        $tabla = "tblproductos";

                        function Conectarse()
                        {
                        global $host,$puerto, $usuario, $contrasena, $baseDeDatos, $tabla;

                        if (!($link = mysqli_connect($host. ":" .$puerto, $usuario, $contrasena))) 
                        { 
                            echo "Error conectando a la base de datos.<br>"; 
                            exit(); 
                                }
                        else
                            {
                            echo "Listo, estamos conectados.<br>";
                            }
                        if (!mysqli_select_db($link, $baseDeDatos)) 
                            { 
                            echo "Error seleccionando la base de datos.<br>"; 
                            exit(); 
                            }
                        else
                            {
                            echo "Obtuvimos la base de datos $baseDeDatos sin problema.<br>";
                        }
                        return $link; 
                        } 

                        $link = Conectarse();

                        $query = "SELECT * FROM tblproductos;";

                        $result = mysqli_query($link, $query); 

                        ?>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="pedidos.php">Innobar</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="pedidos.php"> Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="mostrarcarrito.php"> Carrito(<?php 
                        echo(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);

                    ?>) </a>
                </li>
                <li class="nav-item active" style="border-color: green">
                    <a class="nav-link" href="index.php"> Salir </a>
                </li>
            </ul>
        </div>
    </nav>
    <br/>
    <br/>
    <div class="container">