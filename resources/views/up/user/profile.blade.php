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
    <title>Profile</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style">
    <div class="container verify-page profile-page">
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
            <main class="verify-main similar-main">
            @include('partials.frontend.sidebarii')
                <section class="verify-section">
                    <div class="page-title-container">
                        <hr>
                        <h1>Profile</h1>
                        <hr>
                    </div>
                    <div class="content">
                        <div>
                            <img src="/images/uploads/avatars/{{ $user->avatar }}" alt="My Profile" class="profile-img">
                            <p class="profile-name">{{ $user->name }}'s Profile</p>
                        </div>
                        <form  action= "{{ route('profiles') }}" enctype="multipart/form-data" method="post" class="change-profile-form">
                            <label for="ChangeProfile">Change Profile Image</label>
                            <input type="file" name="ChangeProfile" id="ChangeProfile" class="profile-upload">
                            <input type="submit" value="save" class="save-btn similar-buttons">
                        </form>
                    </div>
                </section>
            </main>
        </div>
                
    </div>
    <footer>
        <div class="subscribe-NewsLetter-Container">
            <div class="subscribe-text">
                <p class="subscribe">Subscribe to NewsLetter</p>
                <p class="subscribe-detail">Sign up to get latest information about latest
                    products from our farms and also promotions,
                    discount deals
                </p>
            </div>
            <form action="" class="subscribe-form">
                <input type="email" name="subscribe-email" id="subscribe-email" 
                class="subscribe-input" required>
                <input type="submit" value="Sign up" class="btn-subscribe-email">
            </form>
        </div>
        <div class="addition-container">
            <div class="additional-link-container">
                <ul class="link-container">
                    <li class="additional-list"><a href="terms.html" class="additional-link-item">Terms and Conditions</a></li>
                    <li class="additional-list"><a href="" class="additional-link-item">Services</a></li>
                    <li class="additional-list"><a href="return_policy.html" class="additional-link-item">Return Policy</a></li>
                </ul>
                <ul class="link-container payment-link-container">
                    <li class="additional-list"><a href="" class="additional-link-item">Payments</a></li>
                    <div class="visa-mastercard-container">
                        <img src="images/master-card.svg" alt="pay with master card" loading="lazy">
                        <img src="images/visa.svg" alt="pay with visa" loading="lazy">
                    </div>
                    <a href="https://www.flutterwave.com">
                        <picture>
                            <source media="(min-width: 768px)" srcset="images/flutterwave-desktop.svg">
                            <img src="images/flutterwave-mobile.svg" alt="Flutter wave" loading="lazy" class="flutterwave-mobile">
                        </picture>
                    </a>
                </ul>
                <ul class="link-container">
                    <li class="additional-list list-align-right"><a href="privacy_policy.html" class="additional-link-item">Privacy Policies</a></li>
                    <li class="additional-list list-align-right"><a href="" class="additional-link-item">Deliveries</a></li>
                    <li class="additional-list list-align-right"><a href="about.html" class="additional-link-item">About Us</a></li>
                </ul>
            </div>
            <small>Copyright &copy; 2020 marketlada.com. All rights reserved</small>
        </div>
    </footer>
    <script src="/js/script.js"></script>
    <script src="/js/user.js"></script>
</body>
</html>