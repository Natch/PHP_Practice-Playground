<?php

$errors = array();

// DBに接続
$link = mysqli_connect('localhost', 'root', 'realize328');
if(!$link) {
	die('DBに接続できません：' . mysqli_error($link));
}

echo 'DB connect Success in ' . mysqli_get_host_info($link);

// DBを選択する
mysqli_select_db($link, 'online_bbs');

// POSTなら保存処理実行
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$tables = $_POST['tables'];
	$capacity = $_POST['capacity'];

	/*
	$name = null;

	if(!isset($_POST['name']) || '' === $_POST['name']) {
		$errors['name'] = '名前を入力してください';
	} else if (strlen($_POST['name']) > 40) {
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
		$sql = "INSERT INTO post (name, comment, created_at) VALUES ('"
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
	*/
}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<link rel="stylesheet" href="/ApprenticeProject/js/jsTree3.3.5/style.min.css">
		<script src="/ApprenticeProject/js/jsTree3.3.5/jstree.min.js"></script>

		<title>メンタリストDaiGoオフ会-4</title>
	</head>
	<body>
		<h1>メンタリストDaiGoオフ会-4</h1>

		<form action="seatingArrangement.php" method="post">
			<?php if (count($errors)): ?>
			<ul class="error_list">
				<?php foreach ($errors as $error): ?>
				<li>
					<?php echo htmlspecialchars($error, ENT_QUOTES); ?>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>

			テーブル数 : <input type="text" name="tables" /><br />
            テーブルキャパ : <input type="text" name="capacity" /><br />
			<input type="submit" name="submit" value="席替え開始！" />
		</form>

		<div id="enTree">
			<ul>
				<?php for ($i = 1; $i<=$tables; $i++): ?>
				<li data-jstree='{ "opened" : true }'>table<?php echo $i ?>
                    <ul>
                        <?php for ($j = 1; $j<=$capacity; $j++): ?>
                        <li data-jstree='{ "icon" : "fa-arrow-circle-right" }'>弟子<?php echo $j ?></li>
                        <?php endfor; ?>
                    </ul>
                </li>
				<?php endfor; ?>
			</ul>
		</div>
		<?php
		//$sql = 'SELECT * FROM post ORDER BY created_at DESC';
		//$result = mysqli_query($link, $sql);
		?>

		<?php
		//mysqli_free_result($result);
		//mysqli_close($link);
		?>

		<?php //endif; ?>
	</body>
</html>

<script>
	$(function(){$('#enTree').jstree();});
</script>

