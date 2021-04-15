<?php

require_once "PayPal-PHP-SDK/autoload.php";

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AQUlM4jhuwlxay7utn2jQPsrmQMYVVtjRTQPuaYr0hBKxVe0rCFfi_bLH_Szybq19f0E24wLdggUaSG6', // client id
        'EC04PQGCtrnkWvkSaa-GtbJdV3MnmRUboh3bXx5_lpXm3rYqcqbQA87h2I9uYKLD-ht7f0L6NdF8GAIf' //client secret
    )
)


?>