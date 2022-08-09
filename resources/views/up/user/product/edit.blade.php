<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>upload</title>
    <link rel="stylesheet" href="/bootsfile/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/product.css">
    <link rel="stylesheet" href="/css/upload.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Castoro&family=Montserrat&family=Oswald&family=Ribeye&family=Unna&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="container-fluid p-0" id="boot-override">
    
    <header class="desktop-header container-fluid">
    @include('partials.frontend._navbar')
        <div class="top-search-login">
           
        @include('partials.frontend._searchii')
        </div>  
    </header>
    <main class="container-fluid " id="main-upload-h">
    @include('partials.frontend._userSide')
        <div id="fruits" class="fruit-section">
            <section>
                <div class="fruit-heading">
                    <hr>
                    <h1>Edit Product {{$product->name}}</h1>
                    <hr>
                </div>
                <form class="upload-section" action= "{{ route('product.update',$product->id) }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <hr class="upload-hr">
                    <div class="input-section">
                        <div>
                            <label for="name-of-product" class="align-label align-m-input">Name of Product</label>
                            <input type="text" name="name" value="{{$product->name}}" id="name-of-product" class="nda upload-input">
                        </div>
                        <div class="prices-contain">
                            <label for="" class="align-prices-label">Price</label>
                            <input type="number" name="price" value="{{$product->price}}" id="" class="upload-input prices-input">
                        </div>
                        <div class="prices-contain">
                            <label for="" id="prev-price" class="align-prices-label">Previous Price</label>
                            <input type="number" name="previous" value="{{$product->previous}}" id="prev-price" class="upload-input prices-input">
                        </div>
                        <div class="mobile-unit-category-contain">
                            <label for="unit" class="align-label">unit</label>
                            <select name="unit" id="unit" class="select-upload select-upload1">
                                @foreach ($units as $unit)
                                <option value="{{ $unit->name }}" class="select-option">{{ $unit->name }}</option>  
                                @endforeach    
                            </select>
                        </div>
                        <div class="mobile-unit-category-contain">
                            <label for="category" class="align-label">category</label>
                            <select name="category" id="category" class="select-upload select-upload2">
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->name }}" class="select-option">{{ $category->name }}</option>  
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="quantity" class="align-label">quantity</label>
                            <input type="number" value="{{$product->quantity}}" name="quantity" id="quantity" class="upload-input">
                        </div>
                        <div>
                            <label for="quantity" class="align-label">Weight</label>
                            <input type="number" value="{{$product->weight}}" name="weight" id="quantity" class="upload-input">
                        </div>
                        <div>
                            <label for="upload-image" class="align-label">upload image</label>
                            <input type="file" value="{{$product->image}}" name="image" id="upload-image" class="upload-input">
                        </div>
                        <div>
                            <label for="upload-video" class="align-label">upload video</label>
                            <input type="file" name="featured_video" value="{{$product->featured_video}}" id="upload-video" class="upload-input">
                        </div>
                        <div>
                            <label for="" class="align-label align-m-input">Description</label>
                            <input type="text" name="description" value="{{$product->description}}" id="" class="nda upload-input">
                        </div>
                        <div id="reset-upload-contain">
                            <input type="submit" value="update">
                        </div>    
                    </div>
                    <hr class="upload-hr">
                </form>
            </section>
        </div>

    </main>
    <footer class="container-fluid p-0">

    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> 
    <script src="/bootsfile/js/bootstrap.min.js" ></script>
    <script src="{{url('js/uni.js')}}"></script>
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
</body>
</html>
