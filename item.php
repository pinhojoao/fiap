<?php

require_once('config/bootstrap.php');

include_once('menu.php');

$sql = "SELECT p.image, p.id as post_id, c.id as category_id, p.title, p.content, DATE_FORMAT(p.created_at, '%d/%m/%Y') as created_at, c.name as category_name FROM posts p
        LEFT JOIN categories c ON c.id = p.category_id 
        WHERE p.id = :id";
$stmt = $conn->prepare($sql);
$id = $_REQUEST['id'];
$stmt->bindParam('id', $id);
$stmt->execute();
$post = $stmt->fetch();
?>
<div class="container">
    <nav>
        <div class="nav-wrapper">
            <div class="col s12">
            <a href="index.php" class="breadcrumb">HOME</a>
            <a href="index.php?categoria=<?php echo $post['category_id']?>" class="breadcrumb"><?php echo $post['category_name']?></a>
            </div>
        </div>
    </nav>
    <br>
    <main class="container">
        <div class="row">
            <div class="col s5">
                <img class="materialboxed" width="100%" height="30%" src="/fiap/<?php echo $post['image']?>">
            </div>
            <div class="col s7">
                <h3><?php echo $post['created_at'] ?> - <?php echo $post['title'] ?></h3>
                <p class="flow-text"><?php echo $post['content'] ?></p>
            </div>
        </div>
        <a href="javascript: history.go(-1)" class="waves-effect waves-light btn">Voltar</a>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.materialboxed');
        var instances = M.Materialbox.init(elems, "");
    });
</script>







<?php require_once('rodape.php') ?>