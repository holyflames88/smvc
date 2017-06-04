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
     $this->model = new Model_Comments();
     $data[2] = $this->model->getComments();

     return json_encode($data[2]);
 }
}