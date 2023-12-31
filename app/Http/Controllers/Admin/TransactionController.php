<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\TransactionInterface;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $transaction;

    public function __construct(TransactionInterface $transaction)
    {
        $this->transaction = $transaction;
    }

    public function index()
    {
        return view('admin.transaction.index', [
            'transactions' => $this->transaction->getAll()
        ]);
    }

    public function show($id)
    {
        return view('admin.transaction.show', [
            'transaction' => $this->transaction->getById($id)
        ]);
    }

    public function changeStatus($id, Request $request)
    {
        try {
            $this->transaction->changeStatus($id, $request->status);
            return redirect()->back()->with('success', 'Status transaksi berhasil diubah');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Status transaksi gagal diubah');
        }
    }
}
