<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos

error_reporting(0);
require 'conexion.php';


// Validamos que el formulario y que el boton registro haya sido presionado
if(isset($_POST['registro'])) {

// Obtener los valores enviados por el formulario
    
    
$codigo = $_POST['codigo'];
$usuario = $_POST['usuario'];
    $nombre_equipo = $_POST['nombre_equipo'];
$procesador = $_POST['procesador'];   
$memoria_ram = $_POST['memoria_ram'];
$marca = $_POST['marca'];
$tarjeta_red = $_POST['tarjeta_red'];
    $capacidad_disco = $_POST['capacidad_disco'];
    $tarjeta_sonido = $_POST['tarjeta_sonido'];
$monitor = $_POST['monitor'];
$wifi = $_POST['wifi'];
$version_windows = $_POST['version_windows'];
$version_office = $_POST['version_office'];
$antivirus = $_POST['antivirus'];
    $otros = $_POST['otros'];
    $ubicacion = $_POST['ubicacion'];
    $estatus = $_POST['estatus'];
    $mac = $_POST['mac'];
    $observaciones = $_POST['observaciones'];

    
    

// Insertamos los datos en la base de datos
$sql = "INSERT INTO inventario_ti (codigo, usuario, nombre_equipo,  procesador, memoria_ram, marca, tarjeta_red, capacidad_disco, tarjeta_sonido, monitor, wifi, version_windows, version_office, antivirus, otros, ubicacion, estatus, mac, observaciones) VALUES ('$codigo', '$usuario', '$nombre_equipo', '$capacidad_disco', '$tarjeta_sonido', '$procesador', '$memoria_ram', '$marca', '$tarjeta_red', '$monitor', '$wifi', '$version_windows', '$version_office', '$antivirus', '$otros', '$ubicacion', '$estatus', '$mac', '$observaciones')";
    
$resultado = mysqli_query($conexion,$sql);
	if($resultado) {
		// Iserción correcta
		echo "¡Se insertaron los datos correctamente!";
	} else {
		// Iserción fallida
		echo "¡No se puede insertar la informacion!"."<br>";
		echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
}
?>


<?php
 index.php 
 header("Location: http://192.168.10.116/app/mantenimiento/index.php?vista=inventario_ti");
 exit();
?>
