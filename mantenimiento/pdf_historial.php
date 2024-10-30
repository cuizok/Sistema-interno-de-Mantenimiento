<?php                
require 'database_connection.php'; 
include_once('tcpdf_6_2_13/tcpdf/tcpdf.php');

$MST_ID = $_GET['idmantenimiento']; // Obtener el ID de mantenimiento de la URL

// Obtener los datos del mantenimiento
$query = "SELECT idmantenimiento, fecha_programacion, comentarios, idmaquina, Fecha_actualizacion FROM pro_mantenimiento WHERE idmantenimiento = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $MST_ID);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron registros
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    // Datos de mantenimiento
    $idmantenimiento = $data['idmantenimiento'];
    $fecha_programacion = $data['fecha_programacion'];
    $fecha_actualizacion = $data['Fecha_actualizacion'];
    $idmaquina = $data['idmaquina'];
    $comentarios = $data['comentarios'];

    // Crear instancia de TCPDF
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Establecer información del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Autor');
    $pdf->SetTitle('Orden de Servicio de Mantenimiento');
    $pdf->SetSubject('Detalles de Mantenimiento');
    $pdf->SetKeywords('TCPDF, PDF, mantenimiento');

    $pdf->AddPage();

    $style = '
        body {
            font-size: 12px;
            line-height: 20px;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, verdana, sans-serif;
            color: #000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    ';

    // Establecer los estilos
    $pdf->writeHTML('<style>' . $style . '</style>', true, false, true, false, '');

    // Contenido del PDF
    $content = '';
    
    // Agregar estilo y estructura de tabla a cada campo
    $content .= '
        <style type="text/css">
            body {
                font-size: 12px;
                line-height: 20px;
                font-family: "Helvetica Neue", "Helvetica", Helvetica, verdana, sans-serif;
                color: #000;
            }
            .header-table {
                width: 100%;
            }
            .header-table td {
                border: none;
                padding: 4px;
            }
            .data-table {
                width: 100%;
                border-collapse: collapse;
            }
            .data-table th, .data-table td {
                border: 1px solid #000;
                padding: 6px;
            }
            .comentarios {
                font-weight: bold;
                vertical-align: top;
            }
        </style> 
        <table class="header-table">
            <tr>
                <td rowspan="2" width="80"><img src="./img/sgc.jpg" width="50" height="50" align="center"></td>
                <td align="center" colspan="3">ORDEN DE SERVICIO DE MANTENIMIENTO</td>
            </tr>
            <tr>
                <td width="70">Fecha:</td>
                <td>' . $fecha_programacion . '</td>
                <td width="70">Fecha actualización:</td>
                <td>' . $fecha_actualizacion . '</td>
            </tr>
        </table>
        <br>
        <table class="data-table">
            <tr>
                <th>Folio</th>
                <th>Fecha actualización</th>
                <th>Codigo Maquina</th>
                <th>Comentarios</th>
            </tr>
            <tr>
                <td>' . $idmantenimiento . '</td>
                <td>' . $fecha_actualizacion . '</td>
                <td>' . $idmaquina . '</td>
                <td class="comentarios">' . $comentarios . '</td>
            </tr>
        </table>
    ';

    // Escribir contenido del PDF
    $pdf->writeHTML($content, true, false, true, false, '');

    // Salida del PDF
    ob_end_clean();
    $pdf->Output('Mantenimiento_'.$MST_ID.'.pdf', 'I'); // I para ver en el navegador, D para descargar
} else {
    echo 'No se encontraron registros para generar el PDF.';
}

// Cerrar la conexión
$stmt->close();
$con->close();
?>
