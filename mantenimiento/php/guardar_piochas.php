<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos

error_reporting(0);
require 'conexion.php';


// Validamos que el formulario y que el boton registro haya sido presionado
if(isset($_POST['piochas'])) {

// Obtener los valores enviados por el formulario
    
    
$usuario = $_POST['usuario'];

$estilo = $_POST['estilo'];   
$color = $_POST['color'];
$punto = $_POST['punto'];
$cantidad = $_POST['cantidad'];
$departamento = $_POST['departamento'];
$tipo_defecto = $_POST['tipo_defecto'];
$fecha_solicitud = $_POST['fecha_solicitud'];
$fecha_entrega = $_POST['fecha_entrega'];
$inspector = $_POST['inspector'];
$estatus = $_POST['estatus'];
$po = $_POST['po'];      
$estatus = $_POST['estatus'];

    
    

// Insertamos los datos en la base de datos
$sql = "INSERT INTO piochas (estilo, color, punto, cantidad, departamento, tipo_defecto, fecha_solicitud, fecha_entrega, solicita, inspector, estatus, op ) VALUES ('$estilo', '$color', '$punto', '$cantidad', '$departamento', '$tipo_defecto', '$fecha_solicitud', '$fecha_entrega', '$usuario', '$inspector', '$estatus', '$po')";
    
$resultado = mysqli_query($conexion,$sql);
	if($resultado) {
		// Inserción correcta
		echo "¡Se insertaron los datos correctamente!";
	} else {
		// Inserción fallida
		echo "¡No se puede insertar la informacion!"."<br>";
		echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
}
?>


<?php
// index.php 
header("Location: http://192.168.10.116/app/mantenimiento/index.php?vista=piochas");
exit();
?>