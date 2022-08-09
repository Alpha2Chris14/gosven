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
    <title>Product Description</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style">
    <div class="container verify-page product-desc-page">
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
                        <p class="user-heading">Products</p>
                        <hr>
                        <ul class="aside-ul">
                            
                        @foreach($categories as $cat)
                            <li class="aside-list"><a href="{{route('product',$cat->id)}}" class="aside-link">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                    <img src="/images/watermark.svg" alt="" class="water-mark">
                </div>
                <section class="verify-section">
                    <div class="page-title-container">
                        <hr>
                        <h1>Fruits</h1>
                        <hr>
                    </div>
                    <div class="content">
                        <section class="product-img-text">
                            <img src="/products/images/{{$pro->image}}" alt="{{$pro->name}}" class="product-img">
                            <div class="product-detail-container">
                                <h2 class="product-name space-detail">{{$pro->name}}</h2>
                                <p class="space-detail">From {{$pro->userInfo}}'s Farm</p>
                                <p class="product-price space-detail">&#8358; {{ number_format($pro->price)}} per {{$pro->unit}}</p>
                                <p class="prev-price small-space-detail">&#8358; {{ number_format($pro->previous) }}</p>
                                <p class="stars small-space-detail">&#9733;&#9733;&#9733;&#9733;<span>&#9734;</span></p>
                                <label for="collect-quantity" class="quantity-text">Quantity</label>
                                <input type="number" name="collect-quantity" id="collect-quantity" min="1" class="collect-quantity input-field">
                                <form action="{{route('addToCart',$pro->id)}}" method="get">
                                    @csrf
                                <button class="add-to-cart-btn">Add to Cart</button>
                                </form>
                            </div>
                        </section>
                        <section>
                            <h2 class="each-sub-heading">Product Description</h2>
                            <hr class="divider">
                            <p>{{$pro->description}}</p>
                            <video src="/storage/products/video/{{$pro->featured_video}}" controls poster="/products/images/{{$pro->image}}"></video>
                        </section>
                        <section>
                            <h2 class="each-sub-heading">About Farm</h2>
                            <hr class="divider">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quibusdam dolores dignissimos
                                 accusamus? Dolorum iure sapiente doloremque qui repellendus vitae laudantium quisquam. 
                                 Consequuntur quo delectus impedit non, omnis modi alias.
                            </p>
                        </section>
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