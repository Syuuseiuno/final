<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>商品追加</title>
</head>
<body>
<p>商品を追加します</p>
<form action= "eiga in7.php" method="post">
商品番号<input type="text" name="shohin_id"><br>
映画名<input type="text" name="shohin_mei"><br>
映画画像<textarea name="image"  style="width: 1000px;px" cols="800" rows="5" maxlength="800"></textarea><br>
時間<input type="text" name="time"><br>
詳細<textarea name="explanation"  style="width: 1000px;px" cols="800" rows="5" maxlength="800"></textarea><br>
ジャンル<input type="text" name="genre"><br>
価格<input type="text" name="price"><br>
<button type="submit">追加</button>
</body>
</html>