<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
require_once("funcs.php");

//. DB接続します
//*** function化する！  *****************

//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
$id = $_GET["id"];

//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
$pdo = db_conn();

//．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM 
                          `gs_user_table` 
                      WHERE 
                          `id`=$id;
                      ");
$status = $stmt->execute(); //実行

//4. header関数"Location"を「select.php」に変更
if ($status == false) {
  sql_error($stmt);
} else {
  redirect('select.php');
}