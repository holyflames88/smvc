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

 public function action_add()
 {
     if(isset($_POST['addnew'])) {
         $this->model = new Model_Comments();
         $data[3] = $this->model->add();
         return $this->view->generate('comments_view.php', 'template_view', $data);
     }
     return $this->view->generate('comments_view.php', 'template_view.php');
 }

 public function action_addajax()
 {
   $this->model = new Model_Comments();
   $data[4] = $this->model->ajaxcomment();

   return $data;
 }

}