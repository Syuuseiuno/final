<?php
const SERVER ="mysql220.phy.lolipop.lan";
const DBNAME ="LAA1517813-final";
const USER ="LAA1517813";
const PASS ="aso2201126";

$connect= 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>追加確定</title>
</head>
<body>
  <?php  
    $pdo = new PDO($connect, USER, PASS);
    $sql=$pdo->prepare("insert into insyoku(shohin_id,shohin_mei,explanation,genre,price)values(?,?,?,?,?)");
    if($sql->execute([$_POST["shohin_id"],$_POST["shohin_mei"],$_POST["image"],$_POST["time"],$_POST["explanation"],$_POST["genre"],$_POST["price"]])){
        echo "<font color='red'>追加に成功しました。</font>";
    }else{
        echo "<font color='red'>追加に失敗しました。</font>";
    }
?>
<br><hr><br>
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
<form action="eigain1.php" method="post">
    <button type="submit">追加画面に戻る</button>
</form>
</body>
</html>




