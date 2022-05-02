<?php

require_once 'constant.php';

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  $loader = new Twig_Loader_Filesystem('templates');
  $twig = new Twig_Environment($loader);

  $template = $twig->loadTemplate('original.html');
  
  $original = stripcslashes($_GET['image']);
  if (!file_exists(IMAGES . '/' .$original)) throw new Exception ('Картинки нет');
  
  echo $template->render(array(
            'title' => 'Галлерея картинок',
            'pathImages' => IMAGES,
            'original' => $original
            ));
  
} catch (Exception $e) {
  die ('Ошибка ' . $e->getMessage());
}
?>
