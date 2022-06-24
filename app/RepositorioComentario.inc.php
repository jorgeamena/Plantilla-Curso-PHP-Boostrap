<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Comentario.inc.php';

class RepositorioComentario {
    public static function insertar_comentario($conexion, $comentario) {
        $comentario_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO comentarios(autor_id, entradas_id, titulo, texto, fecha) VALUES(:autor_id, :entradas_id, :titulo, :texto, NOW())";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':autor_id', $comentario -> obtener_autor_id(), PDO::PARAM_STR);
                $sentencia -> bindParam(':entradas_id', $comentario -> obtener_entradas_id(), PDO::PARAM_STR);
                $sentencia -> bindParam(':titulo', $comentario -> obtener_titulo(), PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $comentario -> obtener_texto(), PDO::PARAM_STR);

                $comentario_insertado = $sentencia -> execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $comentario_insertado;
    }

    public static function obtener_comentarios($conexion, $entrada_id) {

        $comentarios = array();

        if (isset($conexion)) {
            try {
                include_once 'Comentario.inc.php';

                $sql = "SELECT * FROM comentarios WHERE entradas_id = :entrada_id";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();

                if(count($resultado)) {
                    foreach($resultado as $fila) {
                        
                        $comentarios[] = new Comentario($fila['id'],
                                                        $fila['autor_id'],
                                                        $fila['entradas_id'],
                                                        $fila['titulo'],
                                                        $fila['texto'],
                                                        $fila['fecha']);
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $comentarios;

    }

    public static function contar_comentarios_usuarios($conexion, $id_usuario) {

        $total_comentarios = '0';

        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) AS total_comentarios FROM comentarios WHERE autor_id = :autor_id";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $total_comentarios = $resultado['total_comentarios'];
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $total_comentarios;

    }

    public static function obtener_comentarios_usuario_fecha_desc($conexion, $id_usuario) {
        $comentarios_obtenidos = [];
        $longitud_maxima = 30;

        if (isset($conexion)) {
            try {
                $sql  = "SELECT b.id, b.autor_id, b.entradas_id, b.titulo, c.nombre AS nombre_usuario, a.titulo AS titulo_entrada, b.texto, b.fecha ";
                $sql .= " FROM comentarios b, entradas a, usuarios c ";
                $sql .= " WHERE a.id = b.entradas_id ";
                $sql .= " AND c.id = b.autor_id ";
                $sql .= " ORDER BY b.fecha DESC";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {

                    foreach ($resultado as $fila) {
                        $comentarios_obtenidos[] = array( 

                            new Comentario($fila['id'],
                                           $fila['autor_id'],
                                           $fila['entradas_id'],
                                           $fila['titulo'],
                                           substr($fila['texto'], 0, $longitud_maxima),
                                           $fila['fecha']
                            ),
                                $fila['titulo_entrada']
                            ,
                                $fila['nombre_usuario']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $comentarios_obtenidos;
    }

    public static function titulo_existe($conexion, $titulo) {
        $titulo_existe = true;

        if (isset($conexion)) {
            try {
                $sql  = "SELECT * FROM comentarios WHERE titulo = :titulo";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    $titulo_existe = true;
                } else {
                    $titulo_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $titulo_existe;
    }

    public static function obtener_comentario_id($conexion, $id) {
        $comentario = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM comentarios WHERE id = :id";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $comentario = new Comentario($resultado['id'],
                                           $resultado['autor_id'],
                                           $resultado['entradas_id'],
                                           $resultado['titulo'],
                                           $resultado['texto'],
                                           $resultado['fecha']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $comentario;
    }

    public static function actualizar_comentario($conexion, $id, $titulo, $texto) {
        $actualizacion_correcta = false;

        if (isset($conexion)) {
            try {
                $sql = "UPDATE comentarios SET titulo = :titulo, texto = :texto WHERE id = :id";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $texto, PDO::PARAM_STR);
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> rowCount();

                if (count($resultado)) {
                    $actualizacion_correcta = true;
                } else {
                    $actualizacion_correcta = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            } 
        }

        return $actualizacion_correcta;
    }

    public static function eliminar_comentarios($conexion, $id) {
        if(isset($conexion)) {
            try {
                $conexion -> beginTransaction();

                $sql1  = "DELETE FROM comentarios WHERE id = :id";

                $sentencia1 = $conexion -> prepare($sql1);

                $sentencia1 -> bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia1 -> execute();

                $conexion -> commit();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
                $conexion -> rollBack();
            }
        }
    }    
}