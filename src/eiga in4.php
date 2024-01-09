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
		<title>更新確定</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update eiga set shohin_mei=?,image=?,time=?,explanation=?,genre=?,price=? where shohin_id=?');
    if (empty($_POST['shohin_mei'])) {
        echo '商品名を入力してください。';
    } else
    if (!preg_match('/[0-9]+/', $_POST['price'])) {
        echo '商品価格を整数で入力してください。';
    } else 
    
    if($sql->execute([htmlspecialchars($_POST["shohin_mei"]),$_POST["image"],$_POST["time"],$_POST["explanation"],$_POST["genre"],$_POST["price"],$_POST["shohin_id"]])){
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
    foreach ($pdo->query('select * from eiga') as $row) {
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>', $row['eimei'], '</td>';
        echo '<td>', $row['eigapasu'], '</td>';
        echo '<td>', $row['zikan'], '</td>';
        echo '<td>', $row['syousai'], '</td>';
        echo '<td>', $row['zyanru'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?>

        </table>
        <button onclick="location.href='eiga in1.php'">商品一覧画面へ戻る</button>
    </body>
</html>

