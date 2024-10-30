<?php
include('sidebar.php');
include('buscar_vales.php');


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Datos</title>
    <link rel="stylesheet" type="text/css" href="./CSS/estilos.css">

</head>
<body>
<div class="container">
    <h1 class ="center">Consulta vales de salida</h1>
<div class="text-center">
<button class="btn btn-secondary" onclick="window.location.href = 'Alta_vales.php';"><i class="fa fa-plus-square"></i> Alta de vales de Salida</button>
</div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Folio</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Monto</th>
                <th>Moneda</th>
                <th>Referencia</th>
                <th>Vendedor</th>
                <th>Alm</th>
                <th>Descuento</th>
                <th>IVA</th>
                <th>IEPS</th>
                <th>Plazo</th>
                <th>FecPago</th>
                <th>FecRefer</th>
                <th>Saldo</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            
            <!-- Paginación por la cantidad de registros que hay -->
            <?php
            
            $registrosPorPagina = 20;

            $totalPaginas = ceil(count($resultados) / $registrosPorPagina);

            $paginaActual = isset($_GET['page']) ? $_GET['page'] : 1;

            $indiceInicio = ($paginaActual - 1) * $registrosPorPagina;
            $indiceFin = $indiceInicio + $registrosPorPagina;

            $resultadosPaginados = array_slice($resultados, $indiceInicio, $registrosPorPagina);
            foreach ($resultadosPaginados as $fila): ?>
                <tr>
                    <td><?php echo $fila['c1']; ?></td>
                    <td><?php echo $fila['c6']; ?></td>
                    <td><?php echo $fila['c9']; ?></td>
                    <td><?php echo $fila['c26']; ?></td>
                    <td><?php echo $fila['c16']; ?></td>
                    <td><?php echo $fila['c7']; ?></td>
                    <td><?php echo $fila['c11']; ?></td>
                    <td><?php echo $fila['c26']; ?></td>
                    <td><?php echo $fila['c40']; ?></td>
                    <td><?php echo $fila['c14']; ?></td>
                    <td><?php echo $fila['c15']; ?></td>
                    <td><?php echo $fila['c13']; ?></td>
                    <td><?php echo $fila['c17']; ?></td>
                    <td><?php echo $fila['c41']; ?></td>
                    <td><?php echo $fila['c41']; ?></td>
                    <td><?php echo $fila['c16']; ?></td>
                    <td><?php echo $fila['c70']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div class="pagination">
    <?php
    if ($totalPaginas > 1) {
        echo '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $disabled_previous = ($paginaActual == 1) ? 'disabled' : '';
        $disabled_next = ($paginaActual == $totalPaginas) ? 'disabled' : '';
        echo '<li class="page-item ' . $disabled_previous . '"><a class="page-link" href="?page=' . ($paginaActual - 1) . '">&laquo; Anterior</a></li>';

        $maxPaginasMostradas = 10; // Cantidad de números de página que se mostrarán
        $inicio = max(1, $paginaActual - floor($maxPaginasMostradas / 2));
        $fin = min($inicio + $maxPaginasMostradas - 1, $totalPaginas);

        if ($fin - $inicio + 1 < $maxPaginasMostradas) {
            $inicio = max(1, $fin - $maxPaginasMostradas + 1);
        }

        if ($inicio > 1) {
            echo '<li class="page-item"><a class="page-link" href="?page=1">1</a></li>';
            if ($inicio > 2) {
                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
            }
        }

        for ($i = $inicio; $i <= $fin; $i++) {
            $active = ($i == $paginaActual) ? 'active' : '';
            echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
        }

        if ($totalPaginas > $fin) {
            if ($totalPaginas > $fin + 1) {
                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
            }
            echo '<li class="page-item"><a class="page-link" href="?page=' . $totalPaginas . '">' . $totalPaginas . '</a></li>';
        }

        echo '<li class="page-item ' . $disabled_next . '"><a class="page-link" href="?page=' . ($paginaActual + 1) . '">Siguiente &raquo;</a></li>';
        echo '</ul></nav>';
    }
    ?>

    
</div>
</body>
</html>
