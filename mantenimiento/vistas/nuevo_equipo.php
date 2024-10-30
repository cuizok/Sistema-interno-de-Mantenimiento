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
  <title>Alta de equipo</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>                      
                        
    
    <?php
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
	
	
?>
    
    
    <div class="container pb-6 pt-6">

  
        <!-- Formulario de registro -->
        <form action="./php/guardarEquipo.php" method="POST">
        <div class="form-rest mb-6 mt-6"></div>

          <h2 class="mt-5 mb-4"></h2>
          <!-- Campo de entrada para el nombre de usuario -->
            
            <!-- Campo de entrada para la contraseña -->
          <div class="row"> 
         <div class="col-sm-3">
             
            
            
          
          <!-- Campo de entrada para la contraseña -->
           
              
                <div class="col-sm-3">
             
          
                    
                    
                    
                    
              </div>
 


              </div>

        
              

              <br>
              
            

            
            
            <br>
            <br>
           
              
		  <!-- Campo de entrada para el equipo -->
              <div class="row"> 
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
              <label>Codigo</label>
            <input type="text" class="form-control" name="idmaquina" placeholder="" required>
          </div>
              
              </div>
              
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
              <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="" required>
          </div>
              </div>
              
              
            <!-- Campo de entrada para el nombre de usuario -->
              
            
             <!-- Campo de entrada para el nombre de usuario -->
              
              
          
            
             
              
            
             <!-- Campo de entrada para el nombre de usuario -->
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
              <label>Modelo</label>
             <input type="text" class="form-control" name="modelo" placeholder="" required>

            <div >
               
          </div>
                  </div>
              </div>
            
           
            
             <!-- Campo de entrada para el nombre de usuario -->
           
            
             <!-- Campo de entrada para el nombre de usuario -->
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
              <label>Numero de serie</label>
            <input type="text" class="form-control" name="nserie" placeholder="" required>
          </div>
              </div>
              
               <!-- Campo de entrada para el nombre de usuario -->
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
              <label>Tipo </label>
            <div >
                          <input type="text" class="form-control" name="tipo" placeholder="" required>

          </div>
          </div>
              </div>
                  
              
               <!-- Estatus -->
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
              <label>Estatus </label>
            <div >
                          <input type="text" class="form-control" name="estatusE" placeholder="" required>

          </div>
          </div>
              </div>
                  
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
              <label>m </label>
            <div >
                          <input type="text" class="form-control" name="m" placeholder="" required>

          </div>
          </div>
              </div>
                  
                  
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
              <label>Departamento </label>
            <div >
                          <input type="text" class="form-control" name="departamentoE" placeholder="" required>

          </div>
          </div>
              </div>
                  
               
            
            
            
            
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
   
        

        </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
  


         
</body>
</html>
