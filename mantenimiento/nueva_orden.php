<!DOCTYPE html>
<html>
<head>
  <title>Página de registro</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Formulario de registro -->
        <form action="php/registro1.php" method="POST">
          <h2 class="mt-5 mb-4"></h2>
          <!-- Campo de entrada para el nombre de usuario -->
          
          <!-- Campo de entrada para la contraseña -->
          <div class="form-group">
              <label>Semana</label>
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
          <button type="submit" class="btn btn-primary" name="registro">Registrarse</button>
        </form>
        <!-- Enlace para redirigir al formulario de inicio de sesión -->
        
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
