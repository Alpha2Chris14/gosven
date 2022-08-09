<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Method of Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    Do you want to pay on delivery or pay with debit card?
                </div>
                <div class="modal-footer">
                    <!-- <a href="{{route('submitCart')}}" class="cart-checkout" >Pay on delivery</a> -->
                    <a href="{{route('payOnDelivery')}}" class="cart-checkout" >Pay on delivery</a>
                    <a href="{{route('online')}}" class="cart-checkout">Pay with card</a>
                </div>
            </div>
        </div>
    </div>