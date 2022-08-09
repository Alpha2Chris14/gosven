<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Store</title>
    <link rel="stylesheet" href="/bootsfile/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/product.css">
    <link rel="stylesheet" href="/css/store.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Castoro&family=Montserrat&family=Oswald&family=Ribeye&family=Unna&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="container-fluid p-0" id="boot-override">
@if($ver_status->status == 2)
    
    <header class="desktop-header container-fluid">
    @include('partials.frontend._navbar')
        <div class="top-search-login">
           
        @include('partials.frontend._searchii')
        </div>  
    </header>
    <main class="container-fluid ">
            @include('partials.frontend._userSide')
        <div id="fruits" class="fruit-section">
            <section>
                <div class="fruit-heading">
                    <img src="/icons/letfArrow.svg" alt="leftArrow" class="leftArrow">
                    <img src="/icons/letfArrow.svg" alt="leftArrow" class="leftArrow">
                    <hr>
                    <h1>Products</h1>
                    <hr>
                    <img src="/icons/bell.svg" alt="filter icon" class="filter-icon">
                </div>
                <div>
                    <section class="each-fruit-section">
                    @foreach($product as $product)
                      @if($product->userInfo == Auth::user()->id)
                        <div class="fruit-category">
                            <div class="store-good">
                                <img src="/products/images/{{$product->image}}" width="190" height="155" alt="{{ $product->name }}">
                                <div class="fruit-detail">
                                    <h2>{{ $product->name }}</h2>
                                    <p>N{{ $product->price }} per {{ $product->unit }}</p>
                                    <p>N{{ $product->previous }}</p>
                                    <div>
                                        <p>quantity remaining</p>
                                        <p class="quantity-amount">{{$product->quantity}}</p>
                                    </div>
                                    <p><span class="rated-star">
                                        <button>&#9733;</button> 
                                        <button>&#9733;</button>
                                        <button>&#9733;</button>
                                        <button>&#9733;</button>
                                        </span> 
                                        <button class="unrated-star">&#9734;</button>
                                    </p>
                                    <p>Rated by (752)</p>
                                </div>
                            </div>
                            <div class="store-ed-quantity">
                                <div class="quantity-container">
                                    <div class="store-edit-delete-contain">
                                    
                                        <form action ="{{Route('product.destroy',$product->id)}}" method="POST" class="store-delete-form">
                                          @csrf
                                          {{method_field('DELETE')}}  
                                          <button title="Delete">    
                                            <img src="/icons/delete.svg" alt="delete product" class="delete-icon">
                                          </button>  
                                        </form>
                                        <a href="{{route('product.edit',$product->id)}}">
                                            <img src="/icons/edit.svg" alt="edit product" class="edit-icon">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </section>
                </div>
                
            </section>
        </div>

    </main>
    <footer class="container-fluid p-0">

    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> 
    <script src="/bootsfile/js/bootstrap.min.js" ></script>
    <script src="{{url('js/uni.js')}}"></script>
    <script src="/js/script.js"></script>
    <script type="text/javascript">
        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- plugins:js -->
  <script src="{{ url('vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- End custom js for this page-->
    @else
    <h1>You Are Not Suppose To Be Here</h1>
    @endif
</body>
</html>