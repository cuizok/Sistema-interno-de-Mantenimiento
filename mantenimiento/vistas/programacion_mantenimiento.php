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
        <li class="breadcrumb-item active">Programacion de Mantenimiento</li>
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
                                <th>Maquina</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'database_connection.php';
                            $display_query = "SELECT idmaquina, nombre from equipos";

                            $results = mysqli_query($con, $display_query);
                            $count = mysqli_num_rows($results);
                            if ($count > 0) {
                                while ($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data_row['idmaquina']; ?></td>
                                        <td><?php echo $data_row['nombre']; ?></td>
                                    <!-- Nueva columna para la fecha de actualización -->
                                        <td>
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-idmaquina="<?php echo $data_row['idmaquina']; ?>" data-nombremaquina="<?php echo $data_row['nombre']; ?>"><i class="fa fa-pencil-square-o"></i> Aplicación Mtto</a> &nbsp;&nbsp;
                                        </td>
                                        <td>
                                         <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#historialModal" data-idmaquina="<?php echo $data_row['idmaquina']; ?>" data-nombremaquina="<?php echo $data_row['nombre']; ?>"><i class="fa fa-history"></i> Historial</a>

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

<!-- Ventana modal para insertar comentarios -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comentarios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="comentarios" class="col-form-label">Comentarios:</label>
                        <textarea class="form-control" id="comentarios" name="comentarios"></textarea>
                    </div>
                    <input type="hidden" id="id_maquina" name="id_maquina" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarComentarios" onclick="guardarComentario()">Guardar</button>
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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
       
       
                       
                      
         
    document.addEventListener('DOMContentLoaded', function () {
        // Manejar la apertura del modal de comentarios
        var exampleModal = document.getElementById('exampleModal');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var idMaquina = button.getAttribute('data-idmaquina');
            var nombre = button.getAttribute('data-nombremaquina');

            var modalTitle = exampleModal.querySelector('.modal-title');
            var modalBodyInput = exampleModal.querySelector('.modal-body textarea');
            var idMaquinaInput = exampleModal.querySelector('#id_maquina');

            modalTitle.textContent = 'Comentarios para la máquina ' + idMaquina + ' - ' + nombre;
            modalBodyInput.value = "";
            idMaquinaInput.value = idMaquina;
        });

        // Manejar la apertura del modal de historial
        var historialModal = document.getElementById('historialModal');
        historialModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var idMaquina = button.getAttribute('data-idmaquina');

            // Llamada AJAX a cargar_historial.php
            fetch('cargar_historial.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_maquina=' + idMaquina
            })
            .then(response => {
                if (response.ok) {
                    return response.text();
                }
                throw new Error('Network response was not ok.');
            })
            .then(data => {
                const modalBody = historialModal.querySelector('.modal-body');
                modalBody.innerHTML = ''; // Limpiar modal

                if (data.trim() !== '') {
                    modalBody.innerHTML = data;
                } else {
                    modalBody.innerHTML = '<p>No hay registros de mantenimiento para esta máquina.</p>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const modalBody = historialModal.querySelector('.modal-body');
                modalBody.innerHTML = '<p>Ha ocurrido un error al cargar el historial.</p>';
            });
        });
    });

    function guardarComentario() {
        var idMaquina = document.getElementById('id_maquina').value;
        var comentarios = document.getElementById('comentarios').value;

        // Verificar si los campos están vacíos
        if (idMaquina.trim() === '' || comentarios.trim() === '') {
            Swal.fire({
                icon: "info",
                title: "Acción inesperada",
                text: "Favor de llenar el campo requerido"
            });
            return; // Detener la ejecución de la función
        }

        var formData = new FormData();
        formData.append('id_maquina', idMaquina);
        formData.append('comentarios', comentarios);

        fetch('guardar_pro.php', {
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
            Swal.fire({
                icon: "success",
                title: "Datos enviados",
                text: "Se ha actualizado el mantenimiento de esta máquina",
                willClose: () => {
                    window.location.href = 'http://192.168.10.116/app/mantenimiento/index.php?vista=programacion_mantenimiento'; 
                }
            });
        })
        .catch(error => {
            console.error('Ha habido un problema con la operación fetch:', error);
            Swal.fire({
                icon: "error",
                title: "Error al enviar datos...",
                html: "Contacte con soporte técnico: <a href='mailto:soporte@oliansa.com'>soporte@oliansa.com</a>",
            });
        });
    }



</script>



