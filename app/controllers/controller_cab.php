<?php

class Controller_Cab extends Controller

{
    /**
     * Controller_Cab constructor.
     */
    function __construct()
    {
        $this->view = new View();
        parent::__construct();
    }

    public function action_index()
    {
        $this->model = new Model_Cab();
        $data = $this->model->isLogin();
        if($data === null) {
            echo "isLogin === null";
        }
        return $this->view->generate('signin_view.php', 'template_view.php', $data);

    }

    public function action_signup()
    {
        $data = [];
        if(isset($_POST['ok'])) {
            $this->model = new Model_Cab();
            $data = $this->model->signup();
        }
        return $this->view->generate('signup_view.php', 'template_view.php', $data);
    }

    public function action_signin()
    {
        if(isset($_SESSION['user'])) {
            return $this->view->generate('signin_view.php', 'template_view.php');
        } else {
            $data = [];
            if (isset($_POST['ok'])) {
                $this->model = new Model_Cab();
                $data[1] = $this->model->signin();
            }
            return $this->view->generate('signin_view.php', 'template_view.php', $data);
        }

    }

    public function action_logout()
    {
     unset($_SESSION['user']);
     session_destroy();

     return $this->view->generate('signin_view.php', 'template_view.php');
    }

}