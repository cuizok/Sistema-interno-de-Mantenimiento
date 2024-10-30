<?php                
require 'database_connection.php'; 
include_once('tcpdf_6_2_13/tcpdf/tcpdf.php');

$MST_ID = $_GET['idtickets']; // Obtener el ID de tickets de la URL

$query = "SELECT idtickets, problema, quien_solicita, fecha, ingeniero_asignado, prioridades, folio_equipo, estatus  FROM tickets WHERE idtickets = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $MST_ID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    $idtickets = $data['idtickets'];
    $problema = $data['problema'];
    $quien_solicita = $data['quien_solicita'];
    $fecha = $data['fecha'];
    $ingeniero_asignado = $data['ingeniero_asignado'];
    $prioridades = $data['prioridades'];
    $folio_equipo = $data['folio_equipo'];
    $estatus = $data['estatus'];

    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Autor');
    $pdf->SetTitle('Detalles del Ticket');
    $pdf->SetSubject('Detalles del Ticket');
    $pdf->SetKeywords('TCPDF, PDF, ticket');

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

    $pdf->writeHTML('<style>' . $style . '</style>', true, false, true, false, '');

    $content = '';
    
    $content .= '
        <table cellspacing="0" cellpadding="1" border="1">
            <tr>
                <td rowspan="3" width="80"><img src="./img/sgc.jpg" width="50" height="50" align="center"></td>
                <td width="300" align="center">ORDEN DE SERVICIO</td>
                <td width="70">Código:</td>
                <td width="60" align="center">F-MT-003</td>
            </tr>
            <tr>
                <td align="center"></td>
                <td>Revisión:</td>
                <td align="center">2</td>
            </tr>
            <tr>
                <td align="center"></td>
                <td>Folio:</td>
                <td align="center">'. $idtickets .'</td>
            </tr>
        </table>
        <br>';
    
    $content .= '<br>';
    
    $content .= '
        <table class="data-table" cellspacing="0" cellpadding="1" border="1" style="border-collapse: collapse; width: 100%;">
            <tr class="highlight">
                <th class="title" style="background-color: #D5CECC;">Problema</th>
                <th class="title" style="background-color: #D5CECC;">Estatus</th>
            </tr>
            <tr class="highlight">
                <td>' . $problema . '</td>
                <td>' . $estatus . '</td>
            </tr>
        </table>
        <br>';

    // Agregar un espacio en blanco
    $content .= '<br>';
    
    // Agregar la fecha
    $content .= '
        <strong>Fecha:</strong> ' . $fecha . '
        <br><br>';
    
    // Agregar la tercera tabla: Firmas
    $content .= '
        <table class="header-table">
            <tr>
                <td class="title">Firma de quien solicita:</td>
                <td class="title">Firma del Ingeniero Asignado:</td>
                <td class="title">Firma de conformidad:</td>
            </tr>
            <tr>
                <td class="title">______________________<br>' . $quien_solicita . '</td>
                <td class="title">______________________<br>' . $ingeniero_asignado . '</td>
                <td class="title">______________________<br>' . $quien_solicita . '</td>

            </tr>
        </table>
    ';

    $pdf->writeHTML($content, true, false, true, false, '');

    // Salida del PDF
    ob_end_clean();
    $pdf->Output('Ticket_'.$MST_ID.'.pdf', 'I'); // I para ver en el navegador, D para descargar
} else {
    echo 'No se encontraron registros para generar el PDF.';
}

// Cerrar la conexión
$stmt->close();
$con->close();
?>
