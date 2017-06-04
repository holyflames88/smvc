<?php

class Model_Comments extends Model
{
 public function getComments()
 {
     $db = Db::getInstance();
     $res = $db->prepare("SELECT * FROM comments LEFT JOIN users ON (comments.login_id = users.id) ORDER BY comments.id DESC LIMIT 10");
     $res->execute();
     $rez = $res->fetchAll();

     return $rez;
 }
}