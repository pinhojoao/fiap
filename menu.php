<?php
$sql = "SELECT id, name FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();
?>

<ul>
    <?php foreach($results as $r) { ?>
        <li><a href="index.php?categoria=<?php echo $r['id']?>"><?php echo $r['name']?></a>
    <?php } ?>
</ul>

<form method="get" action="busca.php">
    <input type="text" name="busca">
    <button type="submit">Buscar</button>
</form>