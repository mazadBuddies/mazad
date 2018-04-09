<?php
      function my_autoloader($class){require_once CLASS_DIR. $class  . '.class.php';}
      spl_autoload_register('my_autoloader');