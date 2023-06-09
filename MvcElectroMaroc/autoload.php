<?php
session_start();

if (isset($_POST['logout'])) {
   session_destroy();
   header("Location: http://localhost/MvcElectroMaroc/index");
}

//autolaod:colpack function
spl_autoload_register('autoload');

function autoload($class_name)
{
   $array_paths = array(
      'DataBase/',
      'app/classes/',
      'models/',
      'controllers/'
   );
   $parts = explode('\\', $class_name);
   $name = array_pop($parts);


   foreach ($array_paths as $path) {
      $file = sprintf($path . '%s.php', $name);
      if (is_file($file)) {
         include_once $file;
      }
   }
}


?>