<?php
// ******************************************definición de las variables*********************

$valor_prestamo = 0;
$cuota_inicial = 0;
$saldo_prestamo = 0;
$no_cuotas = 0;
$valor_cuota = 0;
$fecha_actual = date('Y-m-d');



//*****************************condicional del submit****************************************
if (isset($_POST["cotizar"])) {
    $valor_prestamo = $_POST['valorprestamo'];
    $num_cuotas = $_POST['cuotas'];
    $fecha_cuota = strtotime('+1 month', strtotime($fecha_actual));
    $fecha_cuota = date('Y-m-j', $fecha_cuota);

    //***************************operaciones entre variables**************************************
    $cuota_inicial = $valor_prestamo * 0.30;
    $saldo_prestamo = $valor_prestamo * 0.70;
    $sub_total = $cuota_inicial;
    $valor_cuota = $saldo_prestamo / ($num_cuotas - 1);

    //****************************condicional de cuotas*******************************************
    if ($num_cuotas === 6) {
        $saldo_prestamo = $valor_prestamo * 0.70;
    } else {
        $saldo_prestamo = $valor_prestamo * 0.70 * 0.112;
    }
    
}




?>
  <!-- creacion de la tabla -->
<table>
    <thead>
        <tr>
            <th>No Cuotas</th>
            <th>Fecha de pago </th>
            <th>Valor Cuota</th>
            <th>subtotal pagado</th>
            
        </tr>
    </thead>
    <tbody> <!-- cuerpo de la tabla -->
        <tr>
            <td>1</td>
            <td><?php echo ($fecha_cuota)?></td>
            <td><?php echo ($cuota_inicial)?></td>
            <td><?php echo ($sub_total)?></td>
        </tr>
     
        <!-- Bucle for -->
        <?php for ($x = 2; $x <= $num_cuotas; $x++) {
        $fecha_cuota = strtotime('+1 month', strtotime($fecha_cuota));
        $fecha_cuota = date('Y-m-j', $fecha_cuota);
        $sub_total += $valor_cuota;
        echo '<tr>';
        echo '<td >' . $x . '</td>';
        echo '<td>' . $fecha_cuota . '</td>';
        echo '<td>' . $valor_cuota . '</td>';
        echo '<td>' . $sub_total . '</td>';
        echo '</tr>';
    } ?>       
    </tbody>
</table>

<button><a href="form.php">volver a cotizar</button>
<button><a href="../Index.html">volver al inicio</button>

