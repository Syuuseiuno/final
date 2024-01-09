<?php
const SERVER ="mysql220.phy.lolipop.lan";
const DBNAME ="LAA1517813-final";
const USER ="LAA1517813";
const PASS ="aso2201126";

$connect= 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>店舗一覧</title>
	</head>
	<body>
        <h1>店舗一覧</h1>
        <hr>
        <button onclick="location.href='eiga in5.php'">商品を登録する</button>
        <table border='1'>
    <tr>
    <th>店舗番号</th><th>店舗名</th><th>場所</th><th>系統</th><th>おすすめ</th><th>削除</th><th>編集</th>
    </tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from insyoku') as $row) {
        echo '<tr>';
        echo '<td>', $row['tenpo_id'], '</td>';
        echo '<td>', $row['tenpo_name'], '</td>';
        echo '<td>', $row['place'], '</td>';
        echo '<td>', $row['categori'], '</td>';
        echo '<td>', $row['osusume'], '</td>';
        echo '<td>','<a href="eiga in2.php?id=',$row['tenpo_id'],'">削除</a>', '</td>';
        echo '<td>','<a href="eiga in3.php?id=',$row['tenpo_id'],'">編集</a>', '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
    </table>
    </body>
</html>
