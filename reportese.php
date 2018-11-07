<?php
function elimina_acentos($text)
    {
        $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
        $text = strtolower($text);
        $patron = array (
            // Espacios, puntos y comas por guion
            //'/[\., ]+/' => ' ',
 
            // Vocales
            '/\+/' => '',
            '/&agrave;/' => 'a',
            '/&egrave;/' => 'e',
            '/&igrave;/' => 'i',
            '/&ograve;/' => 'o',
            '/&ugrave;/' => 'u',
 
            '/&aacute;/' => 'a',
            '/&eacute;/' => 'e',
            '/&iacute;/' => 'i',
            '/&oacute;/' => 'o',
            '/&uacute;/' => 'u',
 
            '/&acirc;/' => 'a',
            '/&ecirc;/' => 'e',
            '/&icirc;/' => 'i',
            '/&ocirc;/' => 'o',
            '/&ucirc;/' => 'u',
 
            '/&atilde;/' => 'a',
            '/&etilde;/' => 'e',
            '/&itilde;/' => 'i',
            '/&otilde;/' => 'o',
            '/&utilde;/' => 'u',
 
            '/&auml;/' => 'a',
            '/&euml;/' => 'e',
            '/&iuml;/' => 'i',
            '/&ouml;/' => 'o',
            '/&uuml;/' => 'u',
 
            '/&auml;/' => 'a',
            '/&euml;/' => 'e',
            '/&iuml;/' => 'i',
            '/&ouml;/' => 'o',
            '/&uuml;/' => 'u',
 
            // Otras letras y caracteres especiales
            '/&aring;/' => 'a',
            '/&ntilde;/' => 'n',
 
            // Agregar aqui mas caracteres si es necesario
 
        );
 
        $text = preg_replace(array_keys($patron),array_values($patron),$text);
        return $text;
    }
    
?>
<?php
    include_once('info.php');
    $query = "INSERT INTO reportes(estado, detalles, asunto, usuario, departamento, tecnico, e1, e2, e3, e4)
            VALUES(:estado, :detalles, :asunto, :usuario, :departamento, :tecnico, :e1, :e2, :e3, :e4)";
    $statement = $db->prepare($query); 

    $detalles = $_POST['detalles'];
    $asunto = $_POST['asunto'];
    $usuario = $_POST['usuario'];
    $departamento = $_POST['departamento'];
    $tecnico = $_POST['tecnico'];
    $e1 = $_POST['e1'];
    $e2 = $_POST['e2'];
    $e3 = $_POST['e3'];
    $e4 = $_POST['e4'];
    $estado = 0;

    $detalles=elimina_acentos($detalles);
    $asunto = elimina_acentos($asunto);
    $usuario = elimina_acentos($usuario);

    $statement->bindValue(':e1', $e1);
    $statement->bindValue(':e2', $e2);
    $statement->bindValue(':e3', $e3);
    $statement->bindValue(':e4', $e4);
    $statement->bindValue(':estado', $estado);
    $statement->bindValue(':detalles' , strtoupper($detalles));
    $statement->bindValue(':asunto' , strtoupper($asunto));
    $statement->bindValue(':usuario' , strtoupper($usuario));
    $statement->bindValue(':departamento' , $departamento);
    $statement->bindValue(':tecnico' , $tecnico);
    $statement->execute();
    $statement->closeCursor();

?>
<?php
header('Location: reportes.php');
?>