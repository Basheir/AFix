<?php
    /**
     * Created by PhpStorm.
     * User: pc-sales
     * Date: 18‏/11‏/2016
     * Time: 6:59 م
     */

    include_once('./Class/AltoRouter.php');

    $router = new AltoRouter();

// map homepage
    $router->map( 'GET', '/', function() {
      echo 'OKKKKK';
    });


?>