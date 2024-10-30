
<nav id="sidebar" class="active shadow">

<div class="transition-all" style="padding: 20% 10%;">
    <div class="box">
        <img src="#" width="100%;">
    </div>
</div>
   
<ul class="list-unstyled components mb-5">
<li>
<input style="display:none;" class="form-control" type="text" id="inputUsuarioMenu" value="" placeholder="">
<a title="Escritorio" style="cursor:pointer;" href="index.php?vista=produccion"><span class="fa fa-home" ></span> Escritorio</a>
</li>
<hr style="margin-left:20px;margin-right:20px;">
<!-- COMPRAS -->

    

<!-- COMERCIAL -->

 
<!-- VIGILANCIA -->

    
<!-- PRODUCCION -->
<li id="" >    
<a href='index.php?vista=menu_produccion2' title="Producción" id="toggle-btn-prod" style="cursor:pointer;"><span class="fa fa-cogs"></span> Producción</a>
</li>

    
    
    
    
   
    
   
    
<hr style="margin-left:20px;margin-right:20px;">
<li>
<a href="index.php?vista=user_update&user_id_up=<?php echo $_SESSION['id']; ?>" role="button" title="Configuración" id="toggle-btn-comercial" style="cursor:pointer;" ><span class="fa fa-cog"></span> Configuración</a>
</li>
<li>
<a href="index.php?vista=logout" title="Cerrar sesión" id="toggle-btn-comercial" style="cursor:pointer; color:#78281f;" ><span class="fa fa-sign-out"></span> Cerrar sesión</a>
</li>
</ul>
<div class="footer">

</div>
</nav>


<style>
    #sidebar.active ul li a {

    font-size: 0;
    text-align: center; }
    
    #sidebar.active ul li .collapse .card ul li {
    text-align: center; }
    #sidebar.active ul li .collapse .card ul li:hover {
    background-color:  #edf6f6 ;
    }
    #sidebar.active ul li .collapse .card ul li a {
    min-width: 100%;
    }
    #sidebar.active ul li .collapse .card ul li a .submenu {
    color:  #5e9393 ;
    font-size: 17px; 
    text-align: center;
    }   
    #sidebar.active ul li .collapse .card ul li{
    color:  black ;
    }
    
    

</style>

<script>
    $( document ).ready(function() {
            var tipo = document.getElementById('inputUsuarioMenu').value;
        

        // ADMINISTRADOR
        if(tipo == "1")
        {
           document.getElementById('liCompras').style.display = "block";
           document.getElementById('liComercial').style.display = "block";
           document.getElementById('liVigilancia').style.display = "block";
           document.getElementById('liProduccion').style.display = "block";
           document.getElementById('liContab').style.display = "block";
           document.getElementById('liRH').style.display = "block";
           document.getElementById('liMto').style.display = "block";
           document.getElementById('liUsuarios').style.display = "block";
           document.getElementById('liManuales').style.display = "block";
           document.getElementById('liReportes').style.display = "block";
        }
        // GENERAL
        else if(tipo == "2")
        {
           document.getElementById('liCompras').style.display = "block";
           document.getElementById('liComercial').style.display = "none";
           document.getElementById('liVigilancia').style.display = "none";
           document.getElementById('liProduccion').style.display = "block";
           document.getElementById('liContab').style.display = "none";
           document.getElementById('liRH').style.display = "none";
           document.getElementById('liMto').style.display = "none";
           document.getElementById('liUsuarios').style.display = "none"; 
           document.getElementById('liManuales').style.display = "block"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
        // COMERCIAL
        else if(tipo == "3")
        {
           document.getElementById('liCompras').style.display = "none";
           document.getElementById('liComercial').style.display = "block";
           document.getElementById('liVigilancia').style.display = "none";
           document.getElementById('liProduccion').style.display = "none";
           document.getElementById('liContab').style.display = "none";
           document.getElementById('liRH').style.display = "none";
           document.getElementById('liMto').style.display = "none";
           document.getElementById('liUsuarios').style.display = "none"; 
           document.getElementById('liManuales').style.display = "block"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
        // COMPRAS
        else if(tipo == "4")
        {
           document.getElementById('liCompras').style.display = "block";
           document.getElementById('liComercial').style.display = "none";
           document.getElementById('liVigilancia').style.display = "none";
           document.getElementById('liProduccion').style.display = "none";
           document.getElementById('liContab').style.display = "none";
           document.getElementById('liRH').style.display = "none";
           document.getElementById('liMto').style.display = "none";
           document.getElementById('liUsuarios').style.display = "none"; 
           document.getElementById('liManuales').style.display = "block"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
        // DIRECCION
        else if(tipo == "5")
        {
           document.getElementById('liCompras').style.display = "block";
           document.getElementById('liComercial').style.display = "block";
           document.getElementById('liVigilancia').style.display = "block";
           document.getElementById('liProduccion').style.display = "block";
           document.getElementById('liContab').style.display = "block";
           document.getElementById('liRH').style.display = "block";
           document.getElementById('liMto').style.display = "block";
           document.getElementById('liUsuarios').style.display = "block"; 
           document.getElementById('liManuales').style.display = "block"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
        // MANTENIMIENTO
        else if(tipo == "6")
        {
           document.getElementById('liCompras').style.display = "none";
           document.getElementById('liComercial').style.display = "none";
           document.getElementById('liVigilancia').style.display = "none";
           document.getElementById('liProduccion').style.display = "none";
           document.getElementById('liContab').style.display = "none";
           document.getElementById('liRH').style.display = "none";
           document.getElementById('liMto').style.display = "block";
           document.getElementById('liUsuarios').style.display = "none"; 
           document.getElementById('liManuales').style.display = "block"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
        // AUDITORIA
        else if(tipo == "7")
        {
           document.getElementById('liCompras').style.display = "none";
           document.getElementById('liComercial').style.display = "none";
           document.getElementById('liVigilancia').style.display = "none";
           document.getElementById('liProduccion').style.display = "none";
           document.getElementById('liContab').style.display = "none";
           document.getElementById('liRH').style.display = "none";
           document.getElementById('liMto').style.display = "none";
           document.getElementById('liUsuarios').style.display = "none"; 
           document.getElementById('liManuales').style.display = "block"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
        // PRODUCCION
        else if(tipo == "8")
        {
           document.getElementById('liCompras').style.display = "none";
           document.getElementById('liComercial').style.display = "none";
           document.getElementById('liVigilancia').style.display = "none";
           document.getElementById('liProduccion').style.display = "block";
           document.getElementById('liContab').style.display = "none";
           document.getElementById('liRH').style.display = "none";
           document.getElementById('liMto').style.display = "none";
           document.getElementById('liUsuarios').style.display = "none"; 
           document.getElementById('liManuales').style.display = "block"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
        // SEGURIDAD
        else if(tipo == "9")
        {
           document.getElementById('liCompras').style.display = "none";
           document.getElementById('liComercial').style.display = "none";
           document.getElementById('liVigilancia').style.display = "block";
           document.getElementById('liProduccion').style.display = "none";
           document.getElementById('liContab').style.display = "none";
           document.getElementById('liRH').style.display = "none";
           document.getElementById('liMto').style.display = "none";
           document.getElementById('liUsuarios').style.display = "none"; 
           document.getElementById('liManuales').style.display = "none"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
        // CAPACITACION
        else if(tipo == "10")
        {
           document.getElementById('liCompras').style.display = "none";
           document.getElementById('liComercial').style.display = "none";
           document.getElementById('liVigilancia').style.display = "none";
           document.getElementById('liProduccion').style.display = "none";
           document.getElementById('liContab').style.display = "none";
           document.getElementById('liRH').style.display = "block";
           document.getElementById('liMto').style.display = "none";
           document.getElementById('liUsuarios').style.display = "none"; 
           document.getElementById('liManuales').style.display = "block"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
        // FINANZAS
        else if(tipo == "11")
        {
           document.getElementById('liCompras').style.display = "none";
           document.getElementById('liComercial').style.display = "none";
           document.getElementById('liVigilancia').style.display = "none";
           document.getElementById('liProduccion').style.display = "none";
           document.getElementById('liContab').style.display = "block";
           document.getElementById('liRH').style.display = "none";
           document.getElementById('liMto').style.display = "none";
           document.getElementById('liUsuarios').style.display = "none"; 
           document.getElementById('liManuales').style.display = "block"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
        // CALIDAD
        else if(tipo == "12")
        {
           document.getElementById('liCompras').style.display = "none";
           document.getElementById('liComercial').style.display = "none";
           document.getElementById('liVigilancia').style.display = "none";
           document.getElementById('liProduccion').style.display = "none";
           document.getElementById('liContab').style.display = "none";
           document.getElementById('liRH').style.display = "none";
           document.getElementById('liMto').style.display = "none";
           document.getElementById('liUsuarios').style.display = "none"; 
           document.getElementById('liManuales').style.display = "block"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
        // CLIENTES
        else if(tipo == "13")
        {
           document.getElementById('liCompras').style.display = "none";
           document.getElementById('liComercial').style.display = "block";
           document.getElementById('liVigilancia').style.display = "none";
           document.getElementById('liProduccion').style.display = "none";
           document.getElementById('liContab').style.display = "none";
           document.getElementById('liRH').style.display = "none";
           document.getElementById('liMto').style.display = "none";
           document.getElementById('liUsuarios').style.display = "none"; 
           document.getElementById('liManuales').style.display = "block"; 
           document.getElementById('liReportes').style.display = "block"; 
        }
    });
                        
</script>
