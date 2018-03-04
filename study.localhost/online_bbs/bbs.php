<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/03/04
 * Time: 16:56
 */

$errors = array();

// DBに接続
$link = mysqli_connect('localhost', 'root', 'realize328');
if(!$link) {
    die('DBに接続できません：' . mysqli_error($link));
} else {
    echo 'DB connect Success!!<br>';
}

// DBを選択する
mysqli_select_db($link, 'online_bbs');

// POSTなら保存処理実行

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = null;
    if(!isset($_POST['name']) || '' === $_POST['name']) {
        $errors['name'] = '名前を入力してください';
    } else if (strlen($POST['name']) > 40) {
        $errors['name'] = '名前は40文字で入力してください';
    } else {
        $name = $_POST['name'];
    }
    $comment = null;
    if (!isset($_POST['comment']) || '' === $_POST['comment']) {
        $errors['comment'] = 'ひとことを入力してください';
    } else if (strlen($_POST['comment']) > 200) {
        $errors['comment'] = 'ひとことは200文字以内で入力してください';
    } else {
        $comment = $_POST['comment'];
    }

    if (count($errors) === 0) {
        $sql = "INSERT INTO `post` (`name`, `comment`, `created_at`) VALUES ('"
            . mysqli_real_escape_string($link, $name) . "', '"
            . mysqli_real_escape_string($link, $comment) . "', '"
            . date('Y-m-d H:i:s') . "')";
        error_log($sql . PHP_EOL,
            3,
            '/private/var/www/study.localhost/logs/debug.log');
        mysqli_query($link, $sql);
        mysqli_close($link);
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ひとこと掲示板</title>
    </head>
    <body>
        <h1>ひとこと掲示板</h1>

        <form action="bbs.php" method="post">
            <?php if (count($errors)): ?>
            <ul class="error_list">
                <?php foreach ($errors as $error): ?>
                <li>
                    <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            名前：<input type="text" name="name" /><br />
            ひとこと：<input type="text" name="comment" size="60" /><br />
            <input type="submit" name="submit" value="送信" />
        </form>
        <?php
        $sql = "SELECT * FROM `post` ORDER BY `created_at` DESC";
        $result = mysqli_query($link, $sql);
        ?>
        <?php if ($result !== false && mysqli_num_rows($result)): ?>
        <ul>
            <?php while ($post = mysqli_fetch_assoc($result)): ?>
            <li>
                <?php echo htmlspecialchars($post['name'], ENT_QUOTES, 'UTF-8'); ?>:
                <?php echo htmlspecialchars($post['comment'], ENT_QUOTES, 'UTF-8'); ?> -
                <?php echo htmlspecialchars($post['created_at'], ENT_QUOTES, 'UTF-8'); ?>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php
        mysqli_free_result($result);
        mysqli_close($link);
        ?>
        <?php endif; ?>
    </body>
</html>
