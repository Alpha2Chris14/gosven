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
    <title>Checkout</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style">
    <div class="container checkout-page">
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
                        <h1>Checkout</h1>
                        <hr>
                    </div>
                    <div class="content">
                        <form action="{{route('saveCheckout')}}" method="post" name="myForm">
                            @csrf
                            <section>
                                <h2 class="checkout-headings phone-heading"><label for="telPhone" class="phone-label">Phone number</label></h2>
                                <p class="already-ave-an-account">(Already have an account &nbsp;<a href="login.html">login</a>)</p>
                                <input type="tel" name="phone" id="telPhone" class="input-field" placeholder="Enter phone number" required>
                            </section>
                            <hr class="checkout-hr separate-input-sections">
                            <section>
                                <h2 class="checkout-headings shipping-heading">Shipping</h2>
                                <label for="firstName" class="input-labels">First Name</label>
                                <input type="text" name="firstName" id="firstName" placeholder="First Name" class="input-field" required>
                                <p id="firstName_error"></p>

                                <label for="lastName" class="input-labels">Last Name</label>
                                <input type="text" name="lastName" id="lastName" placeholder="Last Name" class="input-field" required>
                                <p id="lastname_error"></p>

                                <label for="email" class="input-labels">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" class="input-field" required>
                                <p id="email_error"></p>

                                <label for="company" class="input-labels">Company</label>
                                <input type="text" name="company" id="company" placeholder="Company(Optional)" class="input-field">
                                <label for="address" class="input-labels">Address</label>
                                <input type="text" name="address" id="address" placeholder="Address" class="input-field" required>
                                <label for="state" class="input-labels">State</label>
                                <input type="text" name="state" id="state" value="Rivers" placeholder="State: Rivers" class="input-field" required disabled>
                                <label for="city" class="input-labels">City</label>
                                <input type="text" name="city" id="city" placeholder="City" class="input-field" required>
                                <div id="strict-note">
                                    <p class="note">note:</p>
                                    <p class="note-detail">Due to Govera's SteadFast Ventures cashless policy support measures, all payment
                                    on delivery will be conducted with P.O.S machines. No logistic personnel is allowed
                                    to collect cash. <br>
                                    <!-- Kindly Print out your transaction details as it will be shown to our delivery person upon delivery. -->
                                    </p>
                                </div>
                                <hr class="checkout-hr">
                                <div class="payment-contain">
                                    <p class="payment-text">Payment</p>
                                    <div class="inner-payment-container">
                                        <div class="payment-details">
                                            <span class="payment-detail-text">Cost of goods</span>
                                            <span class="payment-detail-text">1000</span>
                                        </div>
                                        <div class="payment-details">
                                            <span class="payment-detail-text">Cost of goods</span>
                                            <span class="payment-detail-text">500</span>
                                        </div>
                                        <div class="payment-total-contain payment-details">
                                        <?php $total = 0; ?>
                                        @foreach((array) session('cart') as $id => $details)
                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                        @endforeach
                                            <span class="payment-detail-text">Total</span>
                                            <span class="total-amount payment-detail-text">&#8358;{{$total}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-buttons-contain">
                                    <input type="submit" value="Done" class="checkout-btn similar-buttons">
                                </div>
                            </section>
                        </form>
                       
                    </div>
                </section>
            </main>
        </div>
        <div id="pop-up-wrapper">
            <div class="pop-up">
                <img src="/images/order-confirmed-img.svg" alt="Order Successful" class="success-img">
                <p>Your order was successful</p>
                <p>Thank You For Shopping With Market Lada</p>
                <div class="payment-confirm">
                    <a href="{{route('success')}}" class="similar-buttons confirm-ok">OK</a>
                </div>
            </div>
        </div>
                
    </div>
    @include('partials.frontend._footerii')
    
    <script src="/js/script.js"></script>
    <script src="/js/user.js"></script>
    <script src="/js/payment._success.js"></script>
</body>
</html>