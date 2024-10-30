
<nav id="sidebar" class="active shadow">

<div class="transition-all" style="padding: 20% 10%;">
    <div class="box">
        <img src="#" width="100%;">
    </div>
</div>
   
<ul class="list-unstyled components mb-5">
<li>
<input style="display:none;" class="form-control" type="text" id="inputUsuarioMenu" value="" placeholder="">
<a title="Escritorio" style="cursor:pointer;" href="index.php?vista=calidad"><span class="fa fa-home" ></span> Escritorio</a>
</li>
<hr style="margin-left:20px;margin-right:20px;">
<!-- COMPRAS -->

    

<!-- COMERCIAL -->

 
<!-- VIGILANCIA -->


<!-- CALIDAD -->
<li id="" >
<a href="index.php?vista=menu_calidad2" title="Calidad" id="toggle-btn-usu" style="cursor:pointer;"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 23px; height: 40px;"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><style>svg{fill:#4d525c}</style>
<path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM96 64H288c17.7 0 32 14.3 32 32v32c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V96c0-17.7 14.3-32 32-32zm32 160a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zM96 352a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM64 416c0-17.7 14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zM192 256a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zm64-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zM288 448a32 32 0 1 1 0-64 32 32 0 1 1 0 64z"/></svg></span> Calidad</a>
</li>  
    
<!-- RECURSOS HUMANOS -->

  
<!-- REPORTES -->
<li id="" style="display:none;">
<a href="#" title="Reportes" id="toggle-btn-usu" style="cursor:pointer;"><span class="fa fa-file-excel-o"></span> Reportes</a>
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
