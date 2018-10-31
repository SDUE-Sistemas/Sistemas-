<?php
  include_once('info.php');
  $query = "DELETE FROM reportes WHERE folio=:folio";
  $statement = $db->prepare($query); 

  $statement->bindValue(':folio' , 1);
  $statement->execute();
  $statement->closeCursor();
  echo "se conecto";
?>