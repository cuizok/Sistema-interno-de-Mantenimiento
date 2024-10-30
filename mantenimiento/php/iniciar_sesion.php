<?php
    // Almacenar datos
    $usuario = limpiar_cadena($_POST['login_usuario']);
    $clave = limpiar_cadena($_POST['login_clave']);

    if ($usuario == "" || $clave == "") {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }

    if (verificar_datos("[a-zA-Z0-9]{4,20}", $usuario)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                El USUARIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if (verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                La CLAVE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    $check_user = conexion();
    $check_user = $check_user->query("SELECT * FROM usuario WHERE usuario_usuario='$usuario'");
    if ($check_user->rowCount() == 1) {

        $check_user = $check_user->fetch();

        if ($check_user['usuario_usuario'] == $usuario && password_verify($clave, $check_user['usuario_clave'])) {

            $_SESSION['id'] = $check_user['usuario_id'];
            $_SESSION['nombre'] = $check_user['usuario_nombre'];
            $_SESSION['apellido'] = $check_user['usuario_apellido'];
            $_SESSION['usuario'] = $check_user['usuario_usuario'];
            
            // ADMINISTRADOR
            if ($check_user['id_dpto'] == 6) { 
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=home'; </script>";
                } else {
                    header("Location: index.php?vista=home");
                }
                
            }
            // CALIDAD 
            elseif ($check_user['id_dpto'] == 8) {
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=calidad'; </script>";
                } else {
                    header("Location: index.php?vista=calidad");
                }

            }
            // PRODUCCION

            elseif ($check_user['id_dpto'] == 1) {
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=produccion'; </script>";
                } else {
                    header("Location: index.php?vista=produccion");
                }
            }
            // DISEÑO 
            elseif ($check_user['id_dpto'] == 2) {
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=home'; </script>";
                } else {
                    header("Location: index.php?vista=home");
                }
            }
            // Ingenieria
            elseif ($check_user['id_dpto'] == 3) {
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=home'; </script>";
                } else {
                    header("Location: index.php?vista=home");
                }
            }
            // CONTABILIDAD
            elseif ($check_user['id_dpto'] == 4) {
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=home'; </script>";
                } else {
                    header("Location: index.php?vista=home");
                }
            }
            // DIRECCION
            elseif ($check_user['id_dpto'] == 5) {
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=home'; </script>";
                } else {
                    header("Location: index.php?vista=home");
                }
            }
            // ALMACEN
             elseif ($check_user['id_dpto'] == 7) {
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=home'; </script>";
                } else {
                    header("Location: index.php?vista=home");
                }
            }
            // MANTENIMIENTO 
             elseif ($check_user['id_dpto'] == 9) {
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=mantenimiento'; </script>";
                } else {
                    header("Location: index.php?vista=mantenimiento");
                }
            }
               // RECURSOS HUMANOS
             elseif ($check_user['id_dpto'] == 10) {
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=home'; </script>";
                } else {
                    header("Location: index.php?vista=home");
                }
            }
            
            

        }  else {
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrió un error inesperado!</strong><br>
                    Usuario o contraseña incorrectos
                </div>
            ';
        }
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                Usuario o contraseña incorrectos
            </div>
        ';
    }
    $check_user = null;
?>
