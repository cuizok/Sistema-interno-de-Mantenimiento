<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT * FROM ordenes WHERE maquina LIKE '%$busqueda%' OR categoria_ubicacion LIKE '%$busqueda%' ORDER BY categoria_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(categoria_id) FROM ordenes WHERE categoria_nombre LIKE '%$busqueda%' OR categoria_ubicacion LIKE '%$busqueda%'";

	}else{

		$consulta_datos="SELECT * FROM ordenes ORDER BY idordenes DESC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(idordenes) FROM ordenes";
		
	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	$tabla.='
	<div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                	<th>Orden</th>
                    <th>Semana</th>
                    <th>Codigo</th>
                    <th>Maquina</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Falla</th>
                    <th>Departamento</th>
                    <th>Mecanico</th>
                    <th>Estatus</th>
                    
                    
                    
                    
                    
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
					<td>'.$rows['idordenes'].'</td>
                    <td>'.$rows['semana'].'</td>
                    <td>'.$rows['codigo'].'</td>
                    <td>'.$rows['maquina'].'</td>
                    <td>'.$rows['usuario'].'</td>
                    <td>'.$rows['fecha'].'</td>
                    <td>'.$rows['falla'].'</td>
                    <td>'.$rows['departamento'].'</td>
                    <td>'.$rows['mecanico'].'</td>
                    <td>'.$rows['estatus'].'</td>
                    
                    <td><a href="index.php?vista=ordenes_update&category_id_up='.$rows['idordenes'].'" class="button is-success is-rounded is-small">Actualizar</a></td>
                    
                    
                    
                    
                    
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