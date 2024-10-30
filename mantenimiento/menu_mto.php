<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	
?>



<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');  
?>

<body>

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
        <li class="ml-auto"><?php echo $nombre ?></li>
    </ol>
    </div>  
    </div>
</div>
</nav>
<main>
<div class="container-fluid">
                        
           <div class="row">
            <div class="col-xl-3 col-md-6">
              <div onclick="window.location.href='consulta_solicitud_m.php'" class="card btnmenu text-gray mb-4" style="background-color: #b9ddc8; color:black;cursor:pointer;">
                <div class="card-body">Ordenes de mantenimiento</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <span class="small text-gray"></span>
                  <div class="small text-gray"><i class="fa fa-angle-right"></i></div>
                </div>
              </div>
            </div>
          </div>

                        <style>
                            .btnmenu:hover{
                                 transform: scale(1.05);
                              box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
                            }
                        </style>

    
    
    </div>
    
    
    <div class="col-xl-3 col-md-6">
              <div onclick="window.location.href='ordenes_venta2.php'" class="card btnmenu text-gray mb-4" style="background-color:#cfdbc7; color:black;cursor:pointer;">
                <div class="card-body">Inventario</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <span class="small text-gray"></span>
                  <div class="small text-gray"><i class="fa fa-angle-right"></i></div>
                </div>
              </div>
            </div>
    
    
    
       <div class="col-xl-3 col-md-6">
              <div onclick="window.location.href='ordenes_venta2.php'" class="card btnmenu text-gray mb-4" style="background-color:#cfdbc7; color:black;cursor:pointer;">
                <div class="card-body">Programación de mantenimiento</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <span class="small text-gray"></span>
                  <div class="small text-gray"><i class="fa fa-angle-right"></i></div>
                </div>
              </div>
            </div>
    
   
    
       


</main>

             
    
    
</div>
</div>


    <?php 
    //FOOTER
    include('footer.php'); 
    ?>      
    </body>

</html>
