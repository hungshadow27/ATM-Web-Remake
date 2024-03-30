<?php
require_once "./src/Models/UserModel.php";
class PincodeController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if (!isset($_SESSION['TRANSACTION'])) {
            redirect('home');
            exit;
        }
        $this->view('Pincode.view');
    }
    public function validatePincode($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [];
            $inputPincode = $_POST["pin1"];
            //validate pincode
            if ($inputPincode != unserialize($_SESSION['USER'])->password) {
                $_SESSION['pincodePass'] = false;
                $data['error'] = "Mã pin không đúng!";
                $this->view('Pincode.view', $data);
                exit;
            }
            if (isset($_SESSION['TRANSACTION'])) {
                $_SESSION['pincodePass'] = true;
                $next = $_SESSION['TRANSACTION']->type;
                redirect($next . '/handle');
            } else {
                $_SESSION['pincodePass'] = false;
                redirect('home');
            }
        } else {
            echo "403: You are not allowed to transfer";
        }
    }
}
