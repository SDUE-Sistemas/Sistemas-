<?php
function eliminar_tildes($cadena){
 
    //Codificamos la cadena en formato utf8 en caso de que nos de errores
    $cadena = utf8_encode($cadena);
 
    //Ahora reemplazamos las letras
    $cadena = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $cadena
    );
 
    $cadena = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $cadena );
 
    $cadena = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $cadena );
 
    $cadena = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $cadena );
 
    $cadena = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $cadena );
 
    $cadena = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C'),
        $cadena
    );
 
    return $cadena;
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

    $detalles=eliminar_tildes($detalles);
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