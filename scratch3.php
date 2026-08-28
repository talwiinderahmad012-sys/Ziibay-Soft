<?php require 'vendor/autoload.php'; $db = \Config\Database::connect(); $fields = $db->getFieldData('blog_posts'); foreach ($fields as $f) { echo $f->name . ' (' . $f->type . ') ' . PHP_EOL; }
