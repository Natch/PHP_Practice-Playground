<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/02/06
 * Time: 3:35
 */

$my_pow = function($times = 2)
{
    return function ($v) use (&$times)
    {
        return pow($v, $times);
    };
};

$cube = $my_pow(3);

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Hello, World</title>
    </head>
    <body>
        <?php for ($i = 1; $i<5; $i++) { ?>
        <?php echo "$i^3 = " . $cube($i); ?><br>
        <?php } ?>
    </body>
</html>
