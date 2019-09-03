<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PHPのテスト</title>
</head>

<body>
<?php
    require_once("mydb.php");

    $pdo = db_connect();

    $id = 1;
    $_SESSION['id'] = $id;

    try{
// update.phpと異なり、databaseの変更はないため、PDO::beginTransaction, PDO::commitはない。
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(':id', $id, PDO::PARAM_INT);
        $stmh->execute();
        $count = $stmh->rowCount();

    }catch(PDOException $Exception){
        print "エラー；" .$Exception->getMessage();
    }

    if($count < 1){
        print "更新データがありません。<br>";
    }else{
        $row = $stmh->fetch(PDO::FETCH_ASSOC);
?>
    <form name="form1" method="post" action="update.php">

    番号：<?= htmlspecialchars($row['id'])?><br>
    氏：<input type="text" name="last_name"
    value="<?= htmlspecialchars($row['last_name'], ENT_QUOTES)?>">
    名：<input type="text" name="first_name"
    value="<?= htmlspecialchars($row['first_name'], ENT_QUOTES)?>">
    年齢：<input type="text" name="age"
    value="<?= htmlspecialchars($row['age'], ENT_QUOTES) ?>"><br>

    <input type="submit" value="更新">

    </form>
<?php
    }
?>

</body>

</html>
