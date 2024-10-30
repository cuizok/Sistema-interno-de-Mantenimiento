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
    



<div class="container-fluid" align="center" >

    
    
    
<div class="container is-fluid mb-6">
	<h1 class="title"></h1>
	<h2 class="subtitle">Revision tickets </h2>
</div>
    
    
    

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['category_id_up'])) ? $_GET['category_id_up'] : 0;
		$id=limpiar_cadena($id);

		/*== Verificando categoria ==*/
    	$check_categoria=conexion();
    	$check_categoria=$check_categoria->query("SELECT * FROM tickets WHERE idtickets='$id'");

        if($check_categoria->rowCount()>0){
        	$datos=$check_categoria->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>
    
    
   

	<form action="./php/actualizar_ticket.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<input type="hidden" name="idtickets" value="<?php echo $datos['idtickets']; ?>"  >

		<div class="row">  
        <div class="col-sm-3">
          <div class="form-group">
					
        <label>Quien solicita</label>
	   <input class="input" type="text" name="departamento"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50"  value="<?php echo $datos['quien_solicita']; ?>" >
				
             </div>
        </div>
            
            <input type="hidden" name="quien_solicita" value="<?php echo $datos['quien_solicita']; ?>">

           
             
            
             <div class="col-sm-3">
          <div class="form-group">
              <label>Prioridad</label>
            
              
              <select class="form-control" name="prioridades"  >
				    	<option value="" selected="" >Seleccione una opción</option>
				    	<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM prioridades");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								echo '<option value="'.$row['nombre_prioridades'].'" >'.$row['nombre_prioridades'].'</option>';
				    			}
				   			}
				   			$categorias=null;
				    	?>
				  	</select>
          </div>
                  
              </div>
            
            <div class="col-sm-3">
          <div class="form-group">
        <label>Ingeniero asignado</label>
              
              <select class="form-control" name="ingeniero_asignado"  >
  <option selected value="<?php echo $datos['ingeniero_asignado']; ?>">Seleccione una opción</option>
  <option value="DIEGO MORALES">DIEGO MORALES</option>
  <option value="RACIEL CLAUDIO">RACIEL CLAUDIO</option>
</select>
            </div>
            </div>
                
                
                      
        </div>         
                       <div class="row">  
        <div class="col-sm-3">
          <div class="form-group">         
					<label>Folio del equipo</label>
				  	<input class="input" type="text" name="departamento"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50"  value="<?php echo $datos['folio_equipo']; ?>" >
				
            </div>
                           </div>
                           
            <div class="col-sm-3">
          <div class="form-group">
					<label>Fecha</label>
				  	<input class="input" type="text" name="fecha"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50"  value="<?php echo $datos['fecha']; ?>" >
                </div>
            </div>
                           
                           
                      <div class="col-sm-3">
          <div class="form-group"> 
					<label>Problema</label>
				  	<input class="input" type="text" name="falla"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50"  value="<?php echo $datos['problema']; ?>" >
				
                          </div>
                           </div>
                           
            
                           
                           
		  	
                           
                           
                           
        <div class="col-sm-3">
          <div class="form-group">
        <label>Estatus</label>
              
              <select class="form-control" name="estatus"  >
  <option selected value="<?php echo $datos['estatus']; ?>">Seleccione una opción</option>
  <option value="ABIERTO">ABIERTO</option>
  <option value="CERRADO">CERRADO</option>
  <option value="PROCESO">PROCESO</option>
</select>
            </div>
            </div>
              
        
         
        
                           </div>
    
        
        <div class="form-group">
         <label>Descripcion del problema</label>
        <input class="input" type="text" name="departamento"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="100"  value="<?php echo $datos['descripcion_del_problema']; ?>" >
            
                           </div>
			
        <div class="form-group">
         <label>Observaciones</label>
        <textarea class="form-control" name="observaciones"  rows="4" cols="90" ></textarea>
                           </div>
               
            
		  	
					
				
		  	
		
                    
                    
                    
                 
                    
		<p class="has-text-centered">
			<button type="submit" class="button is-success is-rounded">Actualizar</button>
		</p>
              
                           </div>
               
	</form>
	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_categoria=null;
	?>
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
$(document).ready(function() {
    $('form.FormularioAjax').submit(function(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario
        Notification.requestPermission().then(function(permission) {
            if (permission === "granted") {
                new Notification("¡Orden Actualizada!", {
                    body: "La orden #<?php echo $datos['idtickets']; ?> ha sido actualizada."
                });
            }
        });
    });
});
</script>