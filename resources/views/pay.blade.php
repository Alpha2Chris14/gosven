@include('partials._messages')
<form method="post" action="{{ url('/pays') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
@csrf
    <div class="row" style="margin-bottom:40px;">
        <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                    Lagos Eyo Print Tee Shirt
                    ₦ 2,950
                </div>
            </p>
            
            <input type="hidden" name="email" value="otemuyiwa@gmail.com"> 
            <input type="hidden" name="orderID" value="345">
            <input type="hidden" name="amount" value="800000"> 
            <input type="hidden" name="quantity" value="3">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > 
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
            

            <p>
                <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                </button>
            </p>
        </div>
    </div>
</form>