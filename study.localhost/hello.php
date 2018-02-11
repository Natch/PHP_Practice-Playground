<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/02/06
 * Time: 3:35
 */

$name = 'Tom';
$age = 15;
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Hello, World</title>
    </head>
    <body>
        <p><?php echo "Hello, I'm a PHP!"; ?></p>
        <p><?php echo 'hi, $name ¥n'; ?></p>
        <p><?php echo "hi, $name \n"; ?></p>
        <?php
        $foo = <<<EOI
        ヒアドキュメントでは、このように
        複数行にわたる文章を表記できる。
        $name の年齢は $age 歳だ。
EOI;
        echo "$foo"?>

    </body>
</html>
