<?php
	require_once "main.php";

	/*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['idordenes']);


    /*== Verificando categoria ==*/
	$check_categoria=conexion();
	$check_categoria=$check_categoria->query("SELECT * FROM piochas WHERE idpiochas='$id'");

    if($check_categoria->rowCount()<=0){
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La categoría no existe en el sistema
            </div>
        ';
        exit();
    }else{
    	$datos=$check_categoria->fetch();
    }
    $check_categoria=null;

    /*== Almacenando datos ==*/
    $nombre=limpiar_cadena($_POST['departamento']);
    $ubicacion=limpiar_cadena($_POST['estatus']);
    $inspector=limpiar_cadena($_POST['inspector']);
    $observaciones=limpiar_cadena($_POST['observaciones']);





    /*== Verificando campos obligatorios ==*/
    if($nombre==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando integridad de los datos ==*/
    if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}",$nombre)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if($ubicacion!=""){
    	if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}",$ubicacion)){
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                La UBICACION no coincide con el formato solicitado
	            </div>
	        ';
	        exit();
	    }
    }

if($inspector!=""){
    	if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}",$inspector)){
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                La UBICACION no coincide con el formato solicitado
	            </div>
	        ';
	        exit();
	    }
    }

/*== Verificando nombre ==*/
   






    /*== Verificando departamento ==*/
   
    if($nombre!=""){
    	if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}",$ubicacion)){
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                La UBICACION no coincide con el formato solicitado
	            </div>
	        ';
	        exit();
	    }
    }


 /*== Verificando Inspector ==*/
   
    if($inspector!=""){
    	if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}",$inspector)){
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                La UBICACION no coincide con el formato solicitado
	            </div>
	        ';
	        exit();
	    }
    }



    /*== Actualizar datos ==*/
    $actualizar_categoria=conexion();
    $actualizar_categoria=$actualizar_categoria->prepare("UPDATE piochas SET departamento=:nombre,estatus=:ubicacion,inspector=:inspector,observaciones=:observaciones WHERE idpiochas=:id");

    $marcadores=[
        ":nombre"=>$nombre,
        ":ubicacion"=>$ubicacion,
        ":inspector"=>$inspector,
        ":observaciones"=>$observaciones,
        
        ":id"=>$id
    ];

    if($actualizar_categoria->execute($marcadores)){
        echo '
            <div class="notification is-info is-light">
                <strong>¡ORDEN ACTUALIZADA!</strong><br>
                La orden se actualizo con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo actualizar la categoría, por favor intente nuevamente
            </div>
        ';
    }
    $actualizar_categoria=null;