<?php
$sql = "SELECT id, name FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">PocoBlog</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php foreach($results as $r) { ?>
                <li><a href="index.php?categoria=<?php echo $r['id']?>"><?php echo $r['name']?></a>
            <?php } ?>
        </ul>
    </div>
</nav>
<nav>
    <div class="nav-wrapper">
        <form method="get" action="busca.php">
            <div class="input-field">
                <input id="search" type="search" name="busca">
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>
    </div>
</nav> 