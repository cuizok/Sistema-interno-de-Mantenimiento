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
        <li class="breadcrumb-item active">Inventario</li>
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
                
                    <a href="index.php?vista=nuevo_equipoti" class="btn btn-outline-light" id="nuevaOV" style="background-color:#4e84a9;color:white;float:right;margin-bottom:1rem;" role="button">
                      <i class="fa fa-plus-square"></i>
                      Agregar nuevo equipo
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
                 
                  
                  
                  <th>idinventario</th>
				<th>Codigo</th>
				<th>Usuario</th>
                  <th>Nombre del equipo</th>
				<th>Procesador</th>
				<th>Memoria RAM</th>
                  <th>Marca</th>
				<th>Tarjeta red</th>
                  <th>Capacidad disco</th>
                  <th>Tarjeta sonido</th>
                  <th>Monitor</th>
                  <th>WI-FI</th>
                  <th>Version windows</th>
                  <th>Version office</th>
                  <th>Antivirus</th>
                  <th>Otros</th>
                  <th>Ubicacion</th>
                  <th>Estatus</th>
                  <th>MAC</th>
                  <th>Observaciones</th>
			  </tr>
			</thead>
			<tbody>
			<?php                
			require 'database_connection.php'; 
			$display_query = "SELECT idinventario, codigo, usuario, nombre_equipo, procesador, memoria_ram, marca, tarjeta_red, capacidad_disco, tarjeta_sonido, monitor, wifi, version_windows, version_office, antivirus, otros, ubicacion, estatus, mac, observaciones   FROM inventario_ti ORDER BY idinventario  DESC ";             
			$results = mysqli_query($con,$display_query);   
			$count = mysqli_num_rows($results);			
			if($count>0) 
			{
				while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
				{
					?>
				 <tr>
				 	<td><?php echo $data_row['idinventario']; ?></td>
				 	<td><?php echo $data_row['codigo']; ?></td>
				 	<td><?php echo $data_row['usuario']; ?></td>
                    <td><?php echo $data_row['nombre_equipo']; ?></td>
                     <td><?php echo $data_row['procesador']; ?></td>
				 	<td><?php echo $data_row['memoria_ram']; ?></td>
                    <td><?php echo $data_row['marca']; ?></td>
                     <td><?php echo $data_row['tarjeta_red']; ?></td>
                     <td><?php echo $data_row['capacidad_disco']; ?></td>
                     <td><?php echo $data_row['tarjeta_sonido']; ?></td>
                     <td><?php echo $data_row['monitor']; ?></td>
                     <td><?php echo $data_row['wifi']; ?></td>
                     <td><?php echo $data_row['version_windows']; ?></td>
                     <td><?php echo $data_row['version_office']; ?></td>
                     <td><?php echo $data_row['antivirus']; ?></td>
                     <td><?php echo $data_row['otros']; ?></td>
                     <td><?php echo $data_row['ubicacion']; ?></td>
                     <td><?php echo $data_row['estatus']; ?></td>
                     <td><?php echo $data_row['mac']; ?></td>
                     <td><?php echo $data_row['observaciones']; ?></td>
                    
                     <td>
                     
                     
                     <a href="index.php?vista=revision_ticket&category_id_up=<?php echo $data_row['idinventario']; ?>&ACTION=VIEW" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> </a> &nbsp;&nbsp; 
                     
                     
                     </td>
                     
				 	<td>
				 		<a href="pdf_maker.php?idordenes=<?php echo $data_row['idinventario']; ?>&ACTION=VIEW" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> </a> &nbsp;&nbsp; 
				 		
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










      
      
      
      
     
      
      
    
     