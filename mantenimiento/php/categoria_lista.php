


<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT * FROM ordenes WHERE maquina LIKE '%$busqueda%' OR categoria_ubicacion LIKE '%$busqueda%' ORDER BY categoria_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(categoria_id) FROM ordenes WHERE categoria_nombre LIKE '%$busqueda%' OR categoria_ubicacion LIKE '%$busqueda%'";

	}else{

		$consulta_datos="SELECT * FROM equipos ORDER BY fecha_mantenimiento DESC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(idmaquina) FROM equipos";
		
	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	$tabla.='
	
    
   
	<div class="row">
        
        
		<div class="col-lg-12" align="center">
			<br>
			<h5 align="center"></h5>
			<br>
                                    <div class="table-responsive">

			<table class="table table-striped">     
            
               <a href="index.php?vista=nuevo_equipo" class="btn btn-outline-light" id="nuevaOV" style="background-color:#4e84a9;color:white;float:right;margin-bottom:1rem;" role="button">
                        <i class="fa fa-plus-square"></i>
                        Nuevo equipo
                    </a>
            <thead>
                <tr class="has-text-centered">
                	<th>Codigo</th>
                    <th>Maquina</th>
                    <th>Marca</th>
                    <th class = "d-none d-md-table-cell">Serie</th>
                    <th class = "d-none d-md-table-cell">tipo</th>
                    <th class = "d-none d-md-table-cell">Departamento</th>
                    <th class = "d-none d-md-table-cell">Tipo</th>
                    <th class = "d-none d-md-table-cell">Estatus</th>
                    <th class = "d-none d-md-table-cell">Semana de programacion </th>
                    
                    
                    
                    
                    
                    
                    
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
	';

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			$tabla.='
				<tr class="has-text-centered" >
					<td>'.$rows['idmaquina'].'</td>
                    <td>'.$rows['nombre'].'</td>
                    <td>'.$rows['q'].'</td>
                    <td class = "d-none d-md-table-cell">'.$rows['nserie'].'</td>
                    <td class = "d-none d-md-table-cell">'.$rows['estatusE'].'</td>
                    <td class = "d-none d-md-table-cell">'.$rows['departamentoE'].'</td>
                    <td class = "d-none d-md-table-cell">'.$rows['m'].'</td>
                    <td class = "d-none d-md-table-cell">'.$rows['estatusE'].'</td>
                    <td class = "d-none d-md-table-cell">'.$rows['fecha_mantenimiento'].'</td>
                    
                    
                    
                    <td><a href="index.php?vista=actualizar_equipo&category_id_up='.$rows['idmaquina'].'" class="button btn-success"><i class="fa fa-pencil-square-o"></a></td>
                    
                    
                    
                    
                    
                    
                    
                    
                </tr>
            ';
            $contador++;
		}
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="5">
						<a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
							Haga clic acá para recargar el listado
						</a>
					</td>
				</tr>
			';
		}else{
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="5">
						No hay registros en el sistema
					</td>
				</tr>
			';
		}
	}


	$tabla.='</tbody></table></div>';

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando categorías <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}
    
