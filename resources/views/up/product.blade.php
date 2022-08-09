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
    <title>Products</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style">
    <div class="container verify-page product-page">
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
                        <h1>{{$category->name}}</h1>
                        <hr>
                        <div class="filter-container">
                            <button class="filter-button" title="filter-by" id="filter-button">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                aria-hidden="true" focusable="false" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" 
                                viewBox="0 0 512 512"><path fill="#626262" d="M238.627 496H192V253.828l-168-200V16h456v37.612l-160
                                200v161.015zM224 464h1.373L288 401.373V242.388L443.51 48H60.9L224 242.172z"/>
                                </svg>
                                <div class='filter-arrow'></div>
                            </button>
                            <div class='filter-options' id="filter-options">
                                <p class='filter-by-text'>Filter By</p>
                                <hr class='button-hr'>
                                <button>Price</button>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        @foreach($products as $pro)
                        @if($pro->category == $category->name && $pro->status == 1)
                        <div class="products">
                            <a href="{{route('productsingle',$pro->id)}}">
                                <img src="/products/images/{{$pro->image}}"  alt="{{$pro->name}}" class="product-page-img">
                            </a>
                            <div class="product-page-details">
                                <div class="product-detail-container">
                                    <h2 class="product-name space-detail">{{$pro->name}}</h2>
                                    <p class="space-detail">From {{$pro->farmName}} Farm</p>
                                    <p class="product-price space-detail">&#8358; {{ number_format($pro->price)}} per {{$pro->unit}}</p>
                                    <p class="prev-price small-space-detail">&#8358; {{ number_format($pro->previous)}}</p>
                                    <p class="stars small-space-detail">&#9733;&#9733;&#9733;&#9733;<span>&#9734;</span></p>
                                </div>
                                <div class="add-to-cart-btn-container">
                                    <form class="quantity-form">
                                        <label for="collect-quantity" class="quantity-text">Quantity</label for="collect-quantity">
                                        <input type="number" name="collect-quantity" value="{{ $pro->quantity }}" id="collect-quantity" min="1" class="collect-quantity input-field" disabled>
                                    </form>
                                    <form action="{{route('addToCart',$pro->id)}}" method="get">
                                        @csrf
                                    <button class="add-to-cart-btn">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                
                        @endif
                        @endforeach
                        
                      
                    </div>
                </section>
            </main>
        </div>
                
    </div>
    @include('partials.frontend._footerii')
    
    <script src="/js/script.js"></script>
    <script src="/js/filter.js"></script>
    <script src="/js/user.js"></script>
    
</body>
</html>