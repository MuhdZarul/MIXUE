<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Menu;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    protected $fillable = [
        'order_id',
        'cust_id',
    //    'food_id',
    //    'food_price',
        'cart_price',
        'delivery_id',
        'order_status',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function index()
    {
        $transactions = Transaction::with(['user', 'menu', 'delivery'])->get();
        $customers = User::all();
        $menus = Menu::all();
        $deliveries = Delivery::all();

        return view('transaction', compact('transactions', 'customers', 'menus', 'deliveries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cust_id' => 'required|exists:users,id',
        //    'food_id' => 'required|exists:menus,food_id',
        //    'food_price' => 'required|numeric',
            'cart_price' => 'required|numeric',
            'delivery_id' => 'required|exists:deliveries,delivery_id',
            'order_status' => 'nullable|string',
        ]);

        //$order_id = 'ORD-' . strtoupper(uniqid());

        Transaction::create([
        //    'order_id' => $order_id,
            'cust_id' => $request->cust_id,
        //    'food_id' => $request->food_id,
        //    'food_price' => $request->food_price,
            'cart_price' => $request->cart_price,
            'delivery_id' => $request->delivery_id,
            'order_status' => $request->order_status,
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaction added successfully.');
    }

    //public function edit($order_id)
    //{
    //    $transaction = Transaction::findOrFail($order_id);
    //    $customers = Customer::all();
    //    $menus = Menu::all();
    //    $deliveries = Delivery::all();

    //    return view('admin.edit-transaction', compact('transaction', 'customers', 'foods', 'deliveries'));
    //}

    public function update(Request $request, $order_id)
    {
    // Validate the request
    $request->validate([
        'order_status' => 'required|in:pending,completed,cancelled',
    ]);

    // Find the transaction by ID
    $transaction = Transaction::findOrFail($order_id);

    // Update the order_status field
    $transaction->order_status = $request->order_status;
    $transaction->save();

    // Redirect back with success message
    return redirect()->route('transactions.index')->with('success', 'Order status updated successfully.');
    }


    public function destroy($order_id)
    {
        $transaction = Transaction::findOrFail($order_id);
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully.');
    }

    public function simpan(Request $request)
{
    // Creating a new transaction
    $transaction = new Transaction();
    $transaction->cust_id = $request->cust_id;
    $transaction->cart_price = $request->cart_price;
    $transaction->delivery_id = $request->delivery_id;
    $transaction->order_status = $request->order_status;
    $transaction->created_at = today();
    $transaction->updated_at = today();

    // Save the transaction to the database
    $transaction->save();

    // Redirect back to the transaction page with success message
    return redirect()->route('transaction.index')->with('success', 'Transaction added successfully.');
}





    //public function transactions(Request $request)
    //{
    //    $query = DB::table('transactions');

        // Filter by customer if provided
    //    if ($request->has('cust_id') && $request->cust_id != '') {
    //        $query->where('cust_id', $request->cust_id);
    //    }

        // Filter by order status if provided
    //    if ($request->has('order_status') && $request->order_status != '') {
    //        $query->where('order_status', $request->order_status);
    //    }

        // Retrieve filtered transactions
    //    $transactions = $query->get();

    //    return view('admin.transactions', compact('transactions'));
    //}
}
