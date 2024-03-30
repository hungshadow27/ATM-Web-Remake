<?php
require_once "./src/Models/UserModel.php";
class ChangepincodeController
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
        $this->view('ChangePincode.view');
    }

    public function handle($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pin1 = $_POST["pin1"];
            $pin2 = $_POST["pin2"];
            $pin3 = $_POST["pin3"];

            if ($pin1 != unserialize($_SESSION['USER'])->password) {
                $data['error'] = "Mã pin hiện tại không đúng!";
                $this->view('ChangePincode.view', $data);
                exit;
            }
            if ($pin1 == $pin2) {
                $data['error'] = "Mã pin mới không được giống mã pin hiện tại!";
                $this->view('ChangePincode.view', $data);
                exit;
            }
            if ($pin2 != $pin3) {
                $data['error'] = "Mã pin mới nhập lại không khớp!";
                $this->view('ChangePincode.view', $data);
                exit;
            }
            $user = unserialize($_SESSION['USER']);
            $user->password = $pin2;
            $_SESSION['USER'] = serialize($user);
            $usermodel = new UserModel;
            $usermodel->updatePassword($user->user_id, $pin2);
            $data['error'] = "Bạn đã thay đổi mã pin thành công!";
            $this->view('ChangePincode.view', $data);
        } else {
            echo "403: You are not allowed to changpincode";
        }
    }
}
