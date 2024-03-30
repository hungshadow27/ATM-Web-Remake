<?php
require_once "./src/Models/TransactionModel.php";
class WithdrawController
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
        $this->view('Withdraw.view');
    }

    public function confirm($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $value = $_POST["other_amount"] == '' ? $_POST["withdraw_amount"] : $_POST["other_amount"];
            if ($value > unserialize($_SESSION['USER'])->balance) {
                $data['error'] = "Số dư không đủ!";
                $this->view('withdraw.view', $data);
                exit;
            }
            $transferTransaction = (object)[
                'type' => 'withdraw', 'value' => $value,

            ];
            $_SESSION['TRANSACTION'] = $transferTransaction;
            $data['value'] = $value;
            $this->view('ConfirmWithdraw.view', $data);
        } else {
            echo "403: You are not allowed to withdraw";
        }
    }
    public function handle($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if (!isset($_SESSION['TRANSACTION']) || $_SESSION['TRANSACTION']->type != 'withdraw') {
            redirect('home');
            exit;
        }
        if (!isset($_SESSION['pincodePass']) || $_SESSION['pincodePass'] == false) {
            redirect('pincode');
            exit;
        }
        $value  = $_SESSION['TRANSACTION']->value;
        $transactionModel = new TransactionModel();
        $transactionModel->withdraw($value);
        unset($_SESSION['TRANSACTION']);
        $_SESSION['pincodePass'] = false;
        $this->view('ResultWithdraw.view', ['value' => $value, 'date' => getCurrentDateTime()]);
    }
}
