


<?php                
require 'database_connection.php'; 
include_once('tcpdf_6_2_13/tcpdf/tcpdf.php');



$MST_ID=$_GET['idordenes'];

$inv_mst_query = "  SELECT * FROM ORDENES where idordenes ='".$MST_ID."' ";             
$inv_mst_results = mysqli_query($con,$inv_mst_query);   
$count = mysqli_num_rows($inv_mst_results);  
if($count>0) 
{
	$inv_mst_data_row = mysqli_fetch_array($inv_mst_results, MYSQLI_ASSOC);

	//----- Code for generate pdf
	$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);  
	//$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
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
	//$pdf->AddPage('P','A5'); //when you require custome page size 
	
	$content = ''; 

	$content .= '
	<style type="text/css">
	body{
	font-size:12px;
	line-height:20px;
	font-family:"Helvetica Neue", "Helvetica", Helvetica, verdana, sans-serif;
	color:#000;
	}
	</style> 
    
    
    <table cellspacing="0" cellpadding="1" border="1" >
    <tr>
        <td  rowspan="3" border="0" width="80" ><img src="./img/sgc.jpg"  width="50" height="50" align="center"></td>
        <td  width="300"  align="center">ORDEN DE SERVICIO DE MANTENIMIENTO</td>
        <td width="70">Código:</td>
        <td width="60" align="center">F-MT-003</td>
        
        
        
        
    </tr>
    <tr>
    <td   align="center"></td>
        <td>Revisión:</td>
        <td align="center">2</td>
    </tr>
    
    
    
    
    <tr>
    
    
    <td  align="center"></td>
    
       <td>Página:</td>
       <td align="center">1 de 1</td>
       
    </tr>
    
    

</table>
    
    
    
    
    
    
	<table cellpadding="0" cellspacing="0" style="border:1px solid #000000 ;width:100%;" cellpadding="1">
	<table style="width:100%;" >
	<tr><td colspan="2">&nbsp;</td></tr>
    
    
    <table cellspacing="0" cellpadding="1" border="0" align="center">
    <tr>
        <td width="100" colspan="2"></td>
         <td width="100" colspan="2"></td>
          <td width="70" colspan="2"></td>
           <td width="70" colspan="2"></td>
            <td width="70"></td>
              <td width="60" align="center"></td>
        
    </tr>
    
    
    
    
    
    <tr>
    
    <td colspan="2" align="center">Fecha:</td>
        <td width="120" align="center">'.$inv_mst_data_row['created_at'].'<hr/></td>
        <td width="70" align="center">&nbsp;</td>
        <td   width="70" align="center">Semana:</td>
        <td width="70" align="center">'.$inv_mst_data_row['semana'].'<hr/></td>
        <td width="70" align="center"></td>
        
    </tr>
    
    
    
    
    <tr>
    <td colspan="2" align="center"></td>
    
       <td>&nbsp;</td>
       <td align="center">&nbsp;</td>
       <td align="center">&nbsp;</td>
       <td align="center">&nbsp;</td>
       
    </tr>
    
    
     <tr>
    
    <td colspan="2" align="center">Maquina:</td>
        <td width="120" align="center">'.$inv_mst_data_row['maquina'].'<hr/></td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">Código:</td>
        <td width="70" align="center">'.$inv_mst_data_row['codigo'].'<hr/></td>
        <td width="70" align="center"></td>
        
    </tr>
    
    
    
     <tr>
    
    <td colspan="2" align="center">&nbsp;</td>
        <td width="120" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        
    </tr>
    
     <tr>
    
    <td colspan="2" align="center">Departamento:</td>
        <td width="120" align="center">'.$inv_mst_data_row['departamento'].'<hr/></td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">Orden:</td>
        <td width="70" align="center">'.$inv_mst_data_row['idordenes'].'<hr/></td>
        <td width="70" align="center"></td>
        
    </tr>
    
     <tr>
    
    <td colspan="2" align="center">&nbsp;</td>
        <td width="120" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center"></td>
        
    </tr>
    
    
    <tr>
    
    <td colspan="2" align="center">Falla:</td>
        <td width="120" align="center">'.$inv_mst_data_row['falla'].'<hr/></td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">Usuario:</td>
        <td width="70" align="center">'.$inv_mst_data_row['usuario'].'<hr/></td>
        <td width="70" align="center"></td>
        
    </tr>



  <tr>
    
    <td colspan="2" align="center">&nbsp;</td>
        <td width="100" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center"></td>
        
    </tr>
    
    
    
    <tr>
    
    <td colspan="2" align="center">Mecanico:</td>
        <td width="150" align="center" >'.$inv_mst_data_row['mecanico'].'<hr/></td>
        
        
        
        
        
    </tr>
    
     <tr>
    
    <td colspan="2" align="center">Refacciones:</td>
        <td width="400" align="center">'.$inv_mst_data_row['refacciones'].'<hr/></td>
        
        
       
        
    </tr>
    
    
    <tr>
    
    <td colspan="2" align="center">&nbsp;</td>
        <td width="100" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center"></td>
        
    </tr>
    
    
    <tr>
    
    <td colspan="2" align="center">Observaciones:</td>
        <td width="400" align="center">'.$inv_mst_data_row['observaciones'].'<hr/></td>
    
    </tr>
    
    
    <tr>
    
    <td colspan="2" align="center">&nbsp;</td>
        <td width="100" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center">&nbsp;</td>
        <td width="70" align="center"></td>
        
    </tr>
    
    
    <tr>
    
    <td colspan="2" align="center">Firma de termino</td>
        <td width="400" align="center">'.$inv_mst_data_row['usuario'].'<hr/></td>
    
    </tr>
    
    
    
    
    
    
    
</table>
    
    
   
    
	
    <tr>
   
    
    
    
    <br />
    
    <br />
    
    
	
    
    
    
	
    
	
    
	<tr class="heading" style="background:#eee;border-bottom:1px solid #ddd;font-weight:bold;">
		
		
	</tr>';
		$total=0;
		$inv_det_query = "SELECT T2.PRODUCT_NAME, T2.AMOUNT FROM INVOICE_DET T2 WHERE T2.MST_ID='".$MST_ID."' ";
		$inv_det_results = mysqli_query($con,$inv_det_query);    
		while($inv_det_data_row = mysqli_fetch_array($inv_det_results, MYSQLI_ASSOC))
		{	
		$content .= '
		  <tr class="itemrows">
			  <td>
				  <b>'.$inv_det_data_row['PRODUCT_NAME'].'</b>
				  <br>
				  <i>Write any remarks</i>
			  </td>
			  <td align="right"><b>
				  '.$inv_det_data_row['AMOUNT'].'
			  </b></td>
		  </tr>';
		$total=$total+$inv_det_data_row['AMOUNT'];
		}
		$content .= '</tr>
		
		
	
	<tr><td colspan="2">&nbsp;</td></tr>
	
	<tr><td colspan="2">&nbsp;</td></tr>
	</table>
</table>'; 
    
    
    
   


    
    
    
    
$pdf->writeHTML($content);

$file_location = "/home/fbi1glfa0j7p/public_html/examples/generate_pdf/uploads/"; //add your full path of your server
//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

$datetime=date('dmY_hms');
$file_name = "INV_".$datetime.".pdf";
ob_end_clean();

if($_GET['ACTION']=='VIEW') 
{
	$pdf->Output($file_name, 'I'); // I means Inline view
} 
else if($_GET['ACTION']=='DOWNLOAD')
{
	$pdf->Output($file_name, 'D'); // D means download
}
else if($_GET['ACTION']=='UPLOAD')
{
$pdf->Output($file_location.$file_name, 'F'); // F means upload PDF file on some folder
echo "Upload successfully!!";
}

//----- End Code for generate pdf
	
}
else
{
	echo 'Record not found for PDF.';
}

?>