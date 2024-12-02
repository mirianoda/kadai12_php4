<?php
session_start();
//1. POSTデータ取得
$reason      = filter_input( INPUT_POST, "reason" );
$id        = $_POST["id"];


//2. DB接続します
include("funcs.php");
sschk();
$pdo = db_conn();


//３．データ登録SQL作成
$sql = "UPDATE gs_user_table SET life_flg=1, reason=:reason WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':reason', $reason, PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); // 実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    $_SESSION['alert'] = "退会が完了しました。またいつでも遊びに来てください！";
    redirect("index.php");
}
