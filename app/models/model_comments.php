<?php

class Model_Comments extends Model
{
 public function getComments()
 {
     $db = Db::getInstance();
     //$res = $db->prepare("SELECT * FROM comments LEFT JOIN users ON (comments.login_id = users.id) ORDER BY comments.id DESC LIMIT 10");
     $res = $db->prepare("SELECT * FROM comments ORDER BY id DESC LIMIT 10");
     $res->execute();
     $rez = $res->fetchAll();

     return $rez;
 }

 public function add()
 {
     $login_id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : false;
     $text = isset($_POST['message4']) ? $_POST['message4'] : false;

     $db = Db::getInstance();
     $res = $db->prepare("INSERT INTO comments SET `login_id` = :login_id, `text` = :text");
     $res->bindParam(':login_id', $login_id);
     $res->bindParam(':text', $text);
     $res->execute();

     Route::Redirect('http://host.loc/comments');
 }

 public function ajaxcomment()
 {
  $login_id = $_POST['name4'];
  $text = $_POST['message4'];

  $db = Db::getInstance();
  $res = $db->prepare("INSERT INTO comments SET `login_id` = :login_id, `text` = :text");
  $res->bindParam(':login_id', $login_id);
  $res->bindParam(':text', $text);
  $res->execute();
 }

}