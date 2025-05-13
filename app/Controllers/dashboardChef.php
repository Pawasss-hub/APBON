<?php

namespace App\Controllers\Chef;

use App\Controllers\BaseController;
use App\Models\TransactionModel;

class Dashboard extends BaseController
{
    protected $transaction;

    public function __construct()
    {
        $this->transaction = new TransactionModel();
    }

    public function index()
    {
        $transactions = $this->transaction
            ->select('transactions.*, distributions.name AS distribution_name')
            ->join('distributions', 'distributions.id = transactions.distribution_id')
            ->where('transactions.status', '1') // hanya yang sudah dibayar
            ->orderBy('transactions.created_at', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Dashboard Chef',
            'transactions' => $transactions
        ];

        return view('chef/dashboard', $data);
    }
}
