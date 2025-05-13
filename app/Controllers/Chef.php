<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
class Chef extends BaseController
{
     public function index()
    {
        $transactionModel = new TransactionModel();

        $transactions = $transactionModel
            ->select('transactions.*, distributions.name AS distribution_name, menus.name AS menu_name')
            ->join('distributions', 'transactions.distribution_id = distributions.id')
            ->join('menus', 'transactions.menu_id = menus.id')
            ->where('transactions.pay !=', 0) // hanya yang sudah dibayar
            ->findAll();

        $data = [
            'title' => 'Dashboard Chef',
            'transactions' => $transactions,
        ];

        return view('chef/dashboard', $data);
    }

    public function update_status($id)
    {
        $transactionModel = new TransactionModel();

        // Update status pesanan menjadi '0' (selesai)
        $data = [
            'status' => '0', // Pesanan selesai
        ];

        // Perbarui data transaksi
        $transactionModel->update($id, $data);

        // Redirect kembali ke dashboard chef
        return redirect()->to('/chef');
}


}
