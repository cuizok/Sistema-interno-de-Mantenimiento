

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



<div class="container is-fluid mb-6">
	<h1 class="title"></h1>
	<h2 class="subtitle">Actualizar Piochas </h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['category_id_up'])) ? $_GET['category_id_up'] : 0;
		$id=limpiar_cadena($id);

		/*== Verificando categoria ==*/
    	$check_categoria=conexion();
    	$check_categoria=$check_categoria->query("SELECT * FROM piochas WHERE idpiochas='$id'");

        if($check_categoria->rowCount()>0){
        	$datos=$check_categoria->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>
    
    
   

	<form action="./php/actualizar_piochas.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<input type="hidden" name="idordenes" value="<?php echo $datos['idpiochas']; ?>" required >

		<div class="row">  
        <div class="col-sm-3">
          <div class="form-group">
					
        <label>Folio</label>
				  	<input class="input" type="text" name="folio"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['idpiochas']; ?>" >
				
             </div>
        </div>
            <div class="col-sm-3">
          <div class="form-group">
					<label>Fecha Solicitud</label>
				  	<input class="input" type="text" name="fecha"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['fecha_solicitud']; ?>" >
                </div>
            </div>
                
                <div class="col-sm-3">
          <div class="form-group">
					<label>Estilo</label>
				  	<input class="input" type="text" name="maquina"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['estilo']; ?>" >
				
                    </div>
            </div>
                      <div class="col-sm-3">
          <div class="form-group">     
					<label>Color</label>
				  	<input class="input" type="text" name="codigo"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['color']; ?>" >
                          </div>
            </div>
            
            <div class="col-sm-3">
          <div class="form-group">     
					<label>Punto</label>
				  	<input class="input" type="text" name="codigo"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['punto']; ?>" >
                          </div>
            </div>
            
            <div class="col-sm-3">
          <div class="form-group">     
					<label>Cantidad</label>
				  	<input class="input" type="text" name="codigo"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['cantidad']; ?>" >
                          </div>
            </div>
            
            
        </div>         
                       <div class="row">  
        <div class="col-sm-3">
          
            
            
            
          <div class="form-group">
        <label>Departamento</label>
              
              <select class="form-control" name="departamento"  >
  <option selected value="<?php echo $datos['departamento']; ?>">Seleccione una opción</option>
    <option value="CORTE FLEXI">CORTE FLEXI</option>
    <option value="CORTE HHB">CORTE HHB</option>
    <option value="COORDINADO FLEXI">COORDINADO FLEXI</option>
    <option value="COORDINADO HHB">COORDINADO HHB</option>
    <option value="CORTE MELLOW WALK">CORTE MELLOW WALK</option>
    <option value="COORDINADO MELLOW WALK">COORDINADO MELLOW WALK</option>
    <option value="PESPUNTE FLEXI">PESPUNTE FLEXI</option>
    <option value="PESPUNTE HHB">PESPUNTE HHB</option>
    <option value="PESPUNTE MELLOW WALK">PESPUNTE MELLOW WALK</option>
    <option value="SUELAS FLEXI">SUELAS FLEXI</option>
    <option value="SUELAS HHB">SUELAS HHB</option>
    <option value="MONTADO FLEXI">MONTADO FLEXI</option>
    <option value="MONTADO HHB">MONTADO HHB</option>
    <option value="INSTALACIONES GENERALES">INSTALACIONES GENERALES</option>
    <option value="TEJIDO">TEJIDO</option>
    <option value="DESARROLLO">DESARROLLO</option>
    <option value="ALMACEN">ALMACEN</option>
  
                  
                  
</select>
            </div>
            
            
            
            
                           </div>
                      <div class="col-sm-3">
          <div class="form-group"> 
					<label>Falla</label>
				  	<input class="input" type="text" name="falla"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['tipo_defecto']; ?>" >
				
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
              
        
         
        <div class="col-sm-3">
          <div class="form-group">
        <label>Inspector</label>
              
             
              
              
              <input class="form-control inputP" type="text" name="inspector"  disabled maxlength="70" required  value="<?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?>">
              
				  	
            </div>
            </div>
                           </div>
    
        
        
			
        <div class="form-group">
         <label>Observaciones</label>
        <textarea class="form-control" name="observaciones" rows="3" cols="90"></textarea>
                           </div>
               
            
		  	
					
				
		  	
		
                    
                    
                    
                 
                    
		<p class="has-text-centered">
			<button type="submit" class="button is-success is-rounded">Actualizar</button>
		</p>
              
                           
               
	</form>
	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_categoria=null;
	?>
    
    
    
    
    
