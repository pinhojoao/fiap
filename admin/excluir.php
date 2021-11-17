<?php

require_once('../config/bootstrap.php');

$sql = "DELETE FROM posts WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam('id', $id);
$stmt->execute();

?>

<h1>Post excluído com sucesso!</h1>
<a href="/admin/index.php">Voltar</a>

<?php require_once('../rodape.php') ?>