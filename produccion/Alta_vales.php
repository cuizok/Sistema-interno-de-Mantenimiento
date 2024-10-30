<?php
include('sidebar.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #D1D1D1; /* Color de fondo */
            padding-top: 20px;
        }
        
        .container {
            background-color: #ffffff; /* Color del contenedor */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra */
        }

        /* Estilos para el formulario */
        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        /* Estilos para los botones */
        .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Alta de vales de Salida</h2>
        <form id="formulario" action="./phpiedra/guardar_vales.php" method="POST">
            <!-- Datos Generales -->
            <div class="row">
                
                 <div style="position: relative;">
    <div class="form-group" style="position: absolute; top: -70px; right: 0;">
        <label>Fecha:</label>
        <input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly style="max-width: 250px;">
    </div>
</div>
                <!-- Columna 1 -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Sucursal</label>
                        <input type="text" class="form-control" name="quien_solicita" value="CASA MATRIZ" readonly required>
                    </div>
                </div>
                
          




                <!-- Columna 2 -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Almacén</label>
                        <select class="form-control" name="folio" id="folio" required>
                            <option value="valor1" selected>Almacén Principal</option>
                            <option value="valor2">Almacén Mat. Proceso</option>
                            <option value="valor3">Almacén Producto Terminado</option>
                            <option value="valor4">Almacén de obsoletos</option>
                            <option value="valor5">Intendencia</option>
                            <option value="valor6">Seguridad e Higiene</option>
                            <option value="valor7">Mantenimiento</option>
                            <option value="valor8">Equipo de Computo</option>
                            <option value="valor9">Almacen de apartados</option>

                            <!-- Otras opciones -->
                        </select>
                    </div>
                </div>
                <!-- Columna 3 -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Grupo Docto</label>
                        <select class="form-control" name="vales" id="vales" required>
                            <option value="vale1" selected>Vales de salida</option>
                            <!-- Otras opciones -->
                        </select>
                    </div>
                </div>
                <!-- Columna 4 -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tipo Docto</label>
                        <select class="form-control" name="vales2" id="vales2" required>
                            <option value="vale2" selected>VALE SIN CARGO</option>
                            <!-- Otras opciones -->
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Detalle -->
            <div class="row">
                <!-- Columna 1 -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Regreso</label>
                        <div>
                            <input type="radio" id="si" name="regreso" value="si" required checked/>
                            <label for="si">Si</label>
                            <input type="radio" id="no" name="regreso" value="no" required />
                            <label for="no">No</label>
                        </div>
                    </div>
                </div>
                <!-- Columna 2 -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="fecha_regreso">Fecha de regreso</label>
                        <input type="date" class="form-control" id="fecha_regreso" name="fecha_regreso" required>
                    </div>
                </div>
                <!-- Columna 3 -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="entregado">Entregado a:</label>
                        <input type="text" class="form-control" id="entregado" name="entregado" required>
                    </div>
                </div>
                <!-- Columna 4 -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Concepto</label>
                        <select class="form-control" name="concepto" id="concepto" required>
                            <option value="calces" selected>Calces</option>
                            <option value="venta_prototipos">Venta/Prototipos</option>
                            <option value="despegado">Despegado</option>
                            <option value="despegado_viali">Despegado viali</option>
                            <option value="maquina">Maquina</option>
                            <option value="tejido">Tejido</option>
                            <option value="venta_calzado">Venta de calzado al personal</option>
                            <option value="pruebas">Pruebas de plomo</option>
                            <option value="tejido_opanka">Tejido opanka</option>
                            <option value="tejido_vista">Tejido de vista</option>
                            <option value="devolucion">Devolución</option>
                            <option value="maquila">Maquila</option>
                            <option value="venta">Venta</option>
                            <option value="prestamo">Prestamo</option>
                            <option value="otro">Otro</option>

                            <!-- Otras opciones -->
                        </select>
                    </div>
                </div>
                
                 <div class="mb-3">
                    <div class="form-group">
                        <label>Generado por:</label>
                       <input type="text" class="form-control" name="generado" value="DIEGO DANIEL MORALES FONSECA" readonly required style="max-width: 200px;">

                    </div>
                </div>
                
                <div class="col-md-3">

                   <table>
        <tr>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Unidad</th>
            <th>Costo unitario</th>
            <th>Importe</th>
        </tr>
        <tr>
            <td><input type="text" name="input1" placeholder=""></td>
            <td><input type="number" name="input2" placeholder="0"></td>
            <td><input type="text" name="input3" placeholder=""></td>
            <td><input type="text" name="input3" placeholder=""></td>
            <td><input type="text" name="input3" placeholder=""></td>
            
        </tr>
       
    </table>

                </div>   
            </div>
            
            <!-- Comentarios -->
            <div class="form-group">
                <label for="comentarios">Comentarios</label>
                <textarea class="form-control" name="comentarios" id="comentarios" rows="3" cols="90"></textarea>
            </div>

            <!-- Botón de guardar -->
            <div class="text-center">
                <button type="button" class="btn btn-secondary" onclick="guardarFormulario()">Generar alta</button>
            </div>
        </form>
    </div>

    <script>
        function guardarFormulario() {
            var formulario = document.getElementById('formulario');
            formulario.action = './phpiedra/guardar_vales.php';
            formulario.submit();
        }
    </script>
</body>
</html>
