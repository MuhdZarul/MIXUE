<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    protected $fillable = [
        'transaction_id',
        'order_id',
        'user_id',
        'total_price',
        'delivery_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id');
    }

    public function index()
{
    $transactions = Transaction::with(['order', 'delivery', 'user'])->get(); // Add user to eager load
    $users = User::all();
    $orders = Order::all();
    $deliveries = Delivery::all();

    return view('transaction', compact('transactions', 'users', 'orders', 'deliveries'));
}

public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id', // Validate user_id
        'order_id' => 'required|exists:orders,id',
        'total_price' => 'required|numeric',
        'delivery_id' => 'required|exists:deliveries,id',
        'status' => 'nullable|string',
    ]);

    // Store the transaction including user_id
    Transaction::create([
        'user_id' => $request->user_id, // Store user_id
        'order_id' => $request->order_id,
        'total_price' => $request->total_price,
        'delivery_id' => $request->delivery_id,
        'status' => $request->status,
    ]);

    return redirect()->route('transaction.index')->with('success', 'Transaction added successfully.');
}


    public function update(Request $request, $transaction_id)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $transaction = Transaction::findOrFail($transaction_id);
        $transaction->status = $request->status;
        $transaction->save();

        return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy($transaction_id)
    {
        $transaction = Transaction::findOrFail($transaction_id);
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully.');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'total_price' => 'required|numeric',
            'delivery_id' => 'required|exists:deliveries,id',
            'status' => 'nullable|string',
        ]);

        $transaction = new Transaction();
        $transaction->order_id = $request->order_id;
        $transaction->total_price = $request->total_price;
        $transaction->delivery_id = $request->delivery_id;
        $transaction->status = $request->status;
        $transaction->created_at = now();
        $transaction->updated_at = now();
        $transaction->save();

        return redirect()->route('transaction.index')->with('success', 'Transaction added successfully.');
    }
}
