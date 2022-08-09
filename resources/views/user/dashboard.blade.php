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
    <title>Verification</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style">
    <div class="container verify-page user-icon">
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
            <main class="similar-main">
                <div class="aside-container">
                    <aside class="desktop-aside">
                        <p class="user-heading">user</p>
                        <hr>
                        <ul class="aside-ul">
                            <li class="aside-list"><a href="profile.html" class="aside-link">profile</a></li>
                            <li class="aside-list"><a href="verify.html" class="aside-link current-aside">verify</a></li>
                            <li class="aside-list"><a href="" class="aside-link">contact us</a></li>
                            <li class="aside-list"><a href="" class="aside-link">sign out</a></li>
                        </ul>
                    </aside>
                    <img src="images/watermark.svg" alt="" class="water-mark">
                </div>
                <section class="verify-section">
                    <div class="page-title-container">
                        <hr>
                        <h1>verify</h1>
                        <hr>
                    </div>
                    <div class="content">
                        <p class="content-text">Awaiting verification. Please check back in the next 2hrs</p>
                        <p class="content-text">Thank you for choosing Market Lada.</p>
                    </div>    
                </section>
            </main>
        </div>          
    </div>
    @include('partials.frontend._footerii')
    <script src="/js/script.js"></script>
    @if(Auth::check())
    <script src="/js/user.js"></script>
    @endif
</body>
</html>