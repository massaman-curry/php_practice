<?php session_start(); ?>
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

    $id = $_SESSION['id'];

    try{
        $pdo->beginTransaction();
        $sql = "UPDATE users SET
                last_name = :last_name,
                first_name = :first_name,
                age = :age
                WHERE id = :id";
        $stmh = $pdo->prepare($sql);

        $stmh->bindValue(':last_name', $_POST['last_name'], PDO::PARAM_STR);
        $stmh->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR);
        $stmh->bindValue(':age', $_POST['age'], PDO::PARAM_INT);
        $stmh->bindValue(':id', $id, PDO::PARAM_INT);

        $stmh->execute();
        $pdo->commit();

        print "データを".$stmh->rowCount()."件更新しました。";

    }catch(PDOException $Exception){
        $pdo->rollback();
        print "エラー：".$Exception->getMessage();
    }

    $_SESSION = [];
    session_destroy();

?>
</body>

</html>