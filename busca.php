<?php

require_once('config/bootstrap.php');

include_once('menu.php');

$sql = "SELECT id, title, content, image, DATE_FORMAT(created_at, '%d/%m/%Y') as created_at FROM posts WHERE title LIKE :search ORDER BY created_at DESC LIMIT 10";
$stmt = $conn->prepare($sql);
$search = '%' . $_REQUEST['busca'] . '%';
$stmt->bindParam('search', $search);
$stmt->execute();
$results = $stmt->fetchAll();

?>
    <main>
        <div class="container">
            <h1>Resultado da busca por: <?php echo $_REQUEST['busca']?></h1>
            <?php foreach($results as $r) {?>
                <div class="row card-panel blue lighten-2">
                    <div class="col s5">
                        <img class="materialboxed" width="60%" height="30%" src="/fiap/<?php echo $r['image']?>">
                    </div>
                    <div class="col s6">
                        <h3>
                            <?php echo $r['title'] ?>
                        </h3>
                        <br>
                        <h4>
                            <?php echo substr($r['content'], 0, 100) ?>
                        </h4>
                        <br>
                        <h5>
                            <a class="white-text" href="item.php?id=<?php echo $r['id']?>">Leia mais</a>
                        </h5>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>


<br><br><br><br><br><br><br>
<?php require_once('rodape.php') ?>