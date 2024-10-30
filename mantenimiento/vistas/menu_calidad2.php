<?php
include('header.php');  
?>


<div class="wrapper d-flex align-items-stretch">
<?php
include('menuCalidad.php');
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
        <li class="breadcrumb-item active">Calidad</li>
        <li class="breadcrumb-item active">Menu</li>
        <li class="ml-auto"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></li>
    </ol>
    </div>  
    </div>
</div>
</nav>


    
    
        

<!-- TABLA PRINCIPAL -->
        
        
<div class="card mb-4" id="tblPrincipal" style="width:100%">
        <div class="card-body" align="left"> 
            <div class="table-responsive" style="width:100%;">
                
                    
                

            </div>









            </div>              
    



<div class="container-fluid" align="center" >

    
     
    
    
    <?php
        require_once "./php/main.php";
    

        # Eliminar categoria #
        if(isset($_GET['category_id_del'])){
            require_once "./php/categoria_eliminar.php";
        }

        if(!isset($_GET['page'])){
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];
            if($pagina<=1){
                $pagina=1;
            }
        }

        $pagina=limpiar_cadena($pagina);
        $url="index.php?vista=ordenes_list&page="; /* <== */
        $registros=15;
        $busqueda="";

        # Paginador categoria #
        
    
    
    
    
    
    
    ?>
    
    
          
    
   
	<div class="row">
		<div class="col-lg-12" align="center">
			<br>
			<h5 align="center"></h5>
			<br>
            
            
           
			
            
            
           
<div class="container-fluid">
                        
           <div class="row">
            <div class="col-xl-3 col-md-6">
              <div onclick="window.location.href='index.php?vista=ordenes_list_calidad'" class="card btnmenu text-gray mb-4" style="background-color: #b9ddc8; color:black;cursor:pointer;">
                <div class="card-body">Paretos</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <span class="small text-gray"></span>
                  <div class="small text-gray"><i class="fa fa-angle-right"></i></div>
                </div>
              </div>
            </div>
          </div>
    
    
    
                        
           <div class="row">
            <div class="col-xl-3 col-md-6">
              <div onclick="window.location.href='index.php?vista=seguimiento_piochas_calidad'" class="card btnmenu text-gray mb-4" style="background-color: #b9ddc8; color:black;cursor:pointer;">
                <div class="card-body">Piochas</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <span class="small text-gray"></span>
                  <div class="small text-gray"><i class="fa fa-angle-right"></i></div>
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
    
    
  
    
   
    
       



                
               
  
    

</div>
             
    
    
</div>
</div>










      
      
      
      
     
      
      
    
     