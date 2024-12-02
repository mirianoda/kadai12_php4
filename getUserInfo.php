<?php
try {
    // データベース接続
    include("funcs.php");
    $pdo = db_conn();

    // book_id を取得
    if (!isset($_GET['id'])) {
        echo json_encode(["error" => "Missing book_id parameter"]);
        exit;
    }
    $Id = $_GET['id'];

    // データベースから id に対応する情報を取得
    $stmt = $pdo->prepare("SELECT name, gender, age, comment FROM gs_bm_table WHERE id = :id");
    $stmt->bindValue(':id', $Id, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(["error" => "No data found for the given id"]);
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
    exit;
}
?>
