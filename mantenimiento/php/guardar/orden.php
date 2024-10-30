<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos
require 'conexion.php';

// Validamos que el formulario y que el boton registro haya sido presionado
if(isset($_POST['registro'])) {

// Obtener los valores enviados por el formulario
    $folio = $_POST['folio'];
    $semana = $_POST['semana'];
    $equipo= $_POST['equipo'];
    $fecha = $_POST['fecha'];
    $modelo = $_POST['modelo'];
    $codigo = $_POST['codigo'];
    $departamento = $_POST['departamento'];
    $acciones = $_POST['acciones'];
    $especificaciones = $_POST['especificaciones'];
    $falla = $_POST['falla'];
    
    
    
    
    

// Insertamos los datos en la base de datos
$sql = "INSERT INTO ordenes (idordenes, semana, equipo, fecha, modelo, codigo, departamento, acciones, especificaciones, falla ) VALUES (null, '$folio' '$semana', '$equipo', '$fecha', '$modelo', '$codigo', '$departamento', '$acciones', '$especificaciones', '$falla')";
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
