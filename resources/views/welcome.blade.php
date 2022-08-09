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
    <title>Welcome to Marketlada: The right place to buy your Agro products</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style">
    <div class="container">
        <div class="child-container">
            <header class="mobile-header desktop-header">
                <div class="first-part-header">
                    @include('partials.frontend._cartii')
                    <div class="mobile-logo-search-container">
                        @include('partials.frontend._searchiii')
                    </div>
                    @include('partials.frontend._navbarii')
                </div>
                <section class="second-part-header">
                    <h1 class="mobile-main-header"><span>Shop Agro</span> With Ease <br/>
                            Shop With Market Lada
                        </h1>
                        <span class="mobile-shop-now-btn"><a href="{{route('product',1)}}">Shop Now</a></span>
                </section>
            </header>
            <main class="home-page-main">
                <section>
                    <section class="product-category">
                        <div class="slide-container">
                            <h2 class="product-category-heading">fresh products</h2>
                            <button class="click-to-slide slideBack" type="button" class="scroll-buttons"><i class="fas fa-angle-left scroll-button-icon"></i></button>
                            <button class="click-to-slide slideForward" type="button" class="scroll-buttons"><i class="fas fa-angle-right scroll-button-icon"></i></button>
                        </div>
                        <hr class="separate-category">
                        <div class="product-category-container">
                    @foreach($products as $pro)
                    @if($pro->status == 1)
                            <figure class="each-product">
                                <a href="">
                                    <img src="/products/images/{{$pro->image}}" alt="{{$pro->name}}" class="product-img">
                                </a>
                                <figcaption class="product-details">
                                    <div class="product-name-price">
                                        <span>5{{$pro->unit}} {{$pro->name}}</span>
                                        <span>&#8358; {{ number_format($pro->price)}} <span class="old-product-price">N700</span></span>
                                    </div>
                                    <form action="{{route('addToCart',$pro->id)}}" method="get">
                                        @csrf
                                    <button class="add-to-cart-btn">Add to Cart</button>
                                    </form>
                                </figcaption>
                            </figure>
                            
                    @endif
                    @endforeach
                            
                        </div>
                    </section>
                    <section class="product-category">
                        <div class="slide-container">
                            <h2 class="product-category-heading">frequently purchased</h2>
                            <button class="click-to-slide slideBack" type="button" class="scroll-buttons"><i class="fas fa-angle-left scroll-button-icon"></i></button>
                            <button class="click-to-slide slideForward" type="button" class="scroll-buttons"><i class="fas fa-angle-right scroll-button-icon"></i></button>
                        </div>
                        <hr class="separate-category">
                        <div class="product-category-container">
                        @foreach($pros as $pro)
                        @if($pro->status == 1)
                            <figure class="each-product">
                                <a href="">
                                    <img src="/products/images/{{$pro->image}}" alt="{{$pro->name}}" class="product-img">
                                </a>
                                <figcaption class="product-details">
                                    <div class="product-name-price">
                                        <span>{{$pro->name}}</span>
                                        <span>&#8358; {{ number_format($pro->price)}} <span class="old-product-price">N700 per kg</span></span>
                                    </div>
                                    <form action="{{route('addToCart',$pro->id)}}" method="get">
                                        @csrf
                                    <button class="add-to-cart-btn">Add to Cart</button>
                                    </form>
                                </figcaption>
                            </figure>
                            @endif
                            @endforeach    
                            
                        </div>
                    </section>
                    <section class="product-category second-frequently-purchased">
                        <h2 class="product-category-heading">frequently purchased</h2>
                        <hr class="separate-category">
                        <div class="product-category-container">
                            @foreach($pros as $pro)
                            @if($pro->status == 1)
                            <figure class="each-product">
                                <a href="">
                                    <img src="/products/images/{{$pro->image}}" alt="{{$pro->name}}" class="product-img">
                                </a>
                                <figcaption class="product-details">
                                    <div class="product-name-price">
                                        <span>5{{$pro->unit}} {{$pro->name}}</span>
                                        <span>&#8358; {{ number_format($pro->price)}}  <span class="old-product-price">N700</span></span>
                                    </div>
                                    <form action="{{route('addToCart',$pro->id)}}" method="get">
                                        @csrf
                                    <button class="add-to-cart-btn">Add to Cart</button>
                                    
                                    </form>
                                </figcaption>
                            </figure>
                            @endif
                            @endforeach  
                            
                        </div>
                    </section>
                    <img src="images/desktop-ad.png" alt="" class="desktop-ad">
                    <img src="images/mobile-ad.png" alt="" class="mobile-ad">
                    <img src="images/iphone-ad.png" alt="" class="iphone-ad">
                    <section class="product-category frequent-category-section">
                        <h2 class="product-category-heading frequent-category-heading">Frequent categories</h2>
                        <hr class="separate-category frequent-category-hr">
                        <div class="frequent-category">
                            <div class="each-frequent-category">
                                <figure class="category-details">
                                    <a href="product/%287%29"><img src="images/sea-foods.jpg" alt="sea food" class="category-img"></a>
                                    <figcaption class="category-name">Sea foods</figcaption>
                                </figure>
                                <figure class="category-details hide-category-small-devices">
                                    <a href="product/%283%29"><img src="images/fruits.jpg" alt="Fruits" class="category-img"></a>
                                    <figcaption class="category-name">Animal Bi-Product</figcaption>
                                </figure>
                                <figure class="category-details hide-category-details">
                                    <a href="/product/%281%29"><img src="images/bulk.jpg" alt="Bulk" class="category-img"></a>
                                    <figcaption class="category-name">Bulk</figcaption>
                                </figure>
                                <figure class="category-details hide-category-details">
                                    <a href="product/%284%29"><img src="images/fruits.jpg" alt="Fruits" class="category-img"></a>
                                    <figcaption class="category-name">Plant Bi-Product</figcaption>
                                </figure>
                            </div>
                            <div class="each-frequent-category">
                                <figure class="category-details hide-category-details hide-category-small-devices">
                                    <a href="/product/%282%29"><img src="images/livestock.jpg" alt="Livestock" class="category-img"></a>
                                    <figcaption class="category-name">Livestock</figcaption>
                                </figure>
                                <figure class="category-details">
                                    <a href="product/%287%29"><img src="images/fruits.jpg" alt="Fruits" class="category-img"></a>
                                    <figcaption class="category-name">Fruits</figcaption>
                                </figure>
                                <figure class="category-details hide-category-details">
                                    <a href="product/%2811%29"><img src="images/fruits.jpg" alt="Fruits" class="category-img"></a>
                                    <figcaption class="category-name">Farm Tools/Aids</figcaption>
                                </figure>
                                <figure class="category-details">
                                    <a href="product/%2810%29"><img src="images/bulk.jpg" alt="Bulk" class="category-img"></a>
                                    <figcaption class="category-name">Processed Food</figcaption>
                                </figure>
                            </div>
                        </div>

                    </section>
                </section> 
            </main>
        </div>
       
    </div>
    @include('partials.frontend._footerii')
    
    <script src="js/script.js"></script>
    <script src="js/homescroll.js"></script>
    <script src="js/user.js"></script>
</body>
</html>