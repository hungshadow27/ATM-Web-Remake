<?php
require_once "./src/Models/UserModel.php";
class TransactionModel
{
    use Database;

    public function transfer($receiver, $value, $message)
    {
        // Validate inputs
        if (!is_numeric($value) || $value <= 0) {
            throw new InvalidArgumentException("Invalid value for transfer");
        }
        $sender = unserialize($_SESSION['USER']);
        if ($sender->balance < $value) {
            throw new RuntimeException("Insufficient balance for transfer");
        }
        $sender->balance -= $value;
        $_SESSION['USER'] = serialize($sender);
        $this->updateBalance($sender);
        $receiver->balance += $value;
        $this->updateBalance($receiver);
        $this->genTransactionHistory('transfer', $value, $receiver->user_id, $sender->user_id, $message);
    }

    public function withdraw($value)
    {
        // Validate input
        if (!is_numeric($value) || $value <= 0) {
            throw new InvalidArgumentException("Invalid value for withdrawal");
        }
        $user = unserialize($_SESSION['USER']);
        if ($user->balance < $value) {
            throw new RuntimeException("Insufficient balance for withdrawal");
        }
        $user->balance -= $value;
        $_SESSION['USER'] = serialize($user);
        $this->updateBalance($user);
        $this->genTransactionHistory('withdraw', $value, null, $user->user_id);
    }

    private function updateBalance($user)
    {
        $this->table("user")->update('username', $user->username, ['balance' => $user->balance]);
    }

    private function genTransactionHistory($type, $value, $receiver_id = null, $sender_id = null, $message = null)
    {
        $data = ['type' => $type, 'value' => $value];
        if ($receiver_id !== null) {
            $data['receiver_id'] = $receiver_id;
        }
        if ($sender_id !== null) {
            $data['sender_id'] = $sender_id;
        }
        if ($message !== null) {
            $data['message'] = $message;
        }
        $this->table("transaction")->insert($data);
    }
    public function getTransactionByUserId($user_id, $limit = 99, $offset = 0)
    {
        $rs = [];
        $send = $this->table("transaction")
            ->limit($limit)
            ->offset($offset)
            ->getListItemsWithCondition('sender_id', $user_id);
        $receive = $this->table("transaction")
            ->limit($limit)
            ->offset($offset)
            ->getListItemsWithCondition('receiver_id', $user_id);
        $rs = array_merge($send, $receive);
        return $rs;
    }
    public function getTransactionById($transaction_id)
    {
        $userModel = new UserModel;
        $rs = $this->table("transaction")->get('transaction_id', $transaction_id);
        $rs->sender_info = $userModel->getUserById($rs->sender_id);
        $rs->receiver_info = $userModel->getUserById($rs->receiver_id);
        return $rs;
    }
}
