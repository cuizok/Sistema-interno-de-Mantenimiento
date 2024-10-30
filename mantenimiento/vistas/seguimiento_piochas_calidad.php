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
        <li class="breadcrumb-item active">Calidad</li>
        <li class="breadcrumb-item active">Gestion de piochas</li>
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
    
    
          <div class="card mb-4" id="tblPrincipal" style="width:100%">
        <div class="card-body" align="left"> 
            <div class="table-responsive" style="width:100%;">
                
                    
                

            </div>
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
				<th>PO</th>
				<th>Estilo</th>
                <th>Punto</th>
                <th>Cantidad</th>
				<th>Departamento</th>
				
				<th>Tipo de defecto</th>
                  <th>Solicita</th>
                  <th>Fecha de solicitud</th>
                  <th>Fecha de entrega</th>
                  <th>Inspector</th>
                  <th>Estatus</th>
                  <th>Opciones</th>
			  </tr>
			</thead>
			<tbody>
			<?php                
			require 'database_connection.php'; 
			$display_query = "SELECT idpiochas, estilo, color, punto,cantidad, departamento,tipo_defecto, fecha_solicitud, fecha_entrega, solicita,inspector,estatus FROM  piochas ORDER BY idpiochas DESC ";             
			$results = mysqli_query($con,$display_query);   
			$count = mysqli_num_rows($results);			
			if($count>0) 
			{
				while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
				{
					?>
				 <tr>
				 	<td><?php echo $data_row['idpiochas']; ?></td>
				 	<td><?php echo $data_row['estilo']; ?></td>
				 	<td><?php echo $data_row['color']; ?></td>
                     <td><?php echo $data_row['punto']; ?></td>
				 	<td><?php echo $data_row['cantidad']; ?></td>
                     <td><?php echo $data_row['departamento']; ?></td>
                     <td><?php echo $data_row['tipo_defecto']; ?></td>
                     <td><?php echo $data_row['solicita']; ?></td>
                     <td><?php echo $data_row['fecha_entrega']; ?></td>
                     <td><?php echo $data_row['fecha_solicitud']; ?></td>
                     <td><?php echo $data_row['inspector']; ?></td>
                     <td><?php echo $data_row['estatus']; ?></td>
                     <td>
                     
                     
                     <a href="index.php?vista=piochas_update&category_id_up=<?php echo $data_row['idpiochas']; ?>&ACTION=VIEW" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> </a> &nbsp;&nbsp; 
                     
                     
                     </td>
                     
				 	<td>
				 		
				 		
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
    
    
    
    
    
    
            
            
            
            
            
            
  
    
   
    
       



                
               
  
    

</div>
             
    
    
</div>
</div>










      
      
      
      
     
      
      
    
     