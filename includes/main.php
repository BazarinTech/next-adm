<?php
session_start();
include 'initiate.php';
//GET DASHBAORD SUMMURIES AND DASHBOARD DATA

//CHECK IF ADMINS IS LOGGED IN
if(!isset($_SESSION['userID'])){
    header('location: login');
}else{
    $adminID = $_SESSION['userID'];
}

//GET ADMIN DETAILS
$admins = $query->select('admins', '*', ['ID' => $adminID]);
$admin = $admins[0];
$permissions = $admin['permissions'];
$admin_name = $admin['name'];
$admin_uname = $admin['username'];
$admin_email = $admin['email'];
$admin_role = $admin['role'];
$admin_phone = $admin['phone'];
$admin_pass = $admin['passwrd'];

if (preg_match_all('/\[(.*?)\]/', $permissions, $matches)) {
    $perm_array = $matches[1];
}else{
    $perm_array = [];
}
$isEdit = in_array('edit', $perm_array);
$isAdd = in_array('add', $perm_array);
$isView = in_array('view', $perm_array);

//total balances
$wallets = $query->select('wallets');
$total_balance = 0;
foreach ($wallets as $row) {
    $total_balance += $row['balance'];
}

//total deposits
$total_deposits_transactions =  $query->select('transactions', '*', ['type' => 'Deposit', 'status' => 'Success']);
$total_deposits = 0;
$dep_count = count($total_deposits_transactions);
foreach ($total_deposits_transactions as $row) {
    $total_deposits += $row['amount'];
}

//total withdrawals
$total_withdrawals_transactions =  $query->select('transactions', '*', ['type' => 'Withdraw', 'status' => 'Success']);
$total_withdrawals = 0;
$with_count = count($total_withdrawals_transactions);
foreach ($total_withdrawals_transactions as $row) {
    $total_withdrawals += $row['amount'];
}

//total users
$total_users = count($query->select('users'));

//total active users
$total_active_users = count($query->select('wallets', '*', ['status' => 'Active']));

//users joined today
$users = $query->select('users');
$users_joined_today = 0;
foreach ($users as $row) {
    $time_def = time() - strtotime($row['date_joined']);
    $time_def = $time_def / 84600;
    if ($time_def <= 1) {
        $users_joined_today++;
    }
};

// GET ALL TABLES RECORDS DETAILS

//users records
$users_records = [];
foreach ($users as $row) {
    $upline_user = $query->select('users', '*', ['userID' => $row['upline']]);
    $upline_num = count($upline_user);
    if ($upline_num) {
        $upline_email = $upline_user[0]['email'];
    }else{
        $upline_email = '';
    }

    $users_records[] = [
        'id' => $row['userID'],
        'name' => $row['name'],
        'email' => $row['email'],
        'phone' => $row['phone'],
        'status' => $row['status'],
        'upline' => $upline_email,
        'date' => $row['date_joined'],
    ];
}

//wallets records
$wallets_records = [];
foreach ($wallets as $row) {
    $user_transactions = $query->select('transactions', '*', ['email' => $row['email'], 'status' => 'Success']);
    $withs = 0;
    $deps = 0;
    foreach ($user_transactions as $transaction) {
       if ($transaction['type'] == 'Deposit') {
        $deps += $transaction['amount'];
       }elseif ($transaction['type'] == 'Withdraw') {
        $withs += $transaction['amount'];
       }
    }
    $wallets_records[] = [
        'id' => $row['ID'],
        'email' => $row['email'],
        'balance' => 'Kes '.number_format($row['balance'], 2),
        'income' => 'Kes '.number_format($row['total_income'], 2),
        'downline' => 'Kes '.number_format($row['invite_income'], 2),
        'rolls' => $row['rolls'],
        'withdrawals' => 'Kes '.number_format($withs, 2),
        'deposits' => 'Kes '.number_format($deps, 2)
    ];
}

//order records
$order_records = [];
$orders = $query->select('orders', '*', ['type' => 'grab']);
foreach ($orders as $row) {
    $product = $query->select('products', '*', ['ID' => $row['itemID']]);
    $orders_records[] = [
        'id' => $row['ID'],
        'name' => $product[0]['name'],
        'user' => $row['email'],
        'price' => 'Kes '.number_format($row['amount'], 2),
        'income' => 'Kes '.number_format($product[0]['income'], 2),
        'status' => $row['status'],
        'time' => $row['time'],
        'quantity' => $row['quantity']
    ];
}

//products records
$products_records = [];
$products = $query->select('products');
foreach ($products as $row) {
    $products_records[] = [
        'id' => $row['ID'],
        'media' => $row['media'],
        'name' => $row['name'],
        'price' => $row['price'],
        'grabs' => $row['grabs'],
        'income' => $row['income'],
        'status' => $row['status'],
        'time' => $row['date_created'],
    ];
}

//rolls records
$rolls_records = [];
$rolls = $query->select('rolls');
foreach ($rolls as $row) {
    $rolls_records[] = [
        'id' => $row['ID'],
        'media' => $row['media'],
        'name' => $row['name'],
        'price' => $row['cost'],
        'rolls' => $row['rolls'],
        'status' => $row['status'],
        'time' => $row['time'],
    ];
}

//bonus records
$bonus_records = [];
$bonus = $query->select('bonus');
foreach ($bonus as $row) {
    $bonus_records[] = [
        'id' => $row['ID'],
        'name' => $row['name'],
        'target' => $row['target'],
        'type' => $row['type'],
        'income' => $row['reward'],
        'status' => $row['status'],
        'time' => $row['date_created'],
        'target_type' => $row['target_type'],
    ];
}

//transaction records
$transactions_records = [];
$transactions = $query->select('transactions');
foreach ($transactions as $row) {
    $transactions_records[] = [
        'id' => $row['ID'],
        'email' => $row['email'],
        'amount' => 'Kes '.$row['amount'],
        'type' => $row['type'],
        'status' => $row['status'],
        'description' => $row['description'],
        'fee' => $row['fees'],
        'time' => $row['time'],
        'account' => $row['account'],
    ];
}

//transaction controlls
$transaction_controls = $query->select('controls');
$transaction_controls = $transaction_controls['0'];
$min_dep = $transaction_controls['minDep'];
$min_with = $transaction_controls['minWith'];
$level1 = $transaction_controls['level1'];
$level2 = $transaction_controls['level2'];
$transaction_type = $transaction_controls['transactionType'];
$transaction_account = $transaction_controls['transactionAccount'];

//admin records
$admins_records = [];
$admins = $query->select('admins');
foreach ($admins as $row) {
    $admins_records[] = [
        'id' => $row['ID'],
        'media' => $row['profile'],
        'name' => $row['name'],
        'role' => $row['role'],
        'permissions' => $row['permissions'],
        'status' => $row['status'],
        'time' => $row['date_created'],
    ];
}
