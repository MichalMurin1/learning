<?php include "_partials/header.php" ?>

    <div class="page-header">
        <h1>VERY MUCH TODO LIST</h1>
    </div>

    <ul id="item-list" class="list-group col-sm-6">
        <?php
            $items = $todoapp->getItems(['text','id']);
            if($items)
            {
                foreach ($items as $item) 
                {
                    echo '<li id="'. $item->id .'" class="list-group-item">' 
                        . $item->text 
                        .'<div class="controls pull-right">'
                            .'<a href="edit.php?id='. $item->id .'" class="edit-link">edit</a>'
                            .'<a href="delete.php?id='. $item->id .'" class="delete-link glyphicon glyphicon-remove text-muted"></a>'
                        .'</div>'
                    . '</li>';
                }
            }
            else
            {
                echo '<p>please add items using the form on the right</p>';
            }
            
        ?>
    </ul>

    <form class="col-sm-6" action="_inc/src/pages/add-item.php" method="post" id="addform">
        <p class="form-group">
            <textarea class="form-control" name="message" id="text" rows="3" placeholder="is there [ /watch?v=GO3wwqikkF0 ] ?"></textarea>
        </p>
        <p class="form-group">
            <input class="btn-sm btn-danger" type="submit" value="add new thing">
        </p>
    </form>

<?php include "_partials/footer.php" ?>