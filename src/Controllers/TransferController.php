<?php
require_once "./src/Models/UserModel.php";
require_once "./src/Models/TransactionModel.php";
class TransferController
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
        $this->view('transfer.view');
    }

    public function confirm($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $value = $_POST["value"];
            $receiverUsername = $_POST["receiver-user"];
            $message = $_POST["message"];

            $usermodel = new UserModel;
            $receiver = $usermodel->getUserByUsername($receiverUsername);
            if ($receiver == null) {
                $data['error'] = "Không tìm thấy người nhận!";
                $this->view('transfer.view', $data);
                exit;
            }
            if ($receiver->username == unserialize($_SESSION['USER'])->username) {
                $data['error'] = "Bạn không thể gửi cho chính mình!";
                $this->view('transfer.view', $data);
                exit;
            }
            if ($value > unserialize($_SESSION['USER'])->balance) {
                $data['error'] = "Số dư không đủ!";
                $this->view('transfer.view', $data);
                exit;
            }
            $transferTransaction = (object)[
                'type' => 'transfer', 'value' => $value,
                'receiver' => $receiver, 'message' => $message
            ];
            $_SESSION['TRANSACTION'] = $transferTransaction;
            $data['value'] = $value;
            $data['receiver'] = $receiver;
            $data['message'] = $message;
            $this->view('ConfirmTransfer.view', $data);
        } else {
            echo "403: You are not allowed to transfer";
        }
    }
    public function handle($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if (!isset($_SESSION['TRANSACTION']) || $_SESSION['TRANSACTION']->type != 'transfer') {
            redirect('home');
            exit;
        }
        if ($_SESSION['pincodePass'] == false) {
            redirect('pincode');
            exit;
        }
        $value  = $_SESSION['TRANSACTION']->value;
        $receiver = $_SESSION['TRANSACTION']->receiver;
        $message = $_SESSION['TRANSACTION']->message;
        $transactionModel = new TransactionModel();
        $transactionModel->transfer($receiver, $value, $message);
        unset($_SESSION['TRANSACTION']);
        $_SESSION['pincodePass'] = false;
        $this->view('ResultTransfer.view', ['value' => $value, 'receiver' => $receiver, 'message' => $message, 'date' => getCurrentDateTime()]);
    }
}
