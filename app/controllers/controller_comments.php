<?php

class Controller_Comments extends Controller
{
 public function action_index()
 {
     $this->model = new Model_Comments();
     $data[1] = $this->model->getComments();
     return $this->view->generate('comments_view.php', 'template_view.php', $data);
 }

 public function action_getajax()
 {
     $rez = [];
     $this->model = new Model_Comments();
     $data[2] = $this->model->getComments();

     $rez[] = $data[2];
     echo json_encode($rez);
 }
}