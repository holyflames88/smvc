<?php

class Model_Cab extends Model
{
 /**
 * @return array
 */
 public function isLogin()
 {
     $login = isset($_SESSION['login']) ? $_SESSION['login'] : "0";

     $db = Db::getInstance();
     $res = $db->prepare("SELECT * FROM users WHERE `login` = :login LIMIT 1");
     $res->bindParam(':login', $login);
     $res->execute();
     $rez = $res->fetchAll();

     return $rez;
 }

 public function getUsers()
 {
     $db = Db::getInstance();
     $res = $db->prepare("SELECT * FROM users LIMIT 10");
     $res->execute();
     $rez = $res->fetchAll();

     return $rez;
 }

 public function signup()
 {
     if(isset($_POST['ok'])) {
         $login = $_POST['username'];
         $email = $_POST['email'];
         $password = $_POST['password'];

         $db = Db::getInstance();
         $res = $db->prepare("INSERT INTO users SET login = :login, email = :email, password = :password");
         $res->bindParam(':login', $login);
         $res->bindParam(':email', $email);
         $res->bindParam(':password', $password);
         $res->execute();
         Route::Redirect('cab/index');
     }
 }

 public function signin()
 {
     if(isset($_POST['ok'])) {
         $login = $_POST['username'];
         $password = $_POST['password'];

         $db = Db::getInstance();
         $res = $db->prepare("SELECT * FROM users WHERE login = :login AND password = :password LIMIT 1");
         $res->bindParam(':login', $login);
         $res->bindParam(':password', $password);
         $res->execute();
         $rez = $res->fetch(PDO::FETCH_ASSOC);

         if($res->rowCount() > 0) {
             $_SESSION['user'] = $rez;
             Route::Redirect('cab/');
         }
     }
 }
}