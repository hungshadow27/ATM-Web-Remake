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
        $limit = 1;
        $transactionModel = new TransactionModel;
        $userTransactions = $transactionModel->getTransactionByUserId(unserialize($_SESSION['USER'])->user_id, $limit, 0);
        $data['totalPage'] = count($userTransactions) / $limit;
        $data['userTransactions'] = $userTransactions;
        $this->view('History.view', $data);
    }
    public function getAllTransaction()
    {
        $transactionModel = new TransactionModel;
        $allTransaction = $transactionModel->getTransactionByUserId(unserialize($_SESSION['USER'])->user_id);

        header('Content-Type: application/json');
        echo json_encode($allTransaction);
    }
    public function getByPage()
    {
        if (isset($_GET['page'])) {
            $current_page = $_GET['page'];
            $limit = 1;
            $offset = ($current_page - 1) * $limit;
            $transactionModel = new TransactionModel;
            $transactionForPage = $transactionModel->getTransactionByUserId(unserialize($_SESSION['USER'])->user_id, $limit, $offset);

            header('Content-Type: application/json');
            echo json_encode($transactionForPage);
        } else {
            echo json_encode(['error' => 'Page number is not provided']);
        }
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
