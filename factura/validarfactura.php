<?php
	$conex=mysqli_connect("localhost:3310", "root", "123456", "innobar");
	if ($conex) {
		$consulta = "SELECT * FROM factura";
		$resultado = mysqli_query($conex, $consulta);
		if ($resultado) {
			while ($row = $resultado-> fetch_array()) {

				$idfactura = $row['idfactura'];
				$idusuario = $row['idusuario'];
				$nombre = $row['nomusuario'];
				$nombreprod = $row['nombproducto'];
				$valorunitario = $row['valorunitario'];
				$cantidad = $row['cantidad'];
				$valortotal  = $row['valortotal'];
				$fecha = $row['facha'];

				?>
				<b>Número de identificación de la factura: </b><?php echo $idfactura; ?>
				<b>Número de identificacion del ususario: </b><?php echo $idusuario; ?>
				<b>Nombre del ususario: </b><?php echo $nombre; ?>
				<b>Nombre del prodcuto: </b><?php echo $nombreprod; ?>
				<b>Valor unitario: </b><?php echo $valorunitario; ?>
				<b>Cantidad: </b><?php echo $cantidad; ?>
				<b>Valor total: </b><?php echo $valortotal; ?>
				<b>Fecha: </b><?php echo $fecha; ?>

				<a href="print_invoice.php?invoice_id='.$invoiceDetails["order_id"].'" title="Imprimir Factura"><div class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></div></a>
				
				<br>
				<?php

			}
		}
	}else{
		echo "No se conecto a la base de datos";?><br><?php
	}

?>
<a href="../inicio.php">Volver</a> 