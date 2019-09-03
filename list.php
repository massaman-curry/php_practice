<!DOCTYPE html>
<html lang="ja">
<head>
    <title>PHPのテスト</title>
</head>

<body>
    <?php

    require_once("mydb.php");

    $pdo = db_connect();

    try{
        $pdo->beginTransaction();

        $search_key = '%'.$_POST['search_key'].'%';
        $sql = "SELECT * FROM users WHERE last_name like :last_name OR first_name like :first_name";

        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(':last_name', $search_key, PDO::PARAM_STR);
        $stmh->bindValue(':first_name', $search_key, PDO::PARAM_STR);

        $stmh->execute();
        $pdo->commit();

        $count = $stmh->rowCount();
        print '検索結果は'.$count."件ヒットしました。<br>";

    }catch(PDOException $Exception){
        $pdo->rollBack();
        print "エラー：".$Exception->getMessage();
    }

    if($count < 1){
        print "検索結果はありません";
    }
    else{
    ?>

    <table border="1">
    <tbody>
        <tr>
        <th>番号</th>
        <th>氏</th>
        <th>名</th>
        <th>年</th>
        </tr>

    <?php
        while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
    ?>

        <tr>
        <td><?=htmlspecialchars($row['id'], ENT_QUOTES)?></td>
        <td><?=htmlspecialchars($row['last_name'], ENT_QUOTES)?></td>
        <td><?=htmlspecialchars($row['first_name'], ENT_QUOTES)?></td>
        <td><?=htmlspecialchars($row['age'], ENT_QUOTES)?></td>
        </tr>

    <?php
        }
    ?>

    </tbody>
    </table>

    <?php
    }
    ?>

</body>

</html>
