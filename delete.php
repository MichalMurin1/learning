<?php 

include_once "_partials/header.php";

$item = $todoapp->getItem($_GET['id']);
if(!$item) show_404();

?>
<div class="page-header">
    <h1>VERY MUCH Delete</h1>
</div>

<div class="row">
    <form class="col-sm-6" action="_inc/src/pages/delete-item.php" method="post" id="deleteform">
        <p class="form-group">
            <textarea class="form-control" name="message" id="text" rows="3" disabled><?= $item->text ?></textarea>
        </p>
        <p class="form-group">
            <input type="hidden" name="id" value="<?= $item->id ?>">
            <input class="btn-sm btn-danger" type="submit" value="delete item">
            <span class="controls">
                <a href="<?= $base_url ?>" class="back-link text-muted">back</a>
            </span>
        </p>
    </form>
</div>

<?php include_once "_partials/footer.php" ?>