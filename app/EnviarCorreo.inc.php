<?
include_once 'app/Correo.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Correo.inc.php';
include_once 'app/Correo.inc.php';
session_start();  
ini_set('SMTP',$serverCorrSaliente);
ini_set('smtp_port','25');
ini_set('sendmail_from',$correoAdmin);
$para = 'jorge.mena@correo.das.gtm';
$asunto = 'Prueba';
$msg = $_POST['MSG'];
$dir = $_POST['DIR'];
 switch($dir){
    case 'LMC/INSERT_LMC_V':
            $sql = "select correo 
                     from usuario u
                    where (u.id_tipo_usuario = 2 or u.id_tipo_usuario = 1)";  
            $query = &$conn->Execute($sql);
            if($query ->RecordCount() != 0){
               $para = "";  
               while($rec = $query->FetchNextObject()){
                   if($para == '')
                    $para .= $rec ->CORREO;
                   else
                      $para .= ','.$rec ->CORREO;
                }
            }
                    
            $fecha = $_POST['FECHA'];
            $asunto = "Mensaje de Insercion de lectura para el ($fecha) Menor que la del dia anterior (Sistema Energia)";
            $msg = "El usuario:".$_SESSION['usuario']."
                            Responsable:".$_SESSION['nombreP']." ".$_SESSION['apellidos']."
                            Grado:".$_SESSION['grado']."
                            Tipo:".$_SESSION['tipo']."
                            Cargo:".$_SESSION['cargo']."
                            Unidad:".$_SESSION['unidad']."
                            Organo:".$_SESSION['organo']."
                            Municipio:".$_SESSION['mcpio']."
                            Provincia:".$_SESSION['prov']."
                    Recivio el mensaje de Alerta:".
                      utf8_decode($msg)."
                    y aun asi inserto el valor de la lectura   
                    ";
            if(mail($para,$asunto,$msg,$cabeceras)){
                echo 1;
            }
            else echo 0;    
     break;   
 }
?>