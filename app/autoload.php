<?php

// l'autoload permet d'invoquer dynamiquement les imports

spl_autoload_register(function($class){

   $tabFiles = ["./models/$class.php", "./models/admin/$class.php", "./controllers/admin/$class.php", "./controllers/public/$class.php","./models/public/$class.php"]; 
   foreach($tabFiles as $files){

        if(file_exists($files)){ 
            require $files;
        }
        }
});

