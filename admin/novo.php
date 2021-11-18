<?php

require_once('../config/bootstrap.php');

include_once('menu.php');

$sql = "SELECT id, name FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();
?>

<form method="POST" action="inserir.php" enctype="multipart/form-data" class="container col s12">
    <div class="row">
        <div class="input-field col s6">
            <input name="title" id="title" type="text" class="validate" required>
            <label for="title">Título</label>
        </div>
        <div class="input-field col s6">
            <select name="category_id" id="category_id" required>
                <option value="" disabled selected>Selecione uma categoria</option>
                <?php foreach($categories as $c) { ?>
                    <option value="<?php echo $c['id']?>"><?php echo $c['name']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input type="text" class="datepicker" name="created_at" id="created_at" required>
            <label for="created_at">Data de criação</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" name="content" id="content" required></textarea>
            <label for="textarea1">Conteudo</label>
        </div>
    </div>
    <div class="row">
        <div class="file-field input-field">
        <div class="btn">
            <span>Adicionar Imagem</span>
            <input type="file" name="image" id="image">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text" required>
        </div>
        </div>
    </div>
    <div class="row">
        <button class="btn waves-effect waves-light" type="submit">Enviar
            <i class="material-icons right">send</i>
        </button>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectElems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(selectElems, "");

        var datePickerElems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(datePickerElems, "options");
    });
</script>