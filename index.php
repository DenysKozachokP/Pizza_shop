<?php
spl_autoload_register(static function ($className){
    $path = str_replace( '\\','/', $className.'.php');
    if (file_exists($path)){
        include_once($path);     
    }
});

$route = isset($_GET['route']) ? $_GET['route'] : '';
$core = core\Core::get();
$core->run($route);
$core->done();
$router->addRoute('api/products', 'api/products');
$router->addRoute('api/basket', 'api/basket');
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


