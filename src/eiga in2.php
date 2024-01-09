<?php
const SERVER ="mysql218.phy.lolipop.lan";
const DBNAME ="LAA1517813-asoateam";
const USER ="LAA1517813";
const PASS ="Pasuwado";

$connect= 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>削除
        </title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from eiga where shohin_id=?');
    if ($sql->execute([$_GET['id']])) {
        echo '削除に成功しました。';
    } else{
        echo '削除に失敗しました。';
    } 
    
?>
        <hr>
        <table border='1'>
        <tr>
            <th>商品番号</th><th>映画名</th><th>映画画像</th><th>時間</th><th>詳細</th><th>ジャンル</th><th>商品価格</th>
    </tr>

<?php
foreach ($pdo->query('select * from eiga') as $row) {
    echo '<tr>';
    echo'<td>', $row['shohin_id'], '</td>';
        echo '<td>', $row['shohin_mei'], '</td>';
        echo '<td>', $row['image'], '</td>';
        echo '<td>', $row['time'], '</td>';
        echo '<td>', $row['explanation'], '</td>';
        echo '<td>', $row['genre'], '</td>';
        echo '<td>', $row['price'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
        </table>
        <button onclick="location.href='eiga in1.php'">商品一覧画面へ戻る</button>
    </body>
</html>
