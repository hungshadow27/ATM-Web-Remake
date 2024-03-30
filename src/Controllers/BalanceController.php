<?php
require_once "./src/Models/TransactionModel.php";
class BalanceController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $transferTransaction = (object)[
            'type' => 'balance'
        ];
        $_SESSION['TRANSACTION'] = $transferTransaction;
        if ($_SESSION['pincodePass'] == false) {
            redirect('pincode');
            exit;
        }
        if (isset($_SESSION['TRANSACTION'])) {
            unset($_SESSION['TRANSACTION']);
        }
        $_SESSION['pincodePass'] = false;
        $data['user'] = unserialize($_SESSION['USER']);
        $this->view('Balance.view', $data);
    }
}
