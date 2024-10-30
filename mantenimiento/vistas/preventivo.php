<?php
include('header.php');  
?>
<div class="wrapper d-flex align-items-stretch">
<?php
include('menu_opc2.php');
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <li class="breadcrumb-item active">Equipos de computo</li>
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
                
                  
                

            </div>









            </div>              
    



<div class="container-fluid" align="center" >
    
    <div class="row">
		<div class="col-lg-12" align="center">
			<br>
			<h5 align="center"></h5>
			<br>
			<table class="table table-striped">
			<thead>
			   <tr>
                                <th>Folio</th>
                                <th>Equipo</th>
                                <th> Usuario</th>
                                <th>Procesador</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            
                   <a href="#agregarEquipoModal" class="btn btn-outline-light" id="nuevaOV" style="background-color:#4e84a9;color:white;float:right;margin-bottom:1rem;" role="button" data-bs-toggle="modal" data-bs-target="#agregarEquipoModal">
    <i class="fa fa-plus-square"></i>
    Agregar nuevo equipo
</a>

                            <?php
                            require 'database_connection.php';
                            $display_query = "SELECT idinventario, codigo, usuario, procesador from inventario_ti"; // Cambiar a la tabla de inventario_ti y sus campos correspondientes

                            $results = mysqli_query($con, $display_query);
                            if (!$results) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

                            $count = mysqli_num_rows($results);
                            if ($count > 0) {
                                while ($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data_row['idinventario']; ?></td> <!-- Cambiar a idinventario -->
                                        <td><?php echo $data_row['codigo']; ?></td>
                                        <td><?php echo $data_row['usuario']; ?></td>
                                        <td><?php echo $data_row['procesador']; ?></td>


                                        
                                    <!-- Nueva columna para la fecha de actualización -->
                                        <td>
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-idinventario="<?php echo $data_row['idinventario']; ?>" data-nombremaquina="<?php echo $data_row['codigo']; ?>"><i class="fa fa-pencil-square-o"></i> Aplicación Mtto</a> &nbsp;&nbsp;
                                        </td>
                                        <td>
                                         <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#historialModal" data-idinventario="<?php echo $data_row['idinventario']; ?>" data-nombremaquina="<?php echo $data_row['codigo']; ?>"><i class="fa fa-history"></i> Historial</a>

                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ventana modal para insertar comentarios y otros campos -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comentarios y otros campos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="guardar_proTI.php" method="post">
                    <div class="modal-page" style="display:block;">
                        <div class="mb-3">
                            <label for="fecha_programacionTI" class="col-form-label">Fecha de Programación:</label>
                            <input type="date" class="form-control" id="fecha_programacionTI" name="fecha_programacionTI">
                        </div>
                        <div class="mb-3">
                            <label for="semanaTI" class="col-form-label">Semana:</label>
                            <select class="form-select" id="semanaTI" name="semanaTI">
                                <?php
                                    require 'database_connection.php';
                                    $query = "SELECT idsemanas FROM semanas";
                                    $result = mysqli_query($con, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row['idsemanas'] . '">' . $row['idsemanas'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No hay semanas disponibles</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_mantenimientoTI" class="col-form-label">Tipo de Mantenimiento:</label>
                            <select class="form-select" id="tipo_mantenimientoTI" name="tipo_mantenimientoTI">
                                <option value="Preventivo">Preventivo</option>
                                <option value="Correctivo">Correctivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-page" style="display:none;">
                        <h5 class="text-center">Inspección visual</h5>
                        <div class="mb-3">
                            <label class="form-check-label">Ventiladores:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="ventiladores_1" name="ventiladores[]" value="si">
                                <label class="form-check-label" for="ventiladores_1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="ventiladores_2" name="ventiladores[]" value="no">
                                <label class="form-check-label" for="ventiladores_2">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">Discos:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="discosTI_1" name="discosTI[]" value="si">
                                <label class="form-check-label" for="discosTI_1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="discosTI_2" name="discosTI[]" value="no">
                                <label class="form-check-label" for="discosTI_2">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">Procesadores:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="procesadoresTI_1" name="procesadoresTI[]" value="si">
                                <label class="form-check-label" for="procesadoresTI_1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="procesadoresTI_2" name="procesadoresTI[]" value="no">
                                <label class="form-check-label" for="procesadoresTI_2">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">Memoria RAM:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="memoria_ramTI_1" name="memoria_ramTI[]" value="si">
                                <label class="form-check-label" for="memoria_ramTI_1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="memoria_ramTI_2" name="memoria_ramTI[]" value="no">
                                <label class="form-check-label" for="memoria_ramTI_2">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">Tarjeta de Red:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tarjeta_redTI_1" name="tarjeta_redTI[]" value="si">
                                <label class="form-check-label" for="tarjeta_redTI_1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tarjeta_redTI_2" name="tarjeta_redTI[]" value="no">
                                <label class="form-check-label" for="tarjeta_redTI_2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-page" style="display:none;">
                        <div class="mb-3">
                            <label for="comentarios" class="col-form-label">Comentarios:</label>
                            <textarea class="form-control" id="comentarios" name="comentarios"></textarea>
                        </div>
                        <h5 class="text-center">Limpieza de equipo</h5>
                        <div class="mb-3">
                            <label class="form-check-label">CPU:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="cpuTI_1" name="cpuTI[]" value="si">
                                <label class="form-check-label" for="cpuTI_1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="cpuTI_2" name="cpuTI[]" value="no">
                                <label class="form-check-label" for="cpuTI_2">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">Teclado:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tecladoTI_1" name="tecladoTI[]" value="si">
                                <label class="form-check-label" for="tecladoTI_1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tecladoTI_2" name="tecladoTI[]" value="no">
                                <label class="form-check-label" for="tecladoTI_2">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">Mouse:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="mouseTI_1" name="mouseTI[]" value="si">
                                <label class="form-check-label" for="mouseTI_1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="mouseTI_2" name="mouseTI[]" value="no">
                                <label class="form-check-label" for="mouseTI_2">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">Monitor:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="monitorTI_1" name="monitorTI[]" value="si">
                                <label class="form-check-label" for="monitorTI_1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="monitorTI_2" name="monitorTI[]" value="no">
                                <label class="form-check-label" for="monitorTI_2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-page" style="display:none;">
                        <div class="mb-3">
                            <label for="equipo_adicionalTI" class="col-form-label">Equipo Adicional:</label>
                            <input type="text" class="form-control" id="equipo_adicionalTI" name="equipo_adicionalTI">
                        </div>
                        <div class="mb-3">
                            <label for="observacionesTI" class="col-form-label">Observaciones:</label>
                            <textarea class="form-control" id="observacionesTI" name="observacionesTI"></textarea>
                        </div>
                        <h5 class="text-center">Depuración de Software y Actualización de Antivirus</h5>
                        <div class="mb-3">
                            <label class="form-check-label">Eliminación de Software:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="eliminacion_sofwareTI_si" name="eliminacion_sofwareTI[]" value="si">
                                <label class="form-check-label" for="eliminacion_sofwareTI_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="eliminacion_sofwareTI_no" name="eliminacion_sofwareTI[]" value="no">
                                <label class="form-check-label" for="eliminacion_sofwareTI_no">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">Depuración de SW y SO:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="depuracion_swsoTI_si" name="depuracion_swsoTI[]" value="si">
                                <label class="form-check-label" for="depuracion_swsoTI_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="depuracion_swsoTI_no" name="depuracion_swsoTI[]" value="no">
                                <label class="form-check-label" for="depuracion_swsoTI_no">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">Actualización de Antivirus:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="actualizacion_antivirusTI_si" name="actualizacion_antivirusTI[]" value="si">
                                <label class="form-check-label" for="actualizacion_antivirusTI_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="actualizacion_antivirusTI_no" name="actualizacion_antivirusTI[]" value="no">
                                <label class="form-check-label" for="actualizacion_antivirusTI_no">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">Vacunación de Equipo:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vacunar_equipoTI_si" name="vacunar_equipoTI[]" value="si">
                                <label class="form-check-label" for="vacunar_equipoTI_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vacunar_equipoTI_no" name="vacunar_equipoTI[]" value="no">
                                <label class="form-check-label" for="vacunar_equipoTI_no">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-page" style="display:none;">
                        <div class="mb-3">
                            <label for="observaciones_2TI" class="col-form-label">Otras Observaciones:</label>
                            <textarea class="form-control" id="observaciones_2TI" name="observaciones_2TI"></textarea>
                        </div>
                        <h5 class="text-center">Verificación de respaldos</h5>
                        <div class="mb-3">
                            <label for="realizadoTI" class="col-form-label">Realizado:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="realizadoTI_si" name="realizadoTI" value="si">
                                <label class="form-check-label" for="realizadoTI_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="realizadoTI_no" name="realizadoTI" value="no">
                                <label class="form-check-label" for="realizadoTI_no">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="posible_causaTI" class="col-form-label">Posible Causa:</label>
                            <textarea class="form-control" id="posible_causaTI" name="posible_causaTI"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="solucionTI" class="col-form-label">Solución:</label>
                            <textarea class="form-control" id="solucionTI" name="solucionTI"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="observables_programacionTI" class="col-form-label">Observables de Programación:</label>
                            <textarea class="form-control" id="observables_programacionTI" name="observables_programacionTI"></textarea>
                        </div>
                        <input type="hidden" id="id_inventario" name="id_inventario" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarComentarios" onclick="guardarComentario()">Guardar</button>
                <button type="button" class="btn btn-primary" id="prevPage">Anterior</button>
                <button type="button" class="btn btn-primary" id="nextPage">Siguiente</button>
            </div>
        </div>
    </div>
</div>
    <!-- Ventana modal para el historial -->
<div class="modal fade" id="historialModal" tabindex="-1" aria-labelledby="historialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="historialModalLabel">Historial de cambios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="historialContent"></div>
                <!-- Contenido del historial se cargará aquí -->
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    
    <!-- AGREGAR NUEVO EQUIPO -->
<div class="modal fade" id="agregarEquipoModal" tabindex="-1" aria-labelledby="agregarEquipoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Agrega la clase modal-lg para una modal grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarEquipoModalLabel">Agregar nuevo equipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form id="formularioNuevoEquipo">
                    
                    <!-- Campo de entrada para el equipo -->
              <div class="row"> 
              <div class="col-sm-3">
          <div class="form-group">
              <label>Codigo</label>
            <input type="text" class="form-control" name="codigo" placeholder="" required>
          </div>
              
              </div>
              
              
              
              <div class="col-sm-3">
          <div class="form-group">
              <label>Usuario</label>
            <input type="text" class="form-control" name="usuario" placeholder="" required>
          </div>
              </div>
                  
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Nombre del equipo</label>
            <input type="text" class="form-control" name="nombre_equipo" placeholder="" required>
          </div>
              </div>
            
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Procesador</label>
            <input type="text" class="form-control" name="procesador" placeholder="" >
          </div>
              
              </div>
                  
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Memoria RAM</label>
            <input type="text" class="form-control" name="memoria_ram" placeholder="" >
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Marca</label>
            <input type="text" class="form-control" name="marca" placeholder="" >
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Tarjeta red</label>
            <input type="text" class="form-control" name="tarjeta_red" placeholder="" >
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Capacidad disco</label>
            <input type="text" class="form-control" name="capacidad_disco" placeholder="" >
          </div>
              
              </div>
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Tarjeta sonido</label>
            <input type="text" class="form-control" name="tarjeta_sonido" placeholder="" required>
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Monitor</label>
            <input type="text" class="form-control" name="monitor" placeholder="" >
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>WI-FI</label>
            <input type="text" class="form-control" name="wifi" placeholder="" required>
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Version Windows</label>
            <input type="text" class="form-control" name="version_windows" placeholder="" >
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Version office</label>
            <input type="text" class="form-control" name="version_office" placeholder="" required>
          </div>
              
              </div>
                  
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Antivirus</label>
            <input type="text" class="form-control" name="antivirus" placeholder="" required>
          </div>
              
              </div>
                  
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Otros</label>
            <input type="text" class="form-control" name="otros" placeholder="" >
          </div>
              
              </div>
                  
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Ubicacion</label>
            <input type="text" class="form-control" name="ubicacion" placeholder="" >
          </div>
              
              </div>
                  
                    <div class="col-sm-3">
          <div class="form-group">
              <label>Tipo</label>
            <input type="text" class="form-control" name="tipo" placeholder="" required>
          </div>
              
              </div>
                  
                   <!-- Estatus -->
                      
                 <div class="col-sm-3">
          <div class="form-group">     
             <label>Estatus</label>
            <select name="estatus" class="form-control"  required>
  <option selected>Seleccione una opción</option>
  <option value="ACTIVO">Activo</option>
  <option value="INACTIVO">Inactivo</option>
  
</select>
                     </div></div>
                  
             
                  
            
             <div class="col-sm-3">
          <div class="form-group">
              <label>MAC</label>
            <input type="text" class="form-control" name="mac" placeholder="" required>
          </div>
              
              </div>
            
                  

            
          
              <br>
            <br>
                  
        
                  <div class="row"> 
              <div class="col-sm-3"> 
                  <p><label for="w3review">Observaciones:</label></p>
        <textarea id="w3review"   name="observaciones" rows="4" cols="55"></textarea>   
           
                    <!-- Campos del formulario -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarEquipo()">Guardar</button>
            </div>
        </div>



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
       
       
                       
                      
         

let currentPage = 0;
const pages = document.querySelectorAll('.modal-page');
const nextPageButton = document.getElementById('nextPage');
const prevPageButton = document.getElementById('prevPage');

nextPageButton.addEventListener('click', () => {
    if (currentPage < pages.length - 1) {
        pages[currentPage].style.display = 'none';
        currentPage++;
        pages[currentPage].style.display = 'block';
        
        // Ocultar el botón de siguiente si estamos en la última página
        if (currentPage === pages.length - 1) {
            nextPageButton.style.display = 'none';
        }

        // Mostrar el botón de anterior si no estamos en la primera página
        if (currentPage > 0) {
            prevPageButton.style.display = 'block';
        }
    }
});

prevPageButton.addEventListener('click', () => {
    if (currentPage > 0) {
        pages[currentPage].style.display = 'none';
        currentPage--;
        pages[currentPage].style.display = 'block';
        
        // Ocultar el botón de anterior si estamos en la primera página
        if (currentPage === 0) {
            prevPageButton.style.display = 'none';
        }

        // Mostrar el botón de siguiente si no estamos en la última página
        if (currentPage < pages.length - 1) {
            nextPageButton.style.display = 'block';
        }
    }
});

// Ocultar el botón de anterior al cargar la página (porque estamos en la primera página inicialmente)
prevPageButton.style.display = 'none';

document.getElementById('prevPage').addEventListener('click', () => {
    if (currentPage > 0) {
        pages[currentPage].style.display = 'none';
        currentPage--;
        pages[currentPage].style.display = 'block';
    }
});
       // para concatenar el id del dispositivo a la ventana modal 
    var exampleModal = document.getElementById('exampleModal');
    exampleModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var idInventario = button.getAttribute('data-idinventario');
        var nombre = button.getAttribute('data-nombremaquina');

        var modalTitle = exampleModal.querySelector('.modal-title');
        var modalBodyInput = exampleModal.querySelector('.modal-body textarea');
        var idInventarioInput = exampleModal.querySelector('#id_inventario');

        modalTitle.textContent = 'Comentarios para dispositivo ' + nombre;
        modalBodyInput.value = "";
        idInventarioInput.value = idInventario;

    });

    document.getElementById('guardarComentarios').addEventListener('click', function() {
        // Obtener los valores de los campos del formulario
        var idInventario = document.getElementById('id_inventario').value;
        var fecha = document.getElementById('fecha_programacionTI').value;
        var semana = document.getElementById('semanaTI').value;
        var tipoMantenimiento = document.getElementById('tipo_mantenimientoTI').value;
        var comentarios = document.getElementById('comentarios').value;
        var equipoAdicional = document.getElementById('equipo_adicionalTI').value;
        var observaciones = document.getElementById('observacionesTI').value;
        var observaciones2 = document.getElementById('observaciones_2TI').value;
        var posibleCausa = document.getElementById('posible_causaTI').value;
        var solucion = document.getElementById('solucionTI').value;
        var observablesProgramacion = document.getElementById('observables_programacionTI').value;

        // Obtener los valores de los checkboxes
        var ventiladores = obtenerCheckboxValue('ventiladores[]');
        var discos = obtenerCheckboxValue('discosTI[]');
        var procesadores = obtenerCheckboxValue('procesadoresTI[]');
        var memoriaRam = obtenerCheckboxValue('memoria_ramTI[]');
        var tarjetaRed = obtenerCheckboxValue('tarjeta_redTI[]');
        var cpu = obtenerCheckboxValue('cpuTI[]');
        var teclado = obtenerCheckboxValue('tecladoTI[]');
        var mouse = obtenerCheckboxValue('mouseTI[]');
        var monitor = obtenerCheckboxValue('monitorTI[]');
        var eliminacionSoftware = obtenerCheckboxValue('eliminacion_sofwareTI[]');
        var depuracionSoftware = obtenerCheckboxValue('depuracion_swsoTI[]');
        var actualizacionAntivirus = obtenerCheckboxValue('actualizacion_antivirusTI[]');
        var vacunacionEquipo = obtenerCheckboxValue('vacunar_equipoTI[]');
        var realizado = obtenerCheckboxValue('realizadoTI[]');

        // Crear objeto FormData con todos los datos
        var formData = new FormData();
        formData.append('id_inventario', idInventario);
        formData.append('fecha_programacionTI', fecha);
        formData.append('semanaTI', semana);
        formData.append('tipo_mantenimientoTI', tipoMantenimiento);
        formData.append('ventiladores[]', ventiladores);
        formData.append('discosTI[]', discos);
        formData.append('procesadoresTI[]', procesadores);
        formData.append('memoria_ramTI[]', memoriaRam);
        formData.append('tarjeta_redTI[]', tarjetaRed);
        formData.append('comentarios', comentarios);
        formData.append('cpuTI[]', cpu);
        formData.append('tecladoTI[]', teclado);
        formData.append('mouseTI[]', mouse);
        formData.append('monitorTI[]', monitor);
        formData.append('equipo_adicionalTI', equipoAdicional);
        formData.append('observacionesTI', observaciones);
        formData.append('observaciones_2TI', observaciones2);
        formData.append('posible_causaTI', posibleCausa);
        formData.append('solucionTI', solucion);
        formData.append('observables_programacionTI', observablesProgramacion);
        formData.append('eliminacion_sofwareTI[]', eliminacionSoftware);
        formData.append('depuracion_swsoTI[]', depuracionSoftware);
        formData.append('actualizacion_antivirusTI[]', actualizacionAntivirus);
        formData.append('vacunar_equipoTI[]', vacunacionEquipo);
        formData.append('realizadoTI[]', realizado);

        // Realizar solicitud fetch
        fetch('guardar_proTI.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    return response.text();
                }
                throw new Error('Network response was not ok.');
            })
            .then(data => {
                // Alerta de éxito
                Swal.fire({
                    icon: "success",
                    title: "Datos enviados",
                    text: "Se ha actualizado el mantenimiento de este equipo",
                    willClose: () => {
                        // Redirección después de cerrar la alerta
                        window.location.href = 'http://localhost/app/mantenimiento/index.php?vista=preventivo';
                    }
                });
            })
            .catch(error => {
                // Alerta de error
                console.error('There has been a problem with your fetch operation:', error);
                Swal.fire({
                    icon: "error",
                    title: "Error al insertar registro...",
                    html: "Contacte con soporte técnico: <a href='mailto:soporte@oliansa.com'>soporte@oliansa.com</a>",
                });
            });
    });

    // Función para obtener los valores de los checkboxes
    function obtenerCheckboxValue(name) {
        var checkboxes = document.getElementsByName(name);
        var values = [];
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                values.push(checkbox.value);
            }
        });
        return values.join(',');
    }

    // Agregar mensaje de registro para verificar si se llama al archivo PHP
    console.log('Se ha llamado a guardar_proTI.php');
    

       // para mostrar el historial de cambios
         $(document).ready(function(){
        $('#historialModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var idInventario = button.data('idinventario');
            
            $.ajax({
                type: 'POST',
                url: 'cargar_historialTI.php',
                data: {id_inventario: idInventario},
                dataType: 'html',
                success: function(response) {
                    $('#historialContent').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#historialContent').html('<p>Error al cargar el historial</p>');
                }
            });
        });
    });
       
       // Para guardar equipo nuevo 
       
      function guardarEquipo() {
    var formData = new FormData(document.getElementById('formularioNuevoEquipo'));

    $.ajax({
        url: 'guardar_equipoti2.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            Swal.fire({
                icon: "success",
                title: "Datos guardados",
                text: "Se ha agregado el nuevo equipo correctamente",
                willClose: () => {
                    // Redirigir a la página principal u otra página después de guardar los datos
                    window.location.href = 'http://localhost/app/mantenimiento/index.php?vista=preventivo';
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('There has been a problem with your fetch operation:', error);
            Swal.fire({
                icon: "error",
                title: "Error al guardar los datos",
                text: "Hubo un error al agregar el nuevo equipo. Contacte con soporte técnico.",
                footer: "<a href='mailto:soporte@oliansa.com'>Contactar a soporte técnico</a>"
            });
        }
    });
}


      

</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
