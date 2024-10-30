<?php
include('sidebar.php');
?>
<style> .nav-item.dropdown:hover .dropdown-menu {
    display: block;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="entradasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Entradas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="entradasDropdown">
                        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="#">Alta de Entradas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="#">Baja de Entradas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="#">Consulta de Entradas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="#">Material Recuperado de Producción</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="salidasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Salidas a Producción
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="salidasDropdown">
                       <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="salidasPorListaDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Salidas por Lista
                    </a>
                <li class="nav-item">
                <a class="nav-link dropdown-item" href="#">Alta de Partes a Proceso</a>
                </li> 
                         <li class="nav-item">
                <a class="nav-link dropdown-item" href="#">Baja de Partes a Proceso</a>
                </li>  
                         <li class="nav-item">
                <a class="nav-link dropdown-item" href="#">Consulta de Partes a Proceso</a>
                </li>  

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="salidasPorOrdenDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Salidas por Orden
            </a>
          <li class="nav-item">
                <a class="nav-link dropdown-item" href="#">Alta de salida por orden</a>
                </li> 
                         <li class="nav-item">
                <a class="nav-link dropdown-item" href="#">Baja de salida por orden</a>
                </li>  
                         <li class="nav-item">
                <a class="nav-link dropdown-item" href="#">Consulta de salida por orden</a>
                </li>  
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="salidasExtraProduccionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Salidas Extra a Producción
            </a>
  <li class="nav-item">
                <a class="nav-link dropdown-item" href="#">Alta de Partes a Proceso</a>
                </li> 
                         <li class="nav-item">
                <a class="nav-link dropdown-item" href="#">Baja de Partes a Proceso</a>
                </li>  
                         <li class="nav-item">
                <a class="nav-link dropdown-item" href="#">Consulta Partes a Proceso</a>
                </li>              
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="salidasVariasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Salidas Varias
            </a>
        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="#">Alta de Partes a Produccion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="#">Baja de Partes a Producción</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="#">Consulta Partes a Producción</a>
                        </li>
                        
    </ul>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="traspasosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Traspasos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="traspasosDropdown">
                <li class="nav-item">
                            <a class="nav-link dropdown-item" href="#">Alta de Traspaso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="#">Baja de Traspaso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="#">Consulta de Traspaso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="#">Multisucursal</a>
                        </li> 
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="salidasValesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Vales de Salida
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="salidasValesDropdown">  
                    </ul>
                </li>


