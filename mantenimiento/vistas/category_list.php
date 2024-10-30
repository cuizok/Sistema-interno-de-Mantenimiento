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


    
    

<div class="container is-fluid mb-6">
    <h1 class="title"></h1>

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
        $url="index.php?vista=category_list&page="; /* <== */
        $registros=15;
        $busqueda="";

        # Paginador categoria #
        require_once "./php/categoria_lista.php";
    ?>
      </div>
 </div>

 
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
                       
                      
         