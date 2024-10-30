<?php
include('header.php');  
?>


<div class="wrapper d-flex align-items-stretch">
<?php
include('menuProduccion.php');
?>

<div id="content" class="p-4">
    
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
<div class="container-fluid">
    <div class="row" style="width:100%; margin:0px; padding:0px;">
    <div class="col-md-1" style="height:100%; padding-top:5px;">
    <button type="button" id="sidebarCollapse" class="btn btn-primary">
    <i class="fa fa-bars"></i>
    <span class="sr-only">Toggle Menu</span>
    </button>
    </div>
    <div class="col-md-11" style="height:100%; margin-bottom:-15px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Mantenimiento</li>
        <li class="breadcrumb-item active">Nomina</li>
        <li class="ml-auto"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></li>
    </ol>
    </div>  
    </div>
</div>
</nav>


    
    
        

<!-- TABLA PRINCIPAL -->
        
        
<div class="card mb-4" id="tblPrincipal" style="width:100%">
        <div class="card-body" align="left"> 
            <div class="table-responsive" style="width:100%;">
                
                

            </div>






            </div>              
    



<div class="container-fluid" align="center" >

    
                          <button id="exportExcel" class="btn btn-success">Descargar Excel</button>


    
    
    <?php
        require_once "./php/main.php";
    

        # Eliminar categoria #
        if(isset($_GET['category_id_del'])){
            require_once "./php/categoria_eliminar.php";
        }

        $registrosPorPagina = 30;
        $pagina = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $inicio = ($pagina - 1) * $registrosPorPagina;

        require 'database_connection.php'; 
        $display_query = "
            SELECT 
                r.id_recibos,
                r.UUID,
                r.Fecha_emision,
                r.RFC_RECEPTOR,
                r.RAZON_SOCIAL_RECEPTOR,
                r.FECHA_INICIAL,
                r.FECHA_FINAL,
                r.TOTAL_PERCEPCIONES,
                r.NUMERO_EMPLEADO,
                r.NETO,
                WEEK(r.FECHA_INICIAL) AS semana_inicio,
                n.TOTAL - CAST(REPLACE(r.NETO, ',', '') AS DECIMAL(10, 2)) AS diferencia
            FROM 
                recibos_sat r
            LEFT JOIN 
                nominas n ON r.NUMERO_EMPLEADO = n.numero_empleado    
            ORDER BY 
                id_recibos ASC
            LIMIT 
                $inicio, $registrosPorPagina;";             
            
        $results = mysqli_query($con, $display_query);   
        $count = mysqli_num_rows($results);

        if ($count > 0) {
            echo '<table class="table table-striped">';
            echo '<thead>
                    <tr>
                        <th>Id</th>
                        <th>UUID</th>
                        <th>Fecha Emision</th>
                        <th>RFC RECEPTOR</th>
                        <th>RAZON SOCIAL</th>
                        <th>FECHA INICIAL</th>
                        <th>FECHA FIN</th>  
                        <th>TOTAL PERCEPCIONES</th>
                        <th>NUMERO EMPLEADO</th>
                        <th>NETO</th>
                        <th>NUMERO DE SEMANA</th>
                        <th>DIFERENCIA</th>
                    </tr>
                </thead>';
            echo '<tbody>';
            while ($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $data_row['id_recibos'] . '</td>';
                echo '<td>' . $data_row['UUID'] . '</td>';
                echo '<td>' . $data_row['Fecha_emision'] . '</td>';
                echo '<td>' . $data_row['RFC_RECEPTOR'] . '</td>';
                echo '<td>' . $data_row['RAZON_SOCIAL_RECEPTOR'] . '</td>';
                echo '<td>' . $data_row['FECHA_INICIAL'] . '</td>';
                echo '<td>' . $data_row['FECHA_FINAL'] . '</td>';
                echo '<td>' . $data_row['TOTAL_PERCEPCIONES'] . '</td>';
                echo '<td>' . $data_row['NUMERO_EMPLEADO'] . '</td>';
                echo '<td>$' . $data_row['NETO'] . '</td>';
                echo '<td>' . $data_row['semana_inicio'] . '</td>';
                echo '<td>' . $data_row['diferencia'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No hay registros.</p>';
        }
        ?>
      
        <div class="container-fluid" align="center">
            <div class="row">
                <div class="col-lg-12">
                   <?php
        $totalRegistros = mysqli_num_rows(mysqli_query($con, "SELECT id_recibos FROM recibos_sat"));
        $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
        $url = "index.php?vista=menu_nomina2&page=";

        if ($totalPaginas > 1) {
            echo '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
            $disabled_previous = ($pagina == 1) ? 'disabled' : '';
            $disabled_next = ($pagina == $totalPaginas) ? 'disabled' : '';
            echo '<li class="page-item ' . $disabled_previous . '"><a class="page-link" href="' . $url . ($pagina - 1) . '">Anterior</a></li>';

            $maxPaginasMostradas = 10; // Cantidad de numero de paginas que se mostraran
            $inicio = max(1, $pagina - floor($maxPaginasMostradas / 2));
            $fin = min($inicio + $maxPaginasMostradas - 1, $totalPaginas);

            if ($fin - $inicio + 1 < $maxPaginasMostradas) {
                $inicio = max(1, $fin - $maxPaginasMostradas + 1);
            }

            if ($inicio > 1) {
                echo '<li class="page-item"><a class="page-link" href="' . $url . '1">1</a></li>';
                if ($inicio > 2) {
                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                }
            }

            for ($i = $inicio; $i <= $fin; $i++) {
                $active = ($pagina == $i) ? 'active' : '';
                echo '<li class="page-item ' . $active . '"><a class="page-link" href="' . $url . $i . '">' . $i . '</a></li>';
            }

            if ($totalPaginas > $fin) {
                if ($totalPaginas > $fin + 1) {
                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                }
                echo '<li class="page-item"><a class="page-link" href="' . $url . $totalPaginas . '">' . $totalPaginas . '</a></li>';
            }

            echo '<li class="page-item ' . $disabled_next . '"><a class="page-link" href="' . $url . ($pagina + 1) . '">Siguiente</a></li>';
            echo '</ul></nav>';
        }
?>

                </div>
            </div>
        </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#exportExcel').click(function() {
            window.location = 'exportar_excel.php'; // Redirige al script PHP que genera el archivo Excel
        });
    });
</script>
