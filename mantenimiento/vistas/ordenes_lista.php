<?php
include('header.php');  
?>

<div class="wrapper d-flex align-items-stretch">
    <?php
    include('menu_opc2.php');
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
                            <li class="breadcrumb-item active">Menu</li>
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
                    <a href="index.php?vista=nueva_orden" class="btn btn-outline-light" id="nuevaOV" style="background-color:#4e84a9;color:white;float:right;margin-bottom:1rem;" role="button">
                        <i class="fa fa-plus-square"></i>
                        Nueva solicitud
                    </a>
                </div>
            </div>              
            <div class="container-fluid" align="center">
                <?php
                require_once "./php/main.php";
                        require 'database_connection.php'; 


                // Definición de variables para paginación
                $totalRegistros = mysqli_num_rows(mysqli_query($con, "SELECT idordenes FROM ordenes"));
                $registrosPorPagina = 15;
                $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
                $pagina = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $pagina = max(1, min($pagina, $totalPaginas));
                $url = "index.php?vista=ordenes_lista&page=";

                $inicio = ($pagina - 1) * $registrosPorPagina;
                $query = "SELECT codigo, UPPER(falla) AS falla, UPPER(mecanico) AS mecanico, fecha, idordenes, semana, UPPER(usuario) AS usuario, UPPER(maquina) AS maquina, UPPER(departamento) AS departamento, estatus, created_at 
                          FROM ordenes 
                          ORDER BY idordenes DESC 
                          LIMIT $inicio, $registrosPorPagina";
                $results = mysqli_query($con, $query);
                $count = mysqli_num_rows($results);

                if ($count > 0) {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th>Semana</th>
                                <th>Codigo</th>
                                <th>Maquina</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Falla</th>
                                <th>Depto</th>
                                <th>Mecanico</th>
                                <th>Estatus</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $data_row['idordenes']; ?></td>
                                    <td><?php echo $data_row['semana']; ?></td>
                                    <td><?php echo $data_row['codigo']; ?></td>
                                    <td><?php echo $data_row['maquina']; ?></td>
                                    <td><?php echo $data_row['usuario']; ?></td>
                                    <td><?php echo $data_row['created_at']; ?></td>
                                    <td><?php echo $data_row['falla']; ?></td>
                                    <td><?php echo $data_row['departamento']; ?></td>
                                    <td><?php echo $data_row['mecanico']; ?></td>
                                    <td><?php echo $data_row['estatus']; ?></td>
                                    <td>
                                        <a href="pdf_maker.php?idordenes=<?php echo $data_row['idordenes']; ?>&ACTION=VIEW" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a> 
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo "<p>No hay registros disponibles</p>";
                }
                ?>
              <div class="container-fluid" align="center">
    <div class="row">
        <div class="col-lg-12">
            <?php
            $totalRegistros = mysqli_num_rows(mysqli_query($con, "SELECT idordenes FROM ordenes"));
            $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
            $url = "index.php?vista=ordenes_lista&page=";

            if ($totalPaginas > 1) {
                echo '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
                $disabled_previous = ($pagina == 1) ? 'disabled' : '';
                $disabled_next = ($pagina == $totalPaginas) ? 'disabled' : '';
                echo '<li class="page-item ' . $disabled_previous . '"><a class="page-link" href="' . $url . ($pagina - 1) . '">Anterior</a></li>';

                $maxPaginasMostradas = 10; // Cantidad de número de páginas que se mostrarán
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


            </div>
        </div>
    </div>
</div>


   
<style>
    @media (max-width: 768px) {
        #sidebar {
            width: 100%;
            position: fixed;
            top: 56px;
            left: -70%;
            transition: all 0.3s;
            z-index: 1000;
        }
        #sidebar.active {
            left: 0;
        }
        #content {
            transition: all 0.3s;
        }
        #content.shifted {
            margin-left: 15%; 
        }
    }



</style>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const sidebarCollapse = document.getElementById('sidebarCollapse');
        const content = document.getElementById('content');

        sidebar.classList.remove('active');

        sidebarCollapse.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            content.classList.toggle('shifted');
        });
    });

</script>
    
    
    
