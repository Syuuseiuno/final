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
		<title>更新</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from insyoku where tenpo_id=?');
    $sql->execute([$_GET['id']]);
	foreach ($sql as $row) {
    
		echo '<form action="eiga in4.php" method="post">';


    	echo"店舗番号";
		echo '<input type="text"  name="id" value="', $row['tenpo_id'], '"><br>';


		echo"店舗名";
		echo '<input type="text" name="eimei" value="', $row['tenpo_name'], '"><br>';


		echo"場所";
		echo '<input type="text" name="eigapasu"  value="', $row['place'],'"><br>';


		echo"系統";
		echo ' <input type="text" name="zikan" value="', $row['categori'], '"><br>';


		echo"おすすめ";
		echo '<input type="text" name="zyanru" value="', $row['osusume'], '"><br>';
		

		echo "\n";
		echo '<input type="submit" value="更新">';
		echo '</form>';
	}
?>
</table>
<button onclick="location.href='eigain1.php'">トップへ戻る</button>
    </body>
</html>

