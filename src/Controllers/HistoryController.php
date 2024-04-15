<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Include autoloader của PHP Spreadsheet
require 'vendor/autoload.php';
require_once "./src/Models/TransactionModel.php";
require_once "./src/Models/UserModel.php";
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
    public function exportAndDownloadExcel()
    {
        // Tạo một đối tượng Spreadsheet mới
        $spreadsheet = new Spreadsheet();

        // Tạo một trang tính mới
        $sheet = $spreadsheet->getActiveSheet();

        // Thêm dữ liệu vào các ô của trang tính
        $sheet->setCellValue('A1', 'STT');
        $sheet->setCellValue('B1', 'ID/Mã giao dịch');
        $sheet->setCellValue('C1', 'Loại giao dịch');
        $sheet->setCellValue('D1', 'Giá trị');
        $sheet->setCellValue('E1', 'Người nhận');
        $sheet->setCellValue('F1', 'Người gửi');
        $sheet->setCellValue('G1', 'Ngày giao dịch');

        // Dữ liệu mẫu, bạn có thể thay đổi hoặc lấy từ nguồn dữ liệu thực tế
        $transactionModel = new TransactionModel;
        $data = $transactionModel->getTransactionByUserId(unserialize($_SESSION['USER'])->user_id);

        $userModel = new UserModel();
        // Duyệt qua mảng dữ liệu và thêm vào file Excel
        $row = 2;
        foreach ($data as $index => $rowData) {
            $sheet->setCellValue('A' . $row, $index + 1); //stt
            $sheet->setCellValue('B' . $row, $rowData->transaction_id);
            $sheet->setCellValue('C' . $row, $rowData->type == 'transfer' ? 'Chuyển khoản' : 'Rút tiền');
            $sheet->setCellValue('D' . $row, $rowData->sender_id == unserialize($_SESSION['USER'])->user_id ? " - " . $rowData->value : " + " . $rowData->value);
            $sheet->setCellValue('E' . $row, $userModel->getUserById($rowData->receiver_id)->username);
            $sheet->setCellValue('F' . $row, $userModel->getUserById($rowData->sender_id)->username);
            $sheet->setCellValue('G' . $row, $rowData->create_date);
            $row++;
        }

        // Tạo một tên tập tin duy nhất cho file Excel
        $filename = 'transactions_' . unserialize($_SESSION['USER'])->username . "_" . date('YmdHis') . '.xlsx';

        // Đường dẫn để lưu trữ file Excel trên server
        $filepath = 'uploads/' . $filename;

        // Tạo một đối tượng Writer để ghi file Excel
        $writer = new Xlsx($spreadsheet);

        // Ghi file Excel vào đường dẫn đã chỉ định
        $writer->save($filepath);

        // Chuyển hướng người dùng để tải xuống file Excel
        redirect($filepath);
        exit;
    }
}
