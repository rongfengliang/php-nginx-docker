<?php

require_once 'vendor/autoload.php';
use PUGX\Shortid\Shortid;
$id = Shortid::generate();
echo $id;
?>