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
		<title>更新確定</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update insyoku set tenpo_name=?,place=?,categori=?,osusume=? where tenpo_id=?');
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

    if($sql->execute([htmlspecialchars($_POST["tenpo_name"]),$_POST["place"],$_POST["categori"],$_POST["osusume"],$_POST["tenpo_id"]])){
        echo"更新に成功しました";
    }else{
        echo"更新に失敗しました";
    }
    
?>
        <hr>
        <table>
        <tr>
        <th>商品番号</th><th>映画名</th><th>映画画像</th><th>時間</th><th>詳細</th><th>ジャンル</th><th>商品価格</th>
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

