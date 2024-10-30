<div class="container is-fluid mb-6">
    <h1 class="title"></h1>
    <h2 class="subtitle">Ordenes de Mantenimiento</h2>
</div>



<div class="container pb-6 pt-6">
    <button type="button" class="btn btn-info">Nueva Orden</button>
    
    
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
        require_once "./php/ordenes_lista.php";
    ?>
</div>