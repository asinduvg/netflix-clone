<?php

require_once './includes/header.php';

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createMoviesPreviewVideo();

$containers = new CategoryContainer($con, $userLoggedIn);
echo $containers->showMoviesCategories();
