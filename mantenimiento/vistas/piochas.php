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
        <li class="breadcrumb-item active">Producción</li>
        <li class="breadcrumb-item active">Piochas</li>
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
                
                    <a href="index.php?vista=nueva_piocha" class="btn btn-outline-light" id="nuevaOV" style="background-color:#4e84a9;color:white;float:right;margin-bottom:1rem;" role="button">
                      <i class="fa fa-plus-square"></i>
                      Nueva solicitud
                    </a>
                

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
                  <th class="d-none d-lg-table-cell">PO</th> <!-- Oculto en pantallas pequeñas -->
                  <th class="d-none d-lg-table-cell">Estilo</th> <!-- Oculto en pantallas pequeñas -->
                  <th class="d-none d-lg-table-cell">Punto</th> <!-- Oculto en pantallas pequeñas -->
                  <th class="d-none d-lg-table-cell">Cantidad</th> <!-- Oculto en pantallas pequeñas -->
				<th>Departamento</th>
                <th class="d-none d-lg-table-cell">Tipo de defecto</th> <!-- Oculto en pantallas pequeñas -->
                <th>Solicita</th>
                <th class="d-none d-lg-table-cell">Fecha de solicitud</th> <!-- Oculto en pantallas pequeñas -->
                <th class="d-none d-lg-table-cell">Fecha de entrega</th> <!-- Oculto en pantallas pequeñas -->
                <th class="d-none d-lg-table-cell">Inspector</th> <!-- Oculto en pantallas pequeñas -->
                <th class="d-none d-lg-table-cell">Estatus</th> <!-- Oculto en pantallas pequeñas -->
                 
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
                     <td class="d-none d-lg-table-cell"><?php echo $data_row['color']; ?></td> <!-- Oculto en pantallas pequeñas -->
                     <td class="d-none d-lg-table-cell"><?php echo $data_row['estilo']; ?></td> <!-- Oculto en pantallas pequeñas -->
                     <td class="d-none d-lg-table-cell"><?php echo $data_row['punto']; ?></td> <!-- Oculto en pantallas pequeñas -->
                     <td class="d-none d-lg-table-cell"><?php echo $data_row['cantidad']; ?></td> <!-- Oculto en pantallas pequeñas -->
                     <td><?php echo $data_row['departamento']; ?></td>
                     <td class="d-none d-lg-table-cell"><?php echo $data_row['tipo_defecto']; ?></td> <!-- Oculto en pantallas pequeñas -->
                     <td><?php echo $data_row['solicita']; ?></td>
                     <td class="d-none d-lg-table-cell"><?php echo $data_row['fecha_solicitud']; ?></td> <!-- Oculto en pantallas pequeñas -->
                     <td class="d-none d-lg-table-cell"><?php echo $data_row['fecha_entrega']; ?></td> <!-- Oculto en pantallas pequeñas -->
                     <td class="d-none d-lg-table-cell"><?php echo $data_row['inspector']; ?></td> <!-- Oculto en pantallas pequeñas -->
                     <td class="d-none d-lg-table-cell"><?php echo $data_row['estatus']; ?></td> <!-- Oculto en pantallas pequeñas -->
                     <td>
                     
                     
                     
                     
                     
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
    
    
       



                
               
  
    

</div>
             
    
    
</div>
</div>










      
      
      
      
     
      
      
    
     