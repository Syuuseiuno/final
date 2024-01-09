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
		<title>削除
        </title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from insyoku where tenpo_id=?');
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
foreach ($pdo->query('select * from insyoku') as $row) {
    echo '<tr>';
    echo '<td>', $row['tenpo_id'], '</td>';
    echo '<td>', $row['tenpo_name'], '</td>';
    echo '<td>', $row['place'], '</td>';
    echo '<td>', $row['categori'], '</td>';
    echo '<td>', $row['osusume'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
        </table>
        <button onclick="location.href='eigain1.php'">商品一覧画面へ戻る</button>
    </body>
</html>
