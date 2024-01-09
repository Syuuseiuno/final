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
		<title>更新</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from eiga where shohin_id=?');
    $sql->execute([$_GET['id']]);
	foreach ($sql as $row) {
    
		echo '<form action="eiga in4.php" method="post">';


    	echo"商品番号";
		echo '<input type="text"  name="id" value="', $row['shohin_id'], '"><br>';


		echo"映画名";
		echo '<input type="text" name="eimei" value="', $row['shohin_mei'], '"><br>';


		echo"映画画像";
		echo '<textarea name="eigapasu"  style="width: 1000px;px" cols="800" rows="5" maxlength="800" value="', $row['image'],'"></textarea><br>';


		echo"時間";
		echo ' <input type="text" name="zikan" value="', $row['time'], '"><br>';


		echo"詳細";
		echo '<textarea name="syousai"  style="width: 1000px;px" cols="800" rows="5" maxlength="800" value="', $row['explanation'],'"></textarea><br>';


		echo"ジャンル";
		echo '<input type="text" name="zyanru" value="', $row['genre'], '"><br>';


		echo"商品価格";
		echo '<input type="text" name="price" value="', $row['price'], '"><br>';
		

		
		echo "\n";
		echo '<input type="submit" value="更新">';
		echo '</form>';
	}
?>
</table>
<button onclick="location.href='eiga in1.php'">トップへ戻る</button>
    </body>
</html>

