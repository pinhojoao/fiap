<?php

require_once('../config/bootstrap.php');
include_once('menu.php');
$sql = "DELETE FROM posts WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam('id', $id);
$stmt->execute();

?>

<div class="container">
    <h1>Post excluído com sucesso!</h1>
    <div class="row">
        <a class="btn waves-effect waves-light" type="submit" href="index.php">Enviar</a>
    </div>
</div>
