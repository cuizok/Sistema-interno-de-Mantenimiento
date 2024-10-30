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
	<h2 class="subtitle">Actualizar Ordenes </h2>
</div>
    
    
    

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['category_id_up'])) ? $_GET['category_id_up'] : 0;
		$id=limpiar_cadena($id);

		/*== Verificando categoria ==*/
    	$check_categoria=conexion();
    	$check_categoria=$check_categoria->query("SELECT * FROM ordenes WHERE idordenes='$id'");

        if($check_categoria->rowCount()>0){
        	$datos=$check_categoria->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>
    
    
   

	<form action="./php/categoria_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >
        
                            
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


		<input type="hidden" name="idordenes" value="<?php echo $datos['idordenes']; ?>" required >

		<div class="row">  
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
					
        <label>Folio</label>
				  	<input class="input" type="text" name="folio"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['idordenes']; ?>" >
				
             </div>
        </div>
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
					<label>Fecha</label>
				  	<input class="input" type="text" name="fecha"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['created_at']; ?>" >
                </div>
            </div>
                
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
					<label>Nombre Maquina</label>
				  	<input class="input" type="text" name="maquina"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['maquina']; ?>" >
				
                    </div>
            </div>
            <div class="col-xl-3 col-md-6">
          <div class="form-group">     
					<label>Código</label>
				  	<input class="input" type="text" name="codigo"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['codigo']; ?>" >
                          </div>
            </div>
        </div>         
                       <div class="row">  
            <div class="col-xl-3 col-md-6">
          <div class="form-group">         
					<label>Departamento</label>
				  	<input class="input" type="text" name="departamento"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['departamento']; ?>" >
				
            </div>
                           </div>
            <div class="col-xl-3 col-md-6">
          <div class="form-group"> 
					<label>Falla</label>
				  	<input class="input" type="text" name="falla"  disabled pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required value="<?php echo $datos['falla']; ?>" >
				
                          </div>
                           </div>
                           
                           
		  	
                           
                           
                           
            <div class="col-xl-3 col-md-6">
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
              
        
         
            <div class="col-xl-3 col-md-6">
          <div class="form-group">
        <label>Mecanico</label>
              
              <select class="form-control" name="mecanico" >
				    	<option value="<?php echo $datos['mecanico']; ?>" selected="" >Seleccione una opción</option>
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

        
        <div class="form-group">
         <label>Refacciones</label>
        <textarea  class="form-control" name="refacciones" rows="3" cols="90"></textarea>
                           </div>

        <div class="form-group">
         <label>Observaciones</label>
        <textarea class="form-control" name="observaciones" rows="3" cols="90"></textarea>
                           </div>
        
        <!-- Agregar el campo de firma al formulario -->
<div class="form-group">
    <label>Firma del Usuario</label>
    <div id="signature-pad" class="signature-pad">
        <div class="signature-pad--body">
            <canvas></canvas>
        </div>
        <div class="signature-pad--footer">
            <button type="button" class="button clear" data-action="clear">Limpiar</button>
        </div>
    </div>
    <input type="hidden" name="firma" id="firma">
    <p class="has-text-centered">
        <button type="submit" data-action="save-png" class="button is-success is-rounded">Actualizar</button>
		</p>

</div>

        
        
         <form method="post" action="/send/" enctype="multipart/form-data">
  <input type="file" name="archivo">
</form>

        
     
        

					
				
		  	
		<?php
// Consultar historial de cambios para la orden actual
$consulta_historial = conexion()->prepare("SELECT * FROM historial_ordenes WHERE idorden = :idorden ORDER BY fecha DESC");
$consulta_historial->bindParam(':idorden', $id, PDO::PARAM_INT);
$consulta_historial->execute();
$historial = $consulta_historial->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Mostrar historial de cambios -->
<div class="container mt-6">
    <h3>Historial de cambios</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Observaciones</th>
                    <th>firma</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($historial as $cambio) : ?>
                    <tr>
                        <td><?php echo $cambio['fecha']; ?></td>
                        <td><?php echo $cambio['observaciones']; ?></td>
   <td>
                            <?php if (!empty($cambio['firma'])) : ?>
                                <img src="<?php echo $cambio['firma']; ?>" alt="Firma" style="width: 100px; height: auto;">
                            <?php else : ?>
                                No disponible
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
  
                    
                    
                 
                    
		
              
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
    
    .signature-pad {
    border: 1px solid #000;
    padding: 10px;
}

.signature-pad--body canvas {
    width: 100%;
    height: 200px;
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
        

  document.addEventListener('DOMContentLoaded', function() {
        const canvas = document.querySelector('canvas');
        const signaturePad = new SignaturePad(canvas);

        document.querySelector('[data-action=clear]').addEventListener('click', () => {
            signaturePad.clear();
        });

        document.querySelector('[data-action=save-png]').addEventListener('click', () => {
            if (!signaturePad.isEmpty()) {
                const dataURL = signaturePad.toDataURL('image/png');
                document.getElementById('firma').value = dataURL;
            }
        });
    });
</script>
    
    
    
