<?php

class RepositorioUsuario {
    public static function obtener_todos($conexion) {

        $usuarios = array();

        if(isset($conexion)) {

            try {

                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuarios";

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();

                if (count($resultado)){
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario(
                            $fila['id'],
                            $fila['nombre'],
                            $fila['email'],
                            $fila['password'],
                            $fila['fecha_registro'],
                            $fila['activo']
                        );
                    }
                } else{
                    print 'No Hay Resultados';
                }

            }  catch(PDOException $ex) {

                print "ERROR" . $ex -> getMessage();

            }
        }

        return $usuarios;
    }

    public static function obtener_numero_usuarios($conexion) {

        $total_usuarios = null;

        if(isset($conexion)) {
            try {

                $sql = "SELECT COUNT(*) as total FROM usuarios";

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();

                $resultado = $sentencia -> fetch();

                $total_usuarios = $resultado['total'];

            }    catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $total_usuarios;

    }

    public static function insertar_usuario($conexion, $usuario) {
        $usuario_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuarios(nombre, email, password, fecha_registro, activo) VALUES(:nombre, :email, :password, NOW(), 0)";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':nombre', $usuario -> obtener_nombre(), PDO::PARAM_STR);
                $sentencia -> bindParam(':email', $usuario -> obtener_email(), PDO::PARAM_STR);
                $sentencia -> bindParam(':password', $usuario -> obtener_password(), PDO::PARAM_STR);

                $usuario_insertado = $sentencia -> execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario_insertado;
    }

    public static function nombre_existe($conexion, $nombre) {
        $nombre_existe = true;

        if(isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    $nombre_existe = true;
                } else {
                    $nombre_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $nombre_existe;
    }

    public static function email_existe($conexion, $email) {
        $email_existe = true;

        if(isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuarios WHERE email = :email";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    $email_existe = true;
                } else {
                    $email_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $email_existe;
    }

    public static function obtener_usuario_por_email($conexion, $email) {
    
        $usuario = null;

        if(isset($conexion)) {
            try {

                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuarios WHERE email = :email";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario($resultado['id'],
                                           $resultado['nombre'],
                                           $resultado['email'], 
                                           $resultado['password'], 
                                           $resultado['fecha_registro'], 
                                           $resultado['activo']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage ();
            }
        }

        return $usuario;

    }

    public static function obtener_usuario_por_id($conexion, $id) {
    
        $usuario = null;

        if(isset($conexion)) {
            try {

                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuarios WHERE id = :id";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario($resultado['id'],
                                           $resultado['nombre'],
                                           $resultado['email'], 
                                           $resultado['password'], 
                                           $resultado['fecha_registro'], 
                                           $resultado['activo']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage ();
            }
        }

        return $usuario;

    }

    public static function act_clave($conexion, $id_usuario, $nueva_clave) {
        $act_correcta = false;

        if(isset($conexion)) {
            try {
                
                $sql = "UPDATE usuarios SET password = :password Where id = :id";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':password', $nueva_clave, PDO::PARAM_STR);
                $sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> rowCount();

                if (count($resultado)) {
                    $act_correcta = true;
                } else {
                    $act_correcta = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage ();
            }
        }

        return $act_correcta;
    }

    public static function borrar_solicitud($conexion, $url_personal) {
        $solicitud_borrada = false;

        if(isset($conexion)) {
            try {

                $sql = "DELETE FROM recuperacion_clave WHERE url_secreta = :url_secreta";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':url_secreta', $url_personal, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> rowCount();

                if (count($resultado)) {
                    $solicitud_borrada = true;
                } else {
                    $solicitud_borrada = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage ();
            }
        }

        return $solicitud_borrada;
    }
}