<?php

class Controller_Main extends Controller
{
    public function action_index()
	{
	    if(isset($_SESSION['user'])) {

        }
	return $this->view->generate('main_view.php', 'template_view.php');
	}
}