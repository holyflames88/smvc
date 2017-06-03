<?php

class Controller_News extends Controller

{
    /**
     * Controller_News constructor.
     */
 function __construct()
 {
     $this->model = new Model_News();
     $this->view = new View();
     parent::__construct();
 }

    /**
     * Action Main
     * @return mixed
     */
 public function action_index()
 {
     $data[1] = $this->model->getNews();
     $data[2] = $this->model->findNews();
     return $this->view->generate('news_view.php', 'template_view.php', $data);
 }

    /**
     * Action create
     * @return mixed
     */
 public function action_create()
 {
     if (isset($_POST['create'])) {
         $data[3] = $this->model->create();
         $this->view->generate('create_view.php', 'template_view.php', $data);
         return header('location: http://host.loc/news');
     }
    return $this->view->generate('create_view.php', 'template_view.php');

 }

    /**
     * Action Delete
     * @return mixed
     */
 public function action_delete()
 {
     $data[4] = $this->model->delete($_GET['id']);
      return $this->view->generate('news_view.php', 'template_view.php', $data);
 }

    /**
     * Action view
     * @return mixed
     */
 public function action_view()
 {
     $data[5] = $this->model->view($_GET['id']);
     return $this->view->generate('newsfull_view.php', 'template_view.php', $data);
 }

}