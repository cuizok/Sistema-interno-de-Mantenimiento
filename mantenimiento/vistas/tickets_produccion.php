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
                            <li class="breadcrumb-item active">Sistemas</li>
                            <li class="breadcrumb-item active">Tickets</li>
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
                    <a href="index.php?vista=nuevo_ticket" class="btn btn-outline-light" id="nuevaOV" style="background-color:#4e84a9;color:white;float:right;margin-bottom:1rem;" role="button">
                        <i class="fa fa-plus-square"></i>
                        Nueva solicitud
                    </a>
                </div>

            <div class="row">
                <div class="col-lg-12" align="center">
                    <br>
                    <h5 align="center"></h5>
                    <br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Problema</th>
                                <th>Quien solicita</th>
                                <th>Fecha</th>
                                <th>Ingeniero asignado</th>
                                <th>Prioridad</th>
                                <th>Equipo</th>
                                <th>Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'database_connection.php';
                            $registrosPorPagina = 15;
                            $pagina = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
                            $offset = ($pagina - 1) * $registrosPorPagina;
                            $display_query = "SELECT idtickets, problema, quien_solicita, fecha, ingeniero_asignado, prioridades, folio_equipo, estatus FROM tickets ORDER BY idtickets DESC LIMIT $registrosPorPagina OFFSET $offset";
                            $results = mysqli_query($con, $display_query);
                            if ($results) {
                                $count = mysqli_num_rows($results);
                                if ($count > 0) {
                                    while ($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                            ?>
                                        <tr>
                                            <td><?php echo $data_row['idtickets']; ?></td>
                                            <td><?php echo $data_row['problema']; ?></td>
                                            <td><?php echo $data_row['quien_solicita']; ?></td>
                                            <td><?php echo $data_row['fecha']; ?></td>
                                            <td><?php echo $data_row['ingeniero_asignado']; ?></td>
                                            <td><?php echo $data_row['prioridades']; ?></td>
                                            <td><?php echo $data_row['folio_equipo']; ?></td>
                                            <td><?php echo $data_row['estatus']; ?></td>
                                          <td>
                     <a href="pdf_ticket.php?idtickets=<?php echo $data_row['idtickets']; ?>&ACTION=VIEW" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o"></i> </a> &nbsp;&nbsp; 
                     </td>
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Paginador -->
            <div class="container-fluid" align="center">
                <?php
                $totalRegistros = mysqli_num_rows(mysqli_query($con, "SELECT idtickets FROM tickets"));
                $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

                if ($totalPaginas > 1) {
                    echo '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
                    $disabled_previous = ($pagina == 1) ? 'disabled' : '';
                    $disabled_next = ($pagina == $totalPaginas) ? 'disabled' : '';
                    echo '<li class="page-item ' . $disabled_previous . '"><a class="page-link" href="index.php?vista=tickets_produccion&page=' . ($pagina - 1) . '">Anterior</a></li>';

                    for ($i = 1; $i <= $totalPaginas; $i++) {
                        $active = ($pagina == $i) ? 'active' : '';
                        echo '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?vista=tickets_produccion&page=' . $i . '">' . $i . '</a></li>';
                    }

                    echo '<li class="page-item ' . $disabled_next . '"><a class="page-link" href="index.php?vista=tickets_produccion&page=' . ($pagina + 1) . '">Siguiente</a></li>';
                    echo '</ul></nav>';
                }
                ?>
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
    
    
    
