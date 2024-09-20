<?php
    $uri = trim($_SERVER['REQUEST_URI'], '/');

    $path = __DIR__;

    $allowedExtensions = array(
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'ico' => 'image/x-icon'
    );

    $urlExtension = pathinfo($uri, PATHINFO_EXTENSION);
    
    if (!empty($urlExtension) && array_key_exists($urlExtension, $allowedExtensions)) {
        $filePath=$path . '/' . $uri;
        if(file_exists($filePath)){
            $mime = $allowedExtensions[$urlExtension];
            if($mime){
                header("Content-Type: ".$mime);
                readfile($filePath);
                exit;
            }
        }
    }
    session_start();
    $uriParts=explode("?", $uri);
    $route = $uriParts[0];
    switch ($route) {
        case '':

        case 'inicio':
            require $path."/controlador/inicioListaProductosController.php";
            break;
        case 'agregar':

        case 'editar':
            require $path."/controlador/formularioProductoController.php";
            break;
        case 'eliminar':
            require $path."/controlador/eliminarProductoController.php";
            break;
        case 'funcionBackendOrdenamiento':
            require $path."/controlador/funcionesBackendController.php";
            break;
        default:
            require $path."/vistas/pagina_no_existe.html";
            break;
    }
?>