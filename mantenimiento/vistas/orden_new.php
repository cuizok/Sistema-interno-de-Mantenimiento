<div class="container is-fluid mb-6">
	<h1 class="title"></h1>
	<h2 class="subtitle"></h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
	?>

	<div class="form-rest mb-6 mt-6"></div>
    
    
    
     <script>
                                    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                    var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
                                    var f=new Date();                                    
                                    document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                    </script>
    

	<form action="./php/guardar/orden.php" method="POST"  class="needs-validation"  novalidate onsubmit="return validarform()">
        
        
        
        
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Folio</label>
				  	<input class="input" type="text" name="producto_codigo"  maxlength="70"  >
				</div>
		  	</div>
            
            
            
            <div class="column">
		    	<div class="control">
					<label>Semana</label>
				  	<input class="input" type="text" name="semana"  maxlength="70"  >
				</div>
		  	</div>
            
            
		  	<div class="column">
		    	<div class="control">
					<label>Nombre del equipo</label>
				  	<input class="input" type="text" name="maquina"  maxlength="70"  >
				</div>
		  	</div>
            
            
            <div class="column">
		    	<div class="control">
					<label>Fecha</label>
				  	<input class="input" type="date" name="fecha"  maxlength="70"  value="" >
				</div>
		  	</div>
		</div>
        
        
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Modelo</label>
				  	<input class="input" type="text" name="modelo"  maxlength="25"  >
				</div>
		  	</div>
            
            
            
		  	<div class="column">
		    	<div class="control">
					<label>Codigo</label>
				  	<input class="input" type="text" name="codigo" pattern="[0-9]{1,25}" maxlength="25"  >
				</div>
		  	</div>
            
            
            
            <div class="column">
				<label>Departamento</label><br>
		    	<div class="select is-rounded">
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
		  	</div>
            
            
            
            
            <div class="column">
		    	<div class="control">
					<label>Acciones</label>
				  	<input class="input" type="text" name="acciones"  maxlength="25"  >
				</div>
		  	</div>
            
   
    
		</div>
        
        
        
        <div class="columns">
         <div class="column">
		    	<div class="control">
					<label>Especificaciones</label>
                    <textarea class="input" id="exampleFormControlTextarea1" name="especificaciones"  maxlength="25" required rows="3"></textarea>
                    
				  	
				</div>
		  	</div>
        
        </div>
        
        
        
        <div class="columns">
         <div class="column">
		    	<div class="control">
					<label>falla</label>
                    <input class="input" type="text" name="falla"  maxlength="25"  >
                    
				  	
				</div>
		  	</div>
        
        </div>
        
        
		<div class="columns">
			<div class="column">
				<label>Foto o imagen del producto</label><br>
				<div class="file is-small has-name">
				  	<label class="file-label">
				    	<input class="file-input" type="file" name="producto_foto" accept=".jpg, .png, .jpeg" >
				    	<span class="file-cta">
				      		<span class="file-label">Imagen</span>
				    	</span>
				    	<span class="file-name">JPG, JPEG, PNG. (MAX 3MB)</span>
				  	</label>
				</div>
			</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>