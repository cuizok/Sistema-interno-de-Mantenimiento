<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    
     
    
    <!-- Botón para mostrar la barra lateral -->
    <button class="btn" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i> Menu
    </button>
    
    <div>
    
     
    </div>

    <!-- Barra lateral -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu Opcional </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Analisis directivos
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="dropdown">
                        <a class="dropdown-item dropdown-toggle" href="#" role="button" id="submenuDireccionGeneral" data-bs-toggle="dropdown" aria-expanded="false">Direccion General</a>
                        <ul class="dropdown-menu" aria-labelledby="submenuDireccionGeneral">
                            <li><a class="dropdown-item" href="#">Opción 1</a></li>
                            <li><a class="dropdown-item" href="#">Opción 2</a></li>
                            <li><a class="dropdown-item" href="#">Opción 3</a></li>
                        </ul>
                    </li>
                    <li><a class="dropdown-item" href="#">Gerencia</a></li>
                </ul>
            </div>
             <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Finanzas
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Contabilidad</a></li>
                    <li><a class="dropdown-item" href="#">Activos Fijos</a></li>
                    <li><a class="dropdown-item" href="#">Presupuesto</a></li>
                    <li><a class="dropdown-item" href="#">Tesoreria</a></li>
                </ul>
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Operación
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Ventas</a></li>
                    <li><a class="dropdown-item" href="#">Compras</a></li>
                    <li><a class="dropdown-item" href="#">Pagos</a></li>
                </ul>
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Almacenes
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Catalogos</a></li>
                    <li><a class="dropdown-item" href="#">Consulta en Pantalla</a></li>
                    <li><a class="dropdown-item" href="entradas_salidas.php">Entradas y Salidas</a></li>
                    <li><a class="dropdown-item" href="#">Inventario Fisico</a></li>
                    <li><a class="dropdown-item" href="#">Planeación de Demanda</a></li>
                    <li><a class="dropdown-item" href="#">Reportes</a></li>
                    <li><a class="dropdown-item" href="#">Consultas</a></li>
                </ul>
            </div>
             <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Desarrollo Comercial
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Direccion Comercial</a></li>
                    <li><a class="dropdown-item" href="#">Vendedores</a></li>
                    <li><a class="dropdown-item" href="#">Desarrollo de Proveedores</a></li>
                    <li><a class="dropdown-item" href="#">CRM</a></li>
                    <li><a class="dropdown-item" href="#">Servicio a Clientes</a></li>                    
                </ul>
            </div>
            
             <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Recursos Humanos
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Organización</a></li>
                    <li><a class="dropdown-item" href="#">Empleados</a></li>
                    <li><a class="dropdown-item" href="#">Nomina</a></li>
                    <li><a class="dropdown-item" href="#">Control de Currículos</a></li>
                    <li><a class="dropdown-item" href="#">Aspirantes</a></li>                    
                </ul>
            </div>
             <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Produccion
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Catálogos</a></li>
                    <li><a class="dropdown-item" href="#">Planeación y Control de la Producción</a></li>
                    <li><a class="dropdown-item" href="#">Planeación</a></li>
                    <li><a class="dropdown-item" href="#">Control de Producción</a></li>
                    <li><a class="dropdown-item" href="#">Consultas</a></li>                    
                    <li><a class="dropdown-item" href="#">Reportes</a></li>                    
                    <li><a class="dropdown-item" href="#">Conversión de Partes</a></li>                    
                    <li><a class="dropdown-item" href="#">Calidad</a></li>                    
                    <li><a class="dropdown-item" href="#">Mantenimiento</a></li>                    
                    <li><a class="dropdown-item" href="#">Vale de piochas</a></li>
                    <li><a class="dropdown-item" href="#">Desarrollo</a></li>                    
                </ul>
            </div>
              <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Vigilancia
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Horarios de vigilancia</a></li>
                    <li><a class="dropdown-item" href="#">Registro de recorrido</a></li>
                    <li><a class="dropdown-item" href="#">Consulta recorridos</a></li>
                    <li><a class="dropdown-item" href="#">Control de combustibles</a></li>
                </ul>
            </div>
             <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Sistemas
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Configuración</a></li>
                    <li><a class="dropdown-item" href="#">CFDI 3.3</a></li>
                    <li><a class="dropdown-item" href="#">Mantenimiento</a></li>
                    <li><a class="dropdown-item" href="#">Documentación</a></li>
                    <li><a class="dropdown-item" href="#">checar manual </a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            var offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasExample'));
            offcanvas.toggle();
        }
    </script>
</body>
</html>
