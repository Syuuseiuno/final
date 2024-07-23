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
        <link rel="stylesheet" href="../css/in1.css">
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
        <th>店舗番号</th><th>店舗名</th><th>場所</th><th>系統</th><th>おすすめ</th>
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
        <a href="eigain1.php" class="btn-flat-simple">
  <i class="fa fa-caret-right"></i>商品一覧画面へ戻る
</a>
    </body>
</html>
