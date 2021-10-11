<?php

include 'carrito.php';
include 'templates/cabecera.php';


?>
    
        <br>

        <?php if($mensaje!= ""){?>
        <div class="alert alert-success">
        <?php echo($mensaje); ?>  

        <a href="mostrarcarrito.php" class="badge badge-success">Ver carrito</a>
        </div> 
        <?php } ?>

        <div class="row"> 

        <?php foreach($result as $producto) { ?> 

            <div class="col-3">
            <div class="card"> 
                
                <img 
                title="<?php echo $producto['Nombre'];?>"
                alt="<?php echo $producto['Nombre'];?>S"
                class="card-img-top" 
                src="<?php echo $producto['Imagen'];?>">

                <div class="card-body">
                <span><?php echo $producto['Nombre'];?></span>
                    <h5 class="card-title">$<?php echo $producto['Precio'];?></h5>
                    <p class="card-text">Descripción</p> 

                    <form action = "" method="post"> 


                    <input type="hidden" name="id" id="id" value = "<?php echo $producto['ID'];?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['Nombre'];?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo $producto['Precio'];?>">
                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1?>">

                    <button class="btn btn-primary" 
                    name="btnAccion" 
                    value="Agregar" 
                    type="Submit">

                    Agregar al carrito

                    </button>



                    </form>

                    
                </div>
            </div>
         </div>
        <?php } ?>

         
        </div> 
    </div>
<?php 
include 'templates/pie.php';

?>