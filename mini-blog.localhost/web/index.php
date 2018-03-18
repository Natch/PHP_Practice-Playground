<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/03/10
 * Time: 15:17
 */

require '../bootstrap.php';
require '../MiniBlogApplication.php';

$app = new MiniBlogApplication(false);
$app->run();