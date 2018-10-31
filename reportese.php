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
    $query = "INSERT INTO reportes(estado, detalles, asunto, usuario, departamento, tecnico)
            VALUES(:estado, :detalles, :asunto, :usuario, :departamento, :tecnico)";
    $statement = $db->prepare($query); 

    $detalles = $_POST['detalles'];
    $asunto = $_POST['asunto'];
    $usuario = $_POST['usuario'];
    $departamento = $_POST['departamento'];
    $tecnico = $_POST['tecnico'];
    $estado = 0;

    $detalles=elimina_acentos($detalles);
    echo $detalles;
    $statement->bindValue(':estado', $estado);
    $statement->bindValue(':detalles' , strtoupper($detalles));
    $statement->bindValue(':asunto' , strtoupper($asunto));
    $statement->bindValue(':usuario' , strtoupper($usuario));
    $statement->bindValue(':departamento' , $departamento);
    $statement->bindValue(':tecnico' , $tecnico);
    $statement->execute();
    $statement->closeCursor();

?>