<?php
include('header.php');  
?>


<div class="wrapper d-flex align-items-stretch">
<?php
include('menuCalidad.php');
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
                
                    <a href="index.php?vista=nueva_orden_calidad" class="btn btn-outline-light" id="nuevaOV" style="background-color:#4e84a9;color:white;float:right;margin-bottom:1rem;" role="button">
                      <i class="fa fa-plus-square"></i>
                      Nueva solicitud
                    </a>
                

            </div>









            </div>              
    



<div class="container-fluid" align="center" >

    
     
    
    
    <?php
        require_once "./php/main.php";
    

        # Eliminar categoria #
        if(isset($_GET['category_id_del'])){
            require_once "./php/categoria_eliminar.php";
        }

        if(!isset($_GET['page'])){
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];
            if($pagina<=1){
                $pagina=1;
            }
        }

        $pagina=limpiar_cadena($pagina);
        $url="index.php?vista=ordenes_list&page="; /* <== */
        $registros=15;
        $busqueda="";

        # Paginador categoria #
        
    
    
    
    
    
    
    ?>
    
    
          
    
   
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
FROM  ordenes ORDER BY idordenes DESC ";             
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
                     
                     
                     <a href="index.php?vista=category_update_calidad&category_id_up=<?php echo $data_row['idordenes']; ?>&ACTION=VIEW" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> </a> &nbsp;&nbsp; 
                     
                     
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










      
      
      
      
     
      
      
    
     