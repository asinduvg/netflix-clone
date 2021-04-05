<?php

require_once './includes/header.php';

if(!isset($_GET['id'])) {
    ErrorMessage::show("No ID passed to page");
}

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createCategoryPreviewVideo($_GET['id']);

$containers = new CategoryContainer($con, $userLoggedIn);
echo $containers->showCategory($_GET['id']);
