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
        <li class="ml-auto"><?php echo $usuario_nombre ?></li>
    </ol>
    </div>  
    </div>
</div>
</nav>
    
    
    

<div class="container is-fluid mb-6">
	<h1 class="title"></h1>
	<h2 class="subtitle"></h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		require_once "./main.php";
	?>

	<div class="form-rest mb-6 mt-6"></div>


<!DOCTYPE html>
<html>
<head>
  <title>Página de registro</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">ddd
    
    
    
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Formulario de registro -->
        <form action="registro1.php" method="POST">
          <h2 class="mt-5 mb-4"></h2>
          <!-- Campo de entrada para el nombre de usuario -->
          
          <!-- Campo de entrada para la contraseña -->
          <div class="form-group">
              <label>Seman</label>
            <input type="text" class="form-control" name="semana" placeholder="" required>
          </div>
		  <!-- Campo de entrada para el correo -->
          <div class="form-group">
              <label>Nombre del equipo</label>
            <input type="text" class="form-control" name="maquina" placeholder="" required>
          </div>
            <!-- Campo de entrada para el nombre de usuario -->
          <div class="form-group">
              <label>Fecha</label>
            <input type="date" class="form-control" name="fecha" placeholder="" required>
          </div>
            
             <!-- Campo de entrada para el nombre de usuario -->
          <div class="form-group">
              <label>Modelo</label>
            <input type="text" class="form-control" name="modelo" placeholder="" required>
          </div>
            
            
             <!-- Campo de entrada para el nombre de usuario -->
          <div class="form-group">
              <label>Codigo</label>
            <input type="text" class="form-control" name="codigo" placeholder="" required>
          </div>
            
            
             <!-- Campo de entrada para el nombre de usuario -->
          <div class="form-group">
              <label>Departamento</label>
            <input type="text" class="form-control" name="departamento" placeholder="" required>
               	<select name="departamento" >
				    	<option value="" selected="" >Seleccione una opción</option>
				    	<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM departamento");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								echo '<option value="'.$row['iddepartamento'].'" >'.$row['nombre_departamento'].'</option>';
				    			}
				   			}
				   			$categorias=null;
				    	?>
				  	</select>
          </div>
            
            
             <!-- Campo de entrada para el nombre de usuario -->
          <div class="form-group">
              <label>Acciones</label>
            <input type="text" class="form-control" name="acciones" placeholder="" required>
          </div>
            
             <!-- Campo de entrada para el nombre de usuario -->
          <div class="form-group">
              <label>Especificaciones</label>
            <input type="text" class="form-control" name="especificaciones" placeholder="" required>
          </div>
            
            
             <!-- Campo de entrada para el nombre de usuario -->
          <div class="form-group">
              <label>Falla</label>
            <input type="text" class="form-control" name="falla" placeholder="" required>
          </div>
            
            
           
            
            
            
            
          <!-- Botón para enviar el formulario de registro -->
          <button type="submit" class="btn btn-primary" name="registro">Generar Orden</button>
        </form>
        <!-- Enlace para redirigir al formulario de inicio de sesión -->
        
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
