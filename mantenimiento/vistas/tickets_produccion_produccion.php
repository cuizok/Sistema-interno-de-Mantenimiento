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
                
                    <a href="index.php?vista=nuevo_ticket_produccion" class="btn btn-outline-light" id="nuevaOV" style="background-color:#4e84a9;color:white;float:right;margin-bottom:1rem;" role="button">
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
			$display_query = "SELECT idtickets, problema, quien_solicita, fecha, ingeniero_asignado, prioridades, folio_equipo, estatus FROM tickets ORDER BY idtickets DESC ";             
			$results = mysqli_query($con,$display_query);   
			$count = mysqli_num_rows($results);			
			if($count>0) 
			{
				while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
				{
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
				 		<a href="pdf/new_ticket?idtickets=<?php echo $data_row['idtickets']; ?>&ACTION=VIEW" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> </a> &nbsp;&nbsp; 
				 		
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










      
      
      
      
     
      
      
    
     