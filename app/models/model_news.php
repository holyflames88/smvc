<?php

class Model_News extends Model
{
    /**
     * Get all news
     * @return array
     */
 public function getNews()
 {
     $db = Db::getInstance();
     $res = $db->prepare("select * from news");
     $res->execute();
     $rez = $res->fetchAll();

     return $rez;
 }

    /** Find news by id
     * @return array
     */
 public function findNews()
 {
     $db = Db::getInstance();
     $res = $db->prepare("select * from news where id = :id");
     $res->bindValue(':id', 1);
     $res->execute();
     $rez = $res->fetchAll();

     return $rez;
 }

    /**
     * Create new news
     * @return mixed
     */
 public function create()
 {
     $title = $_POST['title'];
     $text = $_POST['text'];

     $db = Db::getInstance();
     $res = $db->prepare("INSERT INTO news SET `title` = :title, `text` = :text ");
     $res->bindParam(':title', $title);
     $res->bindParam(':text', $text);
     $res->execute();
 }

    /**
     * Delete news by id
     * @param $id
     */
 public function delete($id)
 {
     $id = $_GET['id'];

     $db = Db::getInstance();
     $res = $db->prepare("DELETE FROM news WHERE `id` = :id LIMIT 1");
     $res->bindParam(':id', $id);
     $res->execute();
 }

    /**
     * View news by id
     * @param $id
     * @return array
     */
 public function view($id)
 {
     $id = $_GET['id'];

     $db = Db::getInstance();
     $res = $db->prepare("SELECT * FROM news WHERE `id` = :id LIMIT 1");
     $res->bindParam(':id', $id);
     $res->execute();
     $rez = $res->fetchAll();

     return $rez;
 }
}