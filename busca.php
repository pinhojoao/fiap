<?php

require_once('config/bootstrap.php');

include_once('menu.php');

$sql = "SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y') as created_at FROM posts WHERE title LIKE :search ORDER BY created_at DESC LIMIT 10";
$stmt = $conn->prepare($sql);
$search = '%' . $_REQUEST['busca'] . '%';
$stmt->bindParam('search', $search);
$stmt->execute();
$results = $stmt->fetchAll();

?>
<h1>Resultado da buusca por: <?php echo $_REQUEST['busca']?></h1>
<?php foreach($results as $r) {?>
    <h2>@ <?php echo $r['created_at'] ?> - <?php echo $r['title'] ?></h2>
    <div>
        <?php echo substr($r['content'], 0, 100) ?>
    </div>
    <a href="item.php?id=<?php echo $r['id']?>">Leia mais</a>
<?php } ?>

<?php require_once('rodape.php') ?>