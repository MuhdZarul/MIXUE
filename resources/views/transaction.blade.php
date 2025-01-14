@extends('layout.layout')

@section('content')

<style>
    table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
    }

    table thead tr {
    background-color: #e60000 !important;
    color: white !important;
    font-weight: bold !important;
    }
    table th, table td {
    border: 1px solid #ddd;
    padding: 10px;
    }

    table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
    }

    table tbody tr:hover {
    background-color: #f1f1f1;
    }

    table tbody tr:last-child td {
    border-bottom: 2px solid #e60000;
    }

    button.btn {
    margin: 0;
    padding: 5px 10px;
    font-size: 14px;
    cursor: pointer;
    }

    button.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    }

    button.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
    }
</style>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<div class="container section-title" data-aos="fade-up">
    <h2>Transaction List</h2>
</div><!-- End Section Title -->

<div class="container mb-4" data-aos="fade-up">
    <a href="/add-transaction" class="btn btn-primary">Add Transaction</a>
</div>

<table class="table table-bordered">
    <thead style="background-color: #e60000; color: white; font-weight: bold;">
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Customer Name</th>
        <!--     <th scope="col">Food Name</th>    -->
        <!--     <th scope="col">Food Price (RM)</th>   -->
            <th scope="col">Total (RM)</th>
            <th scope="col">Delivery ID</th>
            <th scope="col">Order Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->order_id }}</td>
            <td>{{ $transaction->user->name }}</td>


            <td>{{ number_format($transaction->cart_price, 2) }}</td>
            <td>{{ $transaction->delivery->delivery_id }}</td>
            <td>{{ $transaction->order_status }}</td>
            <td>
                <!-- Edit Button -->
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editTransactionModal-{{ $transaction->order_id }}">Edit</button>

                <!-- Delete Button -->
                <form action="{{ route('transactions.destroy', $transaction->order_id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>

        <!-- Modal for Editing Transaction -->
        <div class="modal fade" id="editTransactionModal-{{ $transaction->order_id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('transactions.update', $transaction->order_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Order Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Order Status -->
                            <div class="mb-3">
                                <label for="order_status" class="form-label">Order Status</label>
                                <select name="order_status" class="form-control" required>
                                    <option value="pending" {{ $transaction->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ $transaction->order_status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $transaction->order_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @endforeach
    </tbody>
</table>

@endsection
