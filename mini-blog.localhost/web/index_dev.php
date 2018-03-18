<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/03/18
 * Time: 18:04
 */

require '../bootstrap.php';
require '../MiniBlogApplication.php';

$app = new MiniBlogApplication(true);
$app->run();