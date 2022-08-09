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
    <title>Orders</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style">
    <div class="container verify-page dashboard-page order-page">
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
                        <h1>Orders</h1>
                        <hr>
                    </div>
                    @if(count($product) > 0)
                    <div class="content">
                        <div class="pending-orders-container">
                            <?php $countP = 0; ?>
                            @foreach($product as $p)
                            @if($p->status == 1)
                            <?php $countP++; ?>
                            @endif
                            @endforeach 
                            <p>Ordered Product</p>
                            <p>{{$countP}}</p>
                            <p><span>{{($countP/100)*count($all)}}</span>% products</p>
                        </div>
                        <div class="table-container">
                            <table class="dashboard-table order-table">
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <!-- <th>User</th>
                                    <th>Date</th> -->
                                </tr>
                                @foreach($product as $p)
                            @if($p->status == 1)
                                <tr>
                                    <td>{{ $p->name }}</td>
                                    <td>&#8358;{{ number_format($p->price) }}</td>
                                    <td>{{ $p->quantity }}</td>
                                    <!-- <td>Ann</td>
                                    <td>23th July, 2021</td> -->
                                </tr>
                                
                            @endif
                            @endforeach   
                            </table>
                        </div>
                    </div>
                    @else
                    <div class="content">
                        <div class="pending-orders-container" >
                            <p>Pending Orders</p>
                            <p>No Pending Order</p>
                        </div>
                        
                    </div>
                    @endif
                </section>
            </main>
        </div>
                
    </div>
    @include('partials.frontend._footerii')
    <script src="/js/script.js"></script>
    <script src="/js/user.js"></script>
</body>
</html>