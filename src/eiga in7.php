<?php
const SERVER ="mysql218.phy.lolipop.lan";
const DBNAME ="LAA1517813-asoateam";
const USER ="LAA1517813";
const PASS ="Pasuwado";

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
    $sql=$pdo->prepare("insert into eiga(shohin_id,shohin_mei,image,time,explanation,genre,price)values(?,?,?,?,?,?,?)");
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
 $pdo=new PDO($connect, USER, PASS);
 foreach ($pdo->query('select * from eiga') as $row) {
     echo '<tr>';
     echo '<td>', $row['shohin_id'], '</td>';
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
<form action="eiga in1.php" method="post">
    <button type="submit">追加画面に戻る</button>
</form>
</body>
</html>




