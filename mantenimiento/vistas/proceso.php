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
<!-- Formulario para seleccionar el estatus -->
<form method="GET" id="statusForm">
    <div class="col-sm-3">
        <div class="form-group">
            <label>Ordenar por:</label>
            <select class="form-control" name="vista" required onchange="document.getElementById('statusForm').submit();">
                <option value="" selected="">PROCESO</option>
                <option value="abierto">ABIERTO</option>
                <option value="cerrado">CERRADO</option>
                <option value="ordenes_list">CUALQUIERA</option>


            </select>
        </div>
    </div>
</form>



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

function redirectPage() {
    var status = document.getElementById("vista").value;
    if (status) {
        var lowercaseStatus = status.toLowerCase();
        var url = "http://localhost/app/mantenimiento/index.php?vista=";

        switch (lowercaseStatus) {
            case "cerrado":
            case "en proceso":
            case "activo": 
                url += lowercaseStatus;
                break;
            default:
                url += "";
                break;
        }

        window.location.href = url;
    }
}
</script>



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
			require 'database_connection.php'; 
			$display_query = "SELECT codigo,falla,mecanico,fecha, idordenes, semana, usuario,falla, maquina, departamento, estatus, created_at 
FROM  ordenes WHERE ESTATUS = 'PROCESO' ORDER BY idordenes DESC ";             
			$results = mysqli_query($con,$display_query);   
			$count = mysqli_num_rows($results);			
			if($count>0) 
			{
				while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
				{
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
                     
                     
                     <a href="index.php?vista=category_update&category_id_up=<?php echo $data_row['idordenes']; ?>&ACTION=VIEW" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> </a> &nbsp;&nbsp; 
                     
                     
                     </td>
                     
				 	<td>
				 		<a href="pdf_maker.php?idordenes=<?php echo $data_row['idordenes']; ?>&ACTION=VIEW" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> </a> &nbsp;&nbsp; 
				 		
					</td>
                     
                     
                     
				 <?php
				}
			}
			?>
			</tbody>
			</table>      
                
               
  
    

</div>
             
    
    
</div>
</div>










      
      
      
      
     
      
      
    
     