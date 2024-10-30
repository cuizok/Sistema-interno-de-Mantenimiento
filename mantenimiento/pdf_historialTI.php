<?php

require 'database_connection.php'; 
include_once('tcpdf_6_2_13/tcpdf/tcpdf.php');

// Obtener el ID de la orden de servicio
$MST_ID = $_GET['idmantenimientoTI'];

// Consulta SQL para obtener los datos de la orden de servicio
$inv_mst_query = "SELECT m.idmantenimientoTI, m.fecha_programacionTI, m.Fecha_actualizacionTI, m.comentariosTI, m.tipo_mantenimientoTI, 
       m.ventiladoresTI, m.discosTI, m.procesadoresTI, m.memoria_ramTI, m.tarjeta_redTI, m.observacionesTI,
       m.cpuTI, m.tecladoTI, m.mouseTI, m.monitorTI, m.equipo_adicionalTI, m.observaciones_2TI, m.eliminacion_sofwareTI,
       m.depuracion_swsoTI, m.actualizacion_antivirusTI, m.vacunar_equipoTI, m.realizadoTI, m.posible_causaTI, m.solucionTI,
       m.observables_programacionTI, m.semanaTI, i.usuario
       FROM mantenimiento_ti m
       JOIN inventario_ti i ON m.idinventarioTI = i.idinventario
       WHERE m.idmantenimientoTI = ?";

// Preparar la consulta
$stmt = mysqli_prepare($con, $inv_mst_query);
mysqli_stmt_bind_param($stmt, "i", $MST_ID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$count = mysqli_num_rows($result);

if ($count > 0) {
    $inv_mst_data_row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Crear una nueva instancia de TCPDF
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont('helvetica');
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->AddPage(); //default A4

    // Generar contenido del PDF
    $content = '';

    $content .= '
    <style type="text/css">
    body {
        font-size: 12px;
        line-height: 20px;
        font-family: "Helvetica Neue", "Helvetica", Helvetica, verdana, sans-serif;
        color: #000;
    }
    </style>
    
    <table cellspacing="0" cellpadding="1" border="1">
        <tr>
            <td rowspan="3" border="0" width="80"><img src="./img/sgc.jpg" width="50" height="50" align="center"></td>
            <td width="300" align="center">MANTENIMIENTO DE EQUIPO DE COMPUTO</td>
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
            <td>Página:</td>
            <td align="center">1 de 1</td>
        </tr>
        
        <tr>
        
        <td width="70" align="center">'.$inv_mst_data_row['tipo_mantenimientoTI'].'<hr/></td>
        </tr>
        
        ';
 
    
    // Agregar los datos de la orden de servicio a la tabla del PDF
    $content .= '
        <tr>
    <td colspan="4" align="center">Inspeccion visual (Funcionamiento)</td>
        </tr>
        <tr>
        <td> Usuario responsable:</td>        
        <td colspan="3">'.$inv_mst_data_row['usuario'].'</td>

        </tr>
        <tr>
            <td> Fecha de programación: </td>
            <td>'.$inv_mst_data_row['fecha_programacionTI'].'</td>
            <td>Semana:</td>
            <td>'.$inv_mst_data_row['semanaTI'].'</td>
        </tr>
          <tr>
            <td>Ventiladores:</td>
            <td colspan="3">'.$inv_mst_data_row['ventiladoresTI'].'</td>
        </tr>
        
        <tr>
        <td> Discos duros: </td>
            <td colspan="3">'.$inv_mst_data_row['discosTI'].'</td>

        </tr>
        
        
        <tr>
        
           <td> Procesadores: </td>
            <td colspan="3">'.$inv_mst_data_row['procesadoresTI'].'</td>
        
        </tr>
        
        
        <tr>
        
           <td> Memoria RAM: </td>
            <td colspan="3">'.$inv_mst_data_row['memoria_ramTI'].'</td>
        
        </tr>
        
        <tr>
        
           <td> Tarjeta de red: </td>
            <td colspan="3">'.$inv_mst_data_row['tarjeta_redTI'].'</td>
        
        </tr>
        
          <tr>
            <td>Comentarios:</td>
            <td colspan="3">'.$inv_mst_data_row['comentariosTI'].'</td>
        </tr>
        
         <tr>
    <td colspan="4" align="center">Limpieza del equipo</td>
        </tr>
        
         <tr>
            <td>CPU:</td>
            <td colspan="3">'.$inv_mst_data_row['cpuTI'].'</td>
        </tr>
        
         <tr>
            <td>Teclado:</td>
            <td colspan="3">'.$inv_mst_data_row['tecladoTI'].'</td>
        </tr>
        
           <tr>
            <td>Mouse:</td>
            <td colspan="3">'.$inv_mst_data_row['mouseTI'].'</td>
        </tr>  
        
        <tr>
            <td>Monitor:</td>
            <td colspan="3">'.$inv_mst_data_row['monitorTI'].'</td>
        </tr>   
        
        <tr>
            <td>Equipo adicional:</td>
            <td colspan="3">'.$inv_mst_data_row['equipo_adicionalTI'].'</td>
        </tr>
        
          <tr>
            <td>Observaciones:</td>
            <td colspan="3">'.$inv_mst_data_row['observaciones_2TI'].'</td>
        </tr>
        
        
         <tr>
    <td colspan="4" align="center">Depuración de Software y Actualización de Antivirus</td>
        </tr>
        
        <tr>
            <td>Eliminación de software:</td>
            <td colspan="3">'.$inv_mst_data_row['eliminacion_softwareTI'].'</td>
        </tr>
        
        <tr>
            <td>D:</td>
            <td colspan="3">'.$inv_mst_data_row['observaciones_2TI'].'</td>
        </tr>
        
        ';
        
        

    // Cerrar la tabla
    $content .= '</table>';

    // Agregar el contenido al PDF
    $pdf->writeHTML($content, true, false, true, false, '');

    // Generar el PDF
    ob_end_clean();
    $pdf->Output('orden_servicio_'.$MST_ID.'.pdf', 'I');

} else {
    // No se encontraron datos de la orden de servicio
    echo 'No se encontraron datos de la orden de servicio.';
}

// Cerrar la conexión a la base de datos
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
