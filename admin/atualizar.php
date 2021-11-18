<?php

require_once('../config/bootstrap.php');

include_once('menu.php');

$sql = "SELECT id, name FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();

$sql = "SELECT `image`, id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y') as created_at, category_id
        FROM posts
        WHERE id = :id";
$stmt = $conn->prepare($sql);
$id = $_REQUEST['id'];
$stmt->bindParam('id', $id);
$stmt->execute();
$post = $stmt->fetch();
?>

<form method="POST" action="editar.php" enctype="multipart/form-data">
    <label for="title">Título</label>
    <input type="text" name="title" id="title" value="<?php echo $post['title'] ?>">
    <label for="category_id">Categoria</label>
    <select name="category_id" id="category_id">
        <?php foreach($categories as $c) { ?>}
            <option value="<?php echo $c['id']?>" <?php echo $c['id'] == $post['category_id'] ? "selected" : ''?>><?php echo $c['name']?></option>
        <?php } ?>
    </select>
    <label for="created_at">Data de publicação</label>
    <input type="text" name="created_at" id="created_at" value="<?php echo $post['created_at'] ?>">
    <label for="content">Conteúdo</label>
    <textarea name="content" id="content"><?php echo $post['content'] ?></textarea>
    <img src="<?php echo $post['image'] ?>" alt="">
    <label for="image">Imagem</label>
    <input type="file" name="image" id="image">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <button type="submit">Atualizar</button>
</form>