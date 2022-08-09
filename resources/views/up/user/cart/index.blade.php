@extends('layouts.app')

@section('content')
    
    <div class="container">
    <div class="row justify-content-center">
        <?php $count = 0 ?>
        @foreach ($carts as $cart)
            @if(Auth::user()->id == $cart->user_Id)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ $cart->name }}</div>
                        <div class="card-body">N{{ $cart->price }}</div><br>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    </div>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @foreach ($carts as $cart)
                @if(Auth::user()->id == $cart->user_Id)
                    <?php $count += $cart->price ?>
                @endif
            @endforeach
            <br>
            @if($count > 0)
            <strong>Total: N{{ $count }}</strong>
            @else
                <strong> No Item Has Been Added To Cart</strong>
            @endif
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                @if($count > 0)
                <form action="{{route('user.cart.pay') }}" method="post">
                @csrf
                <label for="address">Address</address>
                <input type="text" name = "address">

                <label for="lga">LGA</address>
                <input type="text" name = "lga">

                <label for="state">State</address>
                <input type="text" name = "state">

                <label for="phone">Phone Number</address>
                <input type="number" name = "phone">

                    <button class="btn btn-primary btn-lg" style="color:white;">Pay Now</button>
                </form>
                @endif
            </div>
            <div class="col-md-4">
            <a href="{{route('online')}}" class="btn btn-primary btn-lg" style="color:white;">CheckOut</a>
            </div>
        </div>
    </div>
                    
    
@endsection