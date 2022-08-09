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
    <title>Login</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style login-body">
    <div class="container login-page">
        <div class="child-container">
            <header class="mobile-header desktop-top-header">
                <div class="first-part-header">
                    <div class="cart-container">
                        <a href="cart.html">
                            <img src="/images/img_trans.gif" alt="cart" class="bg-cart_mobile"
                            width="1" height="1">
                            <span class="cart-value">{{count($carts)}}</span>
                        </a>
                    </div>
                    <div class="mobile-logo-search-container">
                        <a href="index.html">
                            <img src="/images/img_trans.gif" alt="Market Lada Home Page" 
                            class="bg-marketlada_logo_mobile_view" width="1" height="1">
                            <img src="/images/img_trans.gif" alt="Market Lada Home Page" 
                            class="bg-marketlada_logo_desktop_view" width="1" height="1">
                        </a>
                        <form action="" class="mobile-search-form" >
                            
                            <input type="search" name="home-search" id="home-search"
                            placeholder="Try beans" class="mobile-search" required>
                            <input type="submit" value="Search" class="desktop-search-submit">
                        </form>
                    </div>
                    @include('partials.frontend._navbarii')
                </div>   
            </header>
            <main>
                <section>
                    <div class="page-title-container">
                        <hr>
                        <h1>Password Reset</h1>
                        <hr>
                    </div>
                    <div class="align-content-img">
                        <img src="images/login-img.svg" alt="" class="login-img">
                        <div class="content">
                            <a href="{{route('welcome')}}">
                                <picture>
                                    <source media="(min-width: 769px)" scrset="images/lada-symbol-desktop.svg">
                                    <img src="/images/lada-symbol-mobile.svg" alt="Market Lada Symbol-Click to visit home page" class="lada-symbol">
                                </picture>
                            </a>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form action="{{ route('password.email') }}" class="similar-form" method="post">
                                @csrf
                                <label for="email" class="input-labels">Email</label>
                                <input type="text" name="email" id="email" placeholder="Enter Email Address" class="input-field" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                
                                <div class="login-btn-container">
                                    <input type="submit" value="Send Password Reset Link" class="similar-buttons">
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>
                </section>
            </main>
        </div>
        
                
    </div>
    <script src="/js/script.js"></script>
</body>
</html>