<?php
/*
*
*  Global functions
*/
function show_404()
{
	header("HTTP/1.0 404 Not Found");
    include_once "404.php";
    die();
}



/*
*
* edit, delete form
*
*/
function show_form($action , $disabled)
{
    $str_form =  '<div class="row">'
                    .'<form class="col-sm-6" action="_inc/'. $action .'-item.php" method="post" id="'. $action .'form">'
                        .'<p class="form-group">'
                            .'<textarea class="form-control" name="message" id="text" rows="3" disabled><?= $item->text ?></textarea>'
                        .'</p>'
                        .'<p class="form-group">'
                           .' <input type="hidden" name="id" value="<?= $item->id ?>">'
                           .' <input class="btn-sm btn-danger" type="submit" value="'. $action .' item">'
                           .' <span class="controls">'
                               .' <a href="<?= $base_url ?>" class="back-link text-muted">back</a>'
                           .' </span>'
                        .'</p>'
                    .'</form>'
                .'</div>';
}
