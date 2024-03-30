<?php
require_once "./src/Models/UserModel.php";
class UserController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        return "NOPE";
    }
    public function getByUsername()
    {
        //Authentication
        if (!isset($_SESSION['USER'])) {
            echo json_encode(['error' => '403: You cannot access this data']);
            exit;
        }
        if (isset($_GET['username'])) {
            $username = $_GET['username'];
            //customize transfer
            if ($username == unserialize($_SESSION['USER'])->username) {
                echo json_encode(['error' => 'Bạn không thể gửi cho chính mình!']);
                exit;
            }
            $userModel = new UserModel();
            $user = $userModel->getUserByUsername($username);

            header('Content-Type: application/json');
            echo json_encode($user);
        } else {
            echo json_encode(['error' => 'Username is not provided']);
        }
    }
}
