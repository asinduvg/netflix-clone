<?php

require_once './includes/header.php';

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createPreviewVideo(null);

$containers = new CategoryContainer($con, $userLoggedIn);
echo $containers->showAllCategories();

?>