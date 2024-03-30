<?php
require_once "./src/Models/UserModel.php";
class HomeController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if (isset($_SESSION['TRANSACTION'])) {
            unset($_SESSION['TRANSACTION']);
        }
        $_SESSION['pincodePass'] = false;
        //update user
        $userModel = new UserModel;
        $user = $userModel->getUserById(unserialize($_SESSION['USER'])->user_id);
        $_SESSION['USER'] = serialize($user);
        $this->view('home.view');
    }
}
