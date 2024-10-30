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
            
            
           
			<div class="row"> 
              <div class="col-sm-3">
          <div class="form-group">
        
            <label>lISTA DE CORTADORES</label>
            <select class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="3">4</option>
<option value="3">5</option>
                
</select>
 </div>
              
              </div>
            
            <label>TIPO DE CORTE</label>TIPO DE CORTE
             <select class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">FLORO</option>
  <option value="2">PIEL</option>
  <option value="3">SINTENTICOS</option>
  
</select>
            
            
            
            
       
            
            <label>CLIENTE</label>
            <select class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">HHBROM</option>
  <option value="2">JUSTIN</option>
  
                
</select>
            
                    
            
            
            SCANER 
            
            
            MODELO
            PRECIO
            PO
            LISTA
            PARES
            
            META (COMPARACIÓN POR TIEMPO POR MODELO) ASIGNA INGENIERIA
                
                
                
                
                
                
            
            
            
            
            
            
            
            LOTES TRABAJADOS (CANTIDAD POR DÍA)
            LISTA COMPLETAS(SEMANA)
            LOTES TRABAJADOS POR SEMANA.
            
            
            
            PARES ESCANEADOS
            MONTO GENERADO
            
            
            
            
            
            
            
            
  
    
   
    
       



                
               
  
    

</div>
             
    
    
</div>
</div>










      
      
      
      
     
      
      
    
     