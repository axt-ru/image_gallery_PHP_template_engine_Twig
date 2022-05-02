<?php

require_once 'constant.php';

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  $loader = new Twig_Loader_Filesystem('templates');
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('index.html');
  $imagesFromCatalog = array_slice(scandir(IMAGES), 2);

  echo $template->render(array(
            'title' => 'Новогодняя коллекция',
            'preview' => PREVIEW,
            'images' => $imagesFromCatalog
            ));
  
} catch (Exception $e) {
  die ('Ошибка: ' . $e->getMessage());
}
?>
