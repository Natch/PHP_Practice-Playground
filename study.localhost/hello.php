<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/02/06
 * Time: 3:35
 */

$fruits = array(
  'apple' => array(
          'price' => 100,
          'count' => 2,
  ),

  'banana' => array(
          'price' => 80,
          'count' => 5,
  ),

  'orange' => array(
          'price' => 90,
          'count' => 3,
  ),
);
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Hello, World</title>
    </head>
    <body>
        <?php foreach ($fruits as $name => $value) { ?>
        <?php echo "$name は1つ{$value['price']}円で{$value['count']}個です",PHP_EOL; ?><br>
        <?php } ?>
    </body>
</html>
