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
    



<div class="container-fluid" align="center" >

    
    
    
<div class="container is-fluid mb-6">
	<h1 class="title"></h1>
	<h2 class="subtitle">Actualizar Equipos</h2>
</div>
    
    
    

<div class="container pb-6 pt-6">
	<?php
            include "./inc/btn_back.php";
            require_once "./php/main.php";

            $id = (isset($_GET['category_id_up'])) ? $_GET['category_id_up'] : 0;
            $id = limpiar_cadena($id);

            /*== Verificando equipo ==*/
            $check_equipo = conexion();
            $check_equipo = $check_equipo->query("SELECT * FROM equipos WHERE idmaquina='$id'");

            if ($check_equipo->rowCount() > 0) {
                $datos = $check_equipo->fetch();
        ?>
	<div class="form-rest mb-6 mt-6"></div>
    
    
   

    <form action="./php/actualizarEquipo.php" method="POST" class="FormularioAjax" autocomplete="off">
        
                            
<script>
$(document).ready(function() {
    $('form.FormularioAjax').submit(function(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario
        console.log("Formulario enviado"); // Add console.log() for debugging
        Notification.requestPermission().then(function(permission) {
            if (permission === "granted") {
                new Notification("¡Orden Actualizada!", {
                    body: "La orden #<?php echo $datos['idordenes']; ?> ha sido actualizada."
                });
            }
        });
    });
});
</script> 


		<input type="hidden" name="idordenes" value="<?php echo $datos['idmaquina']; ?>" required >

		<div class="row">  
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
					
        <label>Folio</label>
				  	<input class="input" type="text" name="idmaquina" maxlength="50" required value="<?php echo $datos['idmaquina']; ?>" >
				
             </div>
        </div>
            
             <div class="col-xl-3 col-md-6">
          <div class="form-group">
					<label>Nombre Maquina</label>
				  	<input class="input" type="text" name="nombre" maxlength="50" required value="<?php echo $datos['nombre']; ?>" >
				
                    </div>
            </div>
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
					<label>q</label>
				  	<input class="input" type="text" name="q" maxlength="50" required value="<?php echo $datos['q']; ?>" >
                </div>
            </div>
                
           
            <div class="col-xl-3 col-md-6">
          <div class="form-group">     
					<label>Modelo</label>
				  	<input class="input" type="text" name="modelo" maxlength="50" required value="<?php echo $datos['modelo']; ?>" >
                          </div>
            </div>
        </div>         
                       <div class="row">  
            <div class="col-xl-3 col-md-6">
          <div class="form-group">         
					<label>Numero de serie</label>
				  	<input class="input" type="text" name="nserie" maxlength="50" required value="<?php echo $datos['nserie']; ?>" >
				
            </div>
                           </div>
            <div class="col-xl-3 col-md-6">
          <div class="form-group"> 
					<label>Tipo</label>
				  	<input class="input" type="text" name="tipo"  maxlength="50" required value="<?php echo $datos['tipo']; ?>" >
				
                          </div>
                           </div>
                           
           
		  	
                           
                           
                           
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
        <label>Estatus</label>
              
       				  	<input class="input" type="text" name="estatusE"  maxlength="50" required value="<?php echo $datos['estatusE']; ?>" >

            </div>
            </div>
              
        
         
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
        <label>m</label>
            
                	<input class="input" type="text" name="m"  maxlength="50" required value="<?php echo $datos['m']; ?>" >

				  	
            </div>
            </div>
                           
                             
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
        <label>Departamento</label>
            
                	<input class="input" type="departamentoE" name="departamentoE"  maxlength="50" required value="<?php echo $datos['departamentoE']; ?>" >

				  	
            </div>
            </div>
                           </div>

        
   
                    
                    
                       
		 <p class="has-text-centered">
        <button type="submit" class="button is-success is-rounded" >Actualizar</button>
		</p>
                    
		
              
                           </div>
               
	</form>
	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_categoria=null;
	?>
    
    
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
    
    
    
