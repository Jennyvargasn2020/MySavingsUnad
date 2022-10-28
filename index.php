<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/index.php">
   
    <title>My Savings | Formulario</title>
</head>
<body>
    <header>
        <nav>
            <a href="#"><img src="../Imagenes/logo.png" alt=""></a>
                <ul>
                    <a href="../Index.html">Home</a>
                </ul>
        </nav>
    </header>

    <h1>Formulario Prestamos Savings Bank</h1>
    <h2>A continuacion encontrara un resumen de su prestamo</h2>

   

    <?php
        $inicial = 0; 
        $cuotas = 0;
        $SaldoPrestamo =0;
        $ValorCuota = 0;
        $valorPrestamo = $_POST['valorPrestamo'];
        $cuotas = $_POST['cuotas'];
        $inicial = 0.30 *  $valorPrestamo;
        $SaldoPrestamo = (0.70 *  $valorPrestamo) + (0.0093 * $cuotas);
       
        //$fecha = date("Y-m-d", $_POST["fecha"]);
        $fechaCuota = $_POST['fechaCuota'];
        
        //$fecha = strtotime(str_replace('-', '/', $fecha));
        $fechaFinal = date("Y-m-d",strtotime($fechaCuota. "+$cuotas month"));

        
        //echo date("m-d-Y",strtotime($fecha."+ 1 month"));
    ?>
    <div class="Datos_Tabla">
    <div class="columna">
        <h1>Número de cuotas</h1>
            <?php
                for ($i = 1; $i<=$cuotas; $i++){
                echo $i. "<br>";
                }
            ?>
    </div>

    <div class="columna">
        <H1>Fecha de pago</H1>
            <?php
                for ($k = 1; $k <=$cuotas; $k++){
                    $fecha = date("Y-m-d",strtotime($fecha. "+1 month"));
                    echo $fecha . "<br>";
                }
        ?>
    </div>

    <div class="columna">
        <h1>Valor Cuota</h1>
            <?php
                for($a = 1; $a <=$cuotas; $a++){
                    echo $ValorCuota. "<br>";
            }
        ?>
    </div>

    <div class="columna">
        <h1>Subtotal Pagado</h1>
            <?php
                $subtotal = 0;
                for ($d = 1; $d <=$cuotas; $d++){
                echo ($subtotal = $subtotal + $ValorCuota) ."<br>"; 
            }
        ?>
    </div>
    </div>
</body>
</html>

