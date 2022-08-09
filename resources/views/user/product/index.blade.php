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
    <title>My Store</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style">
    <div class="container verify-page product-page store-page">
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
                        <p class="user-heading">User</p>
                        <hr>
                        <ul class="aside-ul">
                            <li class="aside-list"><a href="profile.html" class="aside-link">Profile</a></li>
                            <li class="aside-list"><a href="dashboard.html" class="aside-link">Dashboard</a></li>
                            <li class="aside-list"><a href="store.html" class="aside-link current-aside">My Products</a></li>
                            <li class="aside-list"><a href="upload.html" class="aside-link">Upload</a></li>
                            <li class="aside-list"><a href="orders.html" class="aside-link">Online Orders</a></li>
                            <li class="aside-list"><a href="" class="aside-link">Contact us</a></li>
                            <li class="aside-list"><a href="" class="aside-link">Sign out</a></li>
                        </ul>
                    </aside>
                    <img src="images/watermark.svg" alt="" class="water-mark">
                </div>
                <section class="verify-section">
                    <div class="page-title-container">
                        <hr>
                        <h1>My Products</h1>
                        <hr>
                    </div>
                    <div class="content">
                        
                    @foreach($product as $product)
                    @if($product->userInfo == Auth::user()->id)
                        <div class="for-mobile">
                            <div class="products">
                                <a href="product_description.html">
                                    <img src="/products/images/{{$product->image}}" alt="{{ $product->name }}" class="product-page-img">
                                </a>
                                <div class="detail-quantity-container">
                                    <div class="product-page-details">
                                        <div class="product-detail-container">
                                            <h2 class="product-name space-detail">{{ $product->name }}</h2>
                                            <p class="space-detail">From Njideka's Farm</p>
                                            <p class="product-price space-detail">N{{ $product->price }} per {{ $product->unit }}</p>
                                            <p class="prev-price small-space-detail">N{{ $product->previous }}</p>
                                            <p class="stars small-space-detail">&#9733;&#9733;&#9733;&#9733;<span>&#9734;</span></p>
                                        </div>
                                        <div class="trash-edit-container">
                                            <form action ="{{Route('product.destroy',$product->id)}}" method="POST" class="store-delete-form">
                                                @csrf
                                                {{method_field('DELETE')}}  
                                            <button class="trash-btn" title="Delete"><img src="/images/trash.svg" alt="Delete item" class="trash-edit-img"></button>  
                                        </form>
                                        <form action ="{{route('product.edit',$product->id)}}" method="GET" class="store-delete-form">
                                            @csrf
                                            <button class="edit-btn"><img src="/images/edit.svg" alt="Edit item" class="trash-edit-img"></button>
                                        </form>
                                        </div>
                                    </div>
                                    <div class="store-quantity bigger-screen-quantity">
                                        <p>Quantity Remaining</p>
                                        <div class="quantity-value-container">
                                            <p class="quantity-value">{{$product->quantity}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store-quantity mobile-quantity">
                                <p>Quantity Remaining</p>
                                <div class="quantity-value-container">
                                    <p class="quantity-value">{{$product->quantity}}</p>
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
    <script src="/js/user.js"></script>
</body>
</html>