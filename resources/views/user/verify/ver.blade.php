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
           
        @include('partials.frontend._search')
        </div>  
    </header>
    <main class="container-fluid " id="main-upload-h">
    @include('partials.frontend._userSide')
        <div id="fruits" class="fruit-section">
            <section>
                <div class="fruit-heading">
                    <img src="/icons/letfArrow.svg" alt="leftArrow" class="leftArrow">
                    <img src="/icons/letfArrow.svg" alt="leftArrow" class="leftArrow">
                    <hr>
                    <h1>upload</h1>
                    <hr>
                </div>
                <form class="upload-section" action= "{{ route('verify.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <hr class="upload-hr">
                    <div class="input-section">
                        <div>
                            <label for="name-of-product" class="align-label align-m-input">Name of Product</label>
                            <input type="text" name="name" id="name-of-product" class="nda upload-input">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="prices-contain">
                            <label for="" class="align-prices-label">Phone</label>
                            <input type="number" name="phone" id="" class="upload-input prices-input">
                            @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="prices-contain">
                            <label for="" id="phone2" class="align-prices-label">Phone 2</label>
                            <input type="number" name="phone2" id="prev-price" class="upload-input prices-input">
                            @error('phone2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="prices-contain">
                            <label for="" id="address" class="align-prices-label">Address 2</label>
                            <input type="address" name="address" id="prev-price" class="upload-input prices-input">
                            @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="prices-contain">
                            <label for="" id="address2" class="align-prices-label">Address 2</label>
                            <input type="address2" name="address2" id="prev-price" class="upload-input prices-input">
                            @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="prices-contain">
                            <label for="" id="nationality" class="align-prices-label">Nationality</label>
                            <input type="text" name="nationality" id="prev-price" class="upload-input prices-input">
                            @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="prices-contain">
                            <label for="" id="state" class="align-prices-label">State</label>
                            <input type="text" name="state" id="state" class="upload-input prices-input">
                            @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="prices-contain">
                            <label for="" id="lga" class="align-prices-label">Local Government Area</label>
                            <input type="text" name="lga" id="state" class="upload-input prices-input">
                            @error('lga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        

                        <div class="mobile-unit-category-contain">
                            <label for="tog" class="align-label">Type Of Goods</label>
                            <select name="tog[]" id="category" multiple data-live-search="true" class="select-upload select-upload2 selectpicker form-control @error('tog') is-invalid @enderror" value="{{ old('tog') }}">
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->name }}" class="select-option">{{ $category->name }}</option>  
                                @endforeach
                            </select>
                            @error('tog')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div id="reset-upload-contain">
                            <input type="submit" value="reset">
                            <input type="submit" value="upload">
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
    <script src="bootsfile/js/bootstrap.min.js" ></script>
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
</body>
</html>
