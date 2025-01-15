@extends('layout.layout')

@section('content')

<section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route">
    <div class="overlay-mf"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact-mf">
                    <div id="contact" class="box-shadow-full">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title-box-2">
                                    <h5 class="title-left">
                                        Add Transaction
                                    </h5>
                                </div>
                                <div>
                                    <form action="{{ route('transaction.store') }}" method="post" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <!-- Customer Selection -->
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label for="user_id">Customer</label>
                                                    <select name="user_id" class="form-control" id="user_id" required>
                                                        <option value="">Select Customer</option>
                                                        @foreach($users as $user) <!-- Assuming $users is passed to the view -->
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Total Price (Cart Price) -->
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <input type="text" name="total_price" class="form-control" id="total_price" placeholder="Total (RM)" required>
                                                </div>
                                            </div>

                                            <!-- Delivery ID -->
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <input type="text" name="delivery_id" class="form-control" id="delivery_id" placeholder="Delivery ID" required>
                                                </div>
                                            </div>

                                            <!-- Order Status -->
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="status" id="status" placeholder="Order Status" required>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- End row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->

@endsection
