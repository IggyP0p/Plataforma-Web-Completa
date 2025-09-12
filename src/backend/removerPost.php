<?php
    session_start();

    require('database/cmsCRUD.php');

    $id_post = $_POST["id_post"];
    removePost($id_post);

    header("Location: ../frontend/php/cms.php");
    exit();
?>