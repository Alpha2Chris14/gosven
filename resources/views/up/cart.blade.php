<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="An online shop to buy your agricultural products including food stuff, farm tools,
    raw foods, farm machineries">
    <meta name="keywords" content="Agricultural products, Agro, E-Commerce, shop, online store, 
    food stuff, Marketlada, buy, raw foods, farm tools, farm machineries">
    <title>Cart</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style">
    <div class="container cart-page">
        <div class="child-container">
            <header class="mobile-header desktop-top-header">
                <div class="first-part-header">
                @include('partials.frontend._cartii')
                    <div class="mobile-logo-search-container">
                        @include('partials.frontend._searchiii')
                    </div>
                    @include('partials.frontend._navbarii')
                </div>   
            </header>
            <main>
                <section>
                    <div class="page-title-container">
                        <hr>
                        <h1>Cart</h1>
                        <hr>
                    </div>
                    <div class="cart-page-content">
                        <div class="content">
                            <a href="{{ url('/') }}" class="continue-shop-link">continue shopping</a>
                            <div class="cart-desktop-view">
                                <table>
                                    <tr>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>SubTotal</th>
                                    </tr>
                                    <?php $total = 0 ?>
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                    <tr>
                                        <td class="product-img-table">
                                            <img src="/products/images/{{ $details['photo'] }}" alt="{{ $details['name'] }}" class="cart-product">
                                            <button class="remove-btn remove-from-cart" data-id="{{ $id }}">remove</button>
                                        </td>
                                        <td class="product-desc">
                                            <p>{{ $details['name'] }}</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                Assumenda architecto maxime, inventore, ipsa atque quis 
                                                esse mollitia corporis quo aliquid 
                                            </p>
                                        </td>
                                        <td class="same-table-width" data-th="Quantity">
                                            <input type="number" data-id="{{ $id }}" value="{{ $details['quantity'] }}" name="collect-quantity" id="collect-quantity" min="1" class="collect-quantity input-field quantity update-cart">
                                        </td>
                                        <td class="same-table-width" data-th="Price">&#8358;{{ $details['price'] }}</td>
                                        <td class="same-table-width">&#8358;{{ $details['price'] * $details['quantity'] }}</td>
                                    </tr>
                                    <tr>
                                    
                                    @endforeach
                                    @endif
                                </table>
                            </div>

                            <div class="mobile-cart">
                            @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                <div class="each-item">
                                    <div class="mobile-product-img-desc-contain">
                                        <div class="mobile-product-img-desc">
                                            <img src="/products/images/{{ $details['photo'] }}" alt="{{ $details['name'] }}" class="cart-product">
                                            <p class="cart-product-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                Assumenda architecto maxime, inventore, ipsa atque quis 
                                                esse mollitia corporis quo aliquid 
                                            </p>
                                        </div>
                                        <div class="each-quantity-container">
                                            <label for="collect-quantity" class="collect-quantity-text">Quantity</label>
                                            <input type="number" data-id="{{ $id }}" value="{{ $details['quantity'] }}" name="collect-quantity" id="collect-quantity" min="1" class="collect-quantity input-field phone-quantity phone-update-cart">
                                        </div>
                                    </div>
                                    <div class="price-remove-btn-container">
                                        <div class="price-container">
                                            <div class="each-price-container">
                                                <p>Unit Price</p>
                                                <p>&#8358;{{ $details['price'] }}</p>
                                            </div>
                                            <div class="each-price-container">
                                                <p>SubTotal</p>
                                                <p>&#8358;{{ $details['price'] * $details['quantity'] }}</p>
                                            </div>
                                        </div>
                                        <button class="remove-btn remove-from-cart" data-id="{{ $id }}">remove</button>
                                    </div>
                                </div>
                                @endforeach
                                    @endif
                                <div class="checkout-total-container">
                                    <div class="total-container">
                                        <p>Total</p>
                                        <p>&#8358;{{ $total }}</p>
                                    </div>
                                    <button href="checkout.html" class="cart-checkout">Checkout</button>
        
                                </div>

                            </div>
                        </div>
                        <div class="cart-desktop-aside">
                            <p class="user-heading">Order Summary</p>
                            <hr>
                            <div class="cart-detail-container">
                                <div class="aside-list">
                                    <p>Items</p>
                                    <p>{{count($carts)}}</p>
                                </div>
                                <div class="aside-list">
                                    <p>Total</p>
                                    <p>&#8358;{{ $total }}</p>
                                </div>
                            </div>
                            <p class="exclude-delivery-text">Excluding Delivery Charges</p>
                            <button href="checkout.html" class="cart-checkout">Checkout</button>

                        </div>
                    </div>
                </section>
            </main>
        </div>
        <div id="pop-up-wrapper">
            <div class="pop-up">
                <p>Kindly Select your preferred method of payment</p>
                <div class="payment-means">
                    <a href="{{route('online')}}" class="payment-links">Pay With Card</a>
                    <a href="{{route('payOnDelivery')}}" class="payment-links">Pay On Delivery</a>
                </div>
            </div>
        </div>
                
    </div>
    @include('partials.frontend._footerii')
    
    <script src="/js/script.js"></script>
    <script src="/js/pop.js"></script>
    <script src="/js/user.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script type="text/javascript">
    
        $(".update-cart").blur(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".phone-update-cart").blur(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents(".each-item").find(".phone-quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
        
        
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
</body>
</html>