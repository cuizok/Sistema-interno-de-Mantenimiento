






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
        <li class="breadcrumb-item active">Nueva Piocha</li>
        <li class="ml-auto"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></li>
    </ol>
    </div>  
    </div>
</div>
</nav>
    
    
        
<div class="card mb-4" id="tblPrincipal" style="width:100%">
        <div class="card-body" align="left"> 
            <div class="table-responsive" style="width:100%;">
                
                    
                

            </div>









            </div>     


<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
	?>

	
                                                                           

    
    
    
<!DOCTYPE html>
<html>
<head>
  <title>Nueva piocha</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>                      
                        
    
    <?php
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
	
	
?>
    
    
  
 
    
   
  
        <!-- Formulario de registro -->
        <form action="./php/guardar_piochas.php" method="POST">
          <h2 class="mt-5 mb-4"></h2>
          <!-- Campo de entrada para el nombre de usuario -->
            
            <!-- Campo de entrada para la contraseña -->
          <div class="row"> 
         <div class="col-sm-3">
             
             
             
             
             
             
             
            <div class="form-group">
              <label>Quien solicita</label>
              
              <input class="form-control inputP" type="text" name="usuario"  maxlength="70" required  
                           
				    	value="<?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?>">
              
              
            
          </div>
              </div>
            
          
          <!-- Campo de entrada para la contraseña -->
              
            </div>
              <br>
              
            
            
           
            
            <br>
            <br>
           
            <!-- Campo de entrada para el equipo -->
            <div class="row"> 
            
            <div class="col-sm-3">
          <div class="form-group">
              <label>PO</label>
            <input type="text" class="form-control" name="po"  value=" "
                   
                   required>
          </div>
              </div>
            </div>
            
              
		  <!-- Campo de entrada para el equipo -->
              <div class="row"> 
              <div class="col-sm-3">
          <div class="form-group">
              <label>Estilo</label>
            <input type="text" class="form-control" name="estilo" placeholder="" required>
          </div>
              
              </div>
              
              
              
            <!-- Campo de entrada para el nombre de usuario -->
              <div class="col-sm-3">
          <div class="form-group">
              <label>Color</label>
            <input type="text" class="form-control" name="color"  value=" "
                   
                   required>
          </div>
              </div>
            
             <!-- Campo de entrada para el nombre de usuario -->
              
              
              <div class="col-sm-3">
          <div class="form-group">
              <label>Punto</label>
            <input type="text" class="form-control" name="punto" placeholder="" required>
          </div>
              </div>
            
             <!-- Campo de entrada para el nombre de usuario -->
              <div class="col-sm-3">
          <div class="form-group">
              <label>Cantidad</label>
            <input type="text" class="form-control" name="cantidad" placeholder="" required>
          </div>
              </div>
                  
              
            
             <!-- Campo de entrada para el nombre de usuario -->
              <div class="col-sm-3">
          <div class="form-group">
              <label>Departamento</label>
            <div >
               	
              <select class="form-control" name="departamento"  required>
				    	<option value="" selected="" >Seleccione una opción</option>
				    	<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM departamento");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								echo '<option value="'.$row['nombre_departamento'].'" >'.$row['nombre_departamento'].'</option>';
				    			}
				   			}
				   			$categorias=null;
				    	?>
				  	</select>   
                
                
                
          </div>
                  </div>
              </div>
                  
                  
                  
                  
                  
                  
            
             <!-- Campo de entrada para el nombre de usuario -->
                  <div class="col-sm-3">
          <div class="form-group">
              <label>Tipo de defecto</label>
            <input type="text" class="form-control" name="tipo_defecto" placeholder="" required>
          </div>
                  </div>
            
            
            
               <!-- Campo de entrada para el nombre de usuario -->
                  <div class="col-sm-3">
          <div class="form-group">
              <label>Fecha solicitud</label>
            <input type="date" class="form-control" name="fecha_solicitud" placeholder="" required>
              
              
              
          </div>
                  </div>
            
                  
                   <!-- Campo de entrada para el nombre de usuario -->
                  <div class="col-sm-3">
          <div class="form-group">
              <label>Fecha de entrega</label>
            <input type="date" class="form-control" name="fecha_entrega" placeholder="" required>
          </div>
                  </div>
            
              
                  
                  <!-- Campo de entrada para el nombre de usuario -->
                  <div class="col-sm-3">
          <div class="form-group">
              <label>Inspector</label>
              <select class="form-control" name="departamento"  required>
				    	<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM piochas where inspector = 'GUADALUPE ALONSO'");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								echo '<option value="'.$row['inspector'].'" >'.$row['inspector'].'</option>';
				    			}
				   			}
				   			$categorias=null;
				    	?>
				  	</select>             </div>
                  </div>
                  
                  
              
               <!-- Estatus -->
                      
                 <div class="col-sm-3">
          <div class="form-group">     
             <label>Estatus</label>
            <select name="estatus" class="form-control"  required>
  <option selected>Seleccione una opción</option>
  <option value="ABIERTA">Abierta</option>
  <option value="CERRADA">Cerrada</option>
  <option value="PROCESO">En proceso</option>
</select>
                     </div></div>
              <br>
           
            
            
            
            
          <!-- Botón para enviar el formulario de registro -->
              <div class="row">
                  <div class="form-group">
<div class="col-sm-12" align="right">
          <button type="submit" class="btn btn-primary btn btn-success info" name="piochas">Generar Orden</button>
    
                  </div>
              </div>
              </div>
            </div>
        </form>
        <!-- Enlace para redirigir al formulario de inicio de sesión -->
        
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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
                       
                      
                       </body>
</html>
