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
    
    
        
<div class="card mb-4" id="tblPrincipal" style="width:100%">
        <div class="card-body" align="left"> 
            <div class="table-responsive" style="width:100%;">
                
                    
                

            </div>

        </div>     


<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
	?>

	<div class="form-rest mb-6 mt-6"></div>
                                                                    

    
    
    
<!DOCTYPE html>
<html>
<head>
  <title>Nueva Orden de mantenimiento</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>                      
                        
    
    <?php
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
	
	
?>
    
    
   
  
        <!-- Formulario de registro -->
        <form action="./php/registro1.php" method="POST">
          <h2 class="mt-5 mb-4"></h2>
          <!-- Campo de entrada para el nombre de usuario -->
            
            <!-- Campo de entrada para la contraseña -->
          <div class="row"> 
         <div class="col-sm-3">
             
            <div class="form-group">
              <label>Quien solicita</label>
              
              <input class="form-control inputP" type="text" name="usuario"  maxlength="70" required  readonly
                           
				    	value="<?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?>">
              
              
            
          </div>
              </div>
            
          
          <!-- Campo de entrada para la contraseña -->
              <div class="col-sm-3">
          <div class="form-group">
              <label>Semana</label>
            
              
              <select class="form-control" name="semana"  required>
				    	<option value="" selected="" >Seleccione una opción</option>
				    	<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM semanas");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								echo '<option value="'.$row['nombre_semana'].'" >'.$row['nombre_semana'].'</option>';
				    			}
				   			}
				   			$categorias=null;
				    	?>
				  	</select>
          </div>
                  
              </div>
              
                <div class="col-sm-3">
             
            <div class="form-group">
              <label>Codigo</label>
              
              <input class="form-control inputP" type="text" name="codigo"  maxlength="70" required  
                     
                     value="">
            
          </div>
            <button type="button" class="btn btn-success" onclick="buscarInformacion()" name="codigo">Buscar</button>

                    
                    
                    
                    
              </div>
 


              </div>

        
              

              <br>
              
            

            
            
            <br>
            <br>
           
              
		  <!-- Campo de entrada para el equipo -->
              <div class="row"> 
              <div class="col-sm-3">
          <div class="form-group">
              <label>Nombre del equipo</label>
            <input type="text" class="form-control" name="maquina" placeholder="" required readonly>
          </div>
              
              </div>
              
              
              
            <!-- Campo de entrada para el nombre de usuario -->
              
            
             <!-- Campo de entrada para el nombre de usuario -->
              
              
              <div class="col-sm-3">
          <div class="form-group">
              <label>Modelo</label>
            <input type="text" class="form-control" name="modelo" placeholder="" required readonly>
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
           
            
             <!-- Campo de entrada para el nombre de usuario -->
              <div class="col-sm-3">
          <div class="form-group">
              <label>Falla</label>
            <input type="text" class="form-control" name="falla" placeholder="" required>
          </div>
              </div>
              
               <!-- Campo de entrada para el nombre de usuario -->
                  <div class="col-sm-3">
          <div class="form-group">
              <label>Mecanico</label>
            <div >
               	<select class="form-control" name="mecanico" required >
				    	<option value="" selected="" >Seleccione una opción</option>
				    	<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM mecanico");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								echo '<option value="'.$row['nombre_mecanico'].'" >'.$row['nombre_mecanico'].'</option>';
				    			}
				   			}
				   			$categorias=null;
				    	?>
				  	</select>
          </div>
          </div>
              </div>
                  
              
               <!-- Estatus -->
                      
                 <div class="col-sm-3">
          <div class="form-group">   
             <label>Estatus</label>
            <select class="form-control" name="estatus" required>
              <option value= "" selected =""> Seleccione una opción</option>
              <option value="ABIERTA">Abierta</option>
              <option value="CERRADA">Cerrada</option>
              <option value="PROCESO">En proceso</option> 
            </select>
                     </div>
                     
                        </div>
              <br>
           
            
            
            
            
          <!-- Botón para enviar el formulario de registro -->
             
            </div>
             <div class="row">
                  <div class="form-group">
<div class="col-sm-12" align="right">
          <button type="submit" class="btn btn-primary btn btn-success info" name="registro">Generar Orden</button>
    
                  </div>
              </div>
              </div>
        </form>
        <!-- Enlace para redirigir al formulario de inicio de sesión -->
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
        
    function buscarInformacion() {
    var Idmaquina = document.getElementsByName('codigo')[0].value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "buscar_informacion.php?Idmaquina=" + Idmaquina, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var data = xhr.responseText.split(','); // Separar la respuesta en un array
            if (data.length >= 2) {
                document.getElementsByName("maquina")[0].value = data[0]; // Asignar el primer valor al campo "maquina"
                document.getElementsByName("modelo")[0].value = data[1]; // Asignar el segundo valor al campo "modelo"
            } else {
                alert("Error: Codigo incorrecto, intenta de nuevo");
            }
        }
    };

    
    xhr.send();

}


        </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    
         
</body>
</html>
