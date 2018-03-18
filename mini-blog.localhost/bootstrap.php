<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/03/10
 * Time: 15:00
 */

require 'core/ClassLoader.php';

$loader = new ClassLoader();
$loader->registerDir(__DIR__.'/core');
$loader->registerDir(__DIR__.'/models');
$loader->register();