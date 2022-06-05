<?php
function RetornarExtension($data)
{
    return pathinfo($data,PATHINFO_EXTENSION);
}
function AlertSuccess($msg)
{
    ?>
    <div class="alert alert-success">
        <?=$msg?>
    </div>
    <?php
}
function AlertError($msg)
{
    ?>
    <div class="alert alert-danger">
        <?=$msg?>
    </div>    
    <?php
}