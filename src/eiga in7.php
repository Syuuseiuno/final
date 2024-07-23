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
    <link rel="stylesheet" href="../css/in1.css">
    <title>追加確定</title>
</head>
<body>
  <?php  
    $pdo = new PDO($connect, USER, PASS);
    $sql=$pdo->prepare("insert into insyoku(tenpo_id,tenpo_name,place,categori,osusume)values(?,?,?,?,?)");
    if (empty($_POST['tenpo_name'])) {
        echo '商品名を入力してください。';
    } else
    
    if (empty($_POST['place'])) {
        echo '場所を入力してください。';
    } else

    if (empty($_POST['categori'])) {
        echo '系統を入力してください。';
    } else
    if (empty($_POST['osusume'])) {
        echo 'おすすめを入力してください。';
    } else

    if($sql->execute([$_POST["tenpo_id"],$_POST["tenpo_name"],$_POST["place"],$_POST["categori"],$_POST["osusume"]])){
        echo "<font color='red'>追加に成功しました。</font>";
    }else{
        echo "<font color='red'>追加に失敗しました。</font>";
    }
?>
<br><hr><br>
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
<form action="eigain1.php" method="post">
    <button type="submit">追加画面に戻る</button>
</form>
</body>
</html>




