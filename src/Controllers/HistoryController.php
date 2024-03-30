<?php
require_once "./src/Models/TransactionModel.php";
class HistoryController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $transferTransaction = (object)[
            'type' => 'history'
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
        $transactionModel = new TransactionModel;
        $userTransactions = $transactionModel->getTransactionByUserId(unserialize($_SESSION['USER'])->user_id);
        $data['userTransactions'] = $userTransactions;
        $this->view('History.view', $data);
    }
    public function check($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if (!isset($_GET['transaction_id'])) {
            redirect('_404');
            exit;
        }
        $transaction_id = $_GET['transaction_id'];
        $transactionModel = new TransactionModel;
        $transaction = $transactionModel->getTransactionById($transaction_id);
        $data['transaction'] = $transaction;
        $this->view('ResultHistory.view', $data);
    }
}
