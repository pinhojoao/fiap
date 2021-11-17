<?php

require_once('../config/bootstrap.php');

include_once('menu.php');

$sql = "SELECT id, name FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();
?>

<form method="POST" action="inserir.php" enctype="multipart/form-data">
    <label for="title">Título</label>
    <input type="text" name="title" id="title">
    <label for="category_id">Categoria</label>
    <select name="category_id" id="category_id">
        <?php foreach($categories as $c) { ?>}
            <option value="<?php echo $c['id']?>"><?php echo $c['name']?></option>
        <?php } ?>
    </select>
    <label for="created_at">Data de publicação</label>
    <input type="text" name="created_at" id="created_at">
    <label for="content">Conteúdo</label>
    <textarea name="content" id="content"></textarea>
    <label for="image">Imagem</label>
    <input type="file" name="image" id="image">
    <button type="submit">Enviar</button>
</form>

<?php require_once('../rodape.php') ?>