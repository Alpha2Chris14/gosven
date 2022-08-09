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
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style">
    <div class="container verify-page dashboard-page">
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
                        <h1>Dashboard</h1>
                        <hr>
                    </div>
                    <div class="content">
                        <?php
                    /* This sets the $time variable to the current hour in the 24 hour clock format */
                    $time = date("H");
                    /* Set the $timezone variable to become the current timezone */
                    $timezone = date("e");
                    /* If the time is less than 1200 hours, show good morning */
                    if ($time < "12") {
                         echo "<p class=\"greetings\">\"Good morning\" ".Auth::user()->name."</p>";
                    } else
                    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
                    if ($time >= "12" && $time < "17") {
                         echo "<p class=\"greetings\">\"Good afternoon\" ".Auth::user()->name."</p>";
                    } else
                    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
                    if ($time >= "17" && $time < "19") {
                         echo "<p class=\"greetings\">\"Good evening\" ".Auth::user()->name."</p>";
                    } else
                    /* Finally, show good night if the time is greater than or equal to 1900 hours */
                    if ($time >= "19") {
                         echo "<p class=\"greetings\">\"Good night\" ".Auth::user()->name."</p>";
                    }
                ?>
                        
                        <div class="product-status-container">
                            <div class="products-container">
                                <p class="details">Products</p>
                                <p class="details product-no">{{count($products)}}</p>
                            </div>
                            <div class="status-container">
                                <p class="details">Status</p>
                                <p class="details verification">Verified</p>
                            </div>
                        </div>
                        <table class="dashboard-table">
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                            <?php $total = 0; ?>
                            @foreach($products as $p)
                            @if($total <= 10)
                            <tr>
                                <td>{{ $p->name }}</td>
                                <td>&#8358; {{ number_format($p->price) }}</td>
                                <td>{{ $p->quantity }}</td>
                            </tr>
                            @else
                            @break
                            @endif
                            @endforeach   
                        </table>
                    </div>
                </section>
            </main>
        </div>
                
    </div>
    @include('partials.frontend._footerii') 
    <script src="/js/script.js"></script>
    <script src="/js/user.js"></script>  
</body>
</html>