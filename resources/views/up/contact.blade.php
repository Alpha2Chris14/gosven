<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>contact us</title>
    <link rel="stylesheet" href="bootsfile/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/addition.css">
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
    <main class="container-fluid ">
    @include('partials.frontend._modal')
            <div class="fruit-heading">
                <hr class="contact-about-hr">
                <h1>contact us</h1>
                <hr class="contact-about-hr">
            </div> 
            <section class="login-section">
                <div>
                    <picture>
                        <source srcset="icons/gsvlogin.svg" media="(min-width: 768px)" class="gsvlogin-icon">
                        <source srcset="icons/gsvloginmble.svg" media="(min-width:280px)" class="gsvlogin-icon">
                        
                        <img src="icons/gsvlogin.svg" alt="Govera Steadfast Ventures icon" class="gsvlogin-icon">
                    </picture>
                </div> 
                <h2 class="login-section-h2">contact us</h2>   
                <hr class="addition-hr">
                <p class="addition-p">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eveniet laboriosam odio,
                    et quod pariatur. Repudiandae, distinctio magnam. Officiis quasi velit voluptatum earum
                    fugit est omnis laborum dolorum doloribus culpa?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eveniet laboriosam odio,
                    et quod pariatur. Repudiandae, distinctio magnam. Officiis quasi velit voluptatum earum
                    fugit est omnis laborum dolorum doloribus culpa?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eveniet laboriosam odio,
                    et quod pariatur. Repudiandae, distinctio magnam. Officiis quasi velit voluptatum earum
                    fugit est omnis laborum dolorum doloribus culpa?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eveniet laboriosam odio,
                    et quod pariatur. Repudiandae, distinctio magnam. Officiis quasi velit voluptatum earum
                    fugit est omnis laborum dolorum doloribus culpa?
                </p>
            </section> 
            <!-- <img src="icons/womanicon.svg" alt="" class="woman-icon"> -->
    </main>
    @include('partials.frontend._footer')
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