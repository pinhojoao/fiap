<style>
    a{
        text_decoration: none;
    }

</style>
<html>
    <body>
        <?php
        require_once('config/bootstrap.php');
        include_once('menu.php');

        $sql = "SELECT * FROM posts WHERE category_id = :category ORDER BY created_at DESC LIMIT 10";
        $stmt = $conn->prepare($sql);
        $category = isset($_REQUEST['categoria']) ? $_REQUEST['categoria'] : 1;
        $stmt->bindParam('category', $category);
        $stmt->execute();
        $results = $stmt->fetchAll();
        ?>

        <br>
        <main>
            <div class="container">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems, "");
        });
    </script>
    <br><br><br><br><br><br>
    <?php require_once('rodape.php') ?>
    </body>
</html>