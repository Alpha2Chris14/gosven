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
    <title>Verification</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Ribeye&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="general-style">
    <div class="container verify-page user-icon">
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
                <div class="aside-container">
                    <aside class="desktop-aside">
                        <p class="user-heading">user</p>
                        <hr>
                        <ul class="aside-ul">
                            <li class="aside-list"><a href="profile.html" class="aside-link">profile</a></li>
                            <li class="aside-list"><a href="verify.html" class="aside-link current-aside">verify</a></li>
                            <li class="aside-list"><a href="" class="aside-link">contact us</a></li>
                            <li class="aside-list"><a href="" class="aside-link">sign out</a></li>
                        </ul>
                    </aside>
                    <img src="images/watermark.svg" alt="" class="water-mark">
                </div>
                <section class="verify-section">
                    <div class="page-title-container">
                        <hr>
                        <h1>verify</h1>
                        <hr>
                    </div>
                    <div class="content">
                        <div class="verify-text-container">
                            <p>Sign up successful. Please proceed to verification to register as seller or continue <a href="product.html" class="read-about">shopping</a></p>
                            <p>Read <a href="about.html" class="read-about">About</a> for more details on this</p>
                        </div>
                        <hr class="verify-desktop-hr">
                        <form action="{{ route('verify.store') }}" enctype="multipart/form-data" method="post" class="similar-form verify-form">
                            @csrf
                            <div class="verify-input-field">
                                <div>
                                    <label for="farm-name" class="input-labels">Farm Name</label>
                                    <input type="text" name="name" id="name" placeholder="eg gosven farm" class="input-field" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                    
                                    <label for="phone-number" class="input-labels">Phone Number</label>
                                    <input type="tel" name="phone" id="phone-number" placeholder="eg +234..." class="input-field" required>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="phone-number2" class="input-labels">Phone Number 2</label>
                                    <input type="tel" name="phone2" id="phone2" placeholder="eg +234..." class="input-field" required>
                                    @error('phone2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="nationality" class="input-labels">Nationality</label>
                                    <input type="text" name="nationality" id="nationality" placeholder="eg Nigerian" class="input-field" required>
                                    
                                    <label for="lga" class="input-labels">LGA</label>
                                    <input type="text" name="lga" id="lga" placeholder="eg Port Harcourt" class="input-field" required>
                                </div>
                                <div>
                                    <label for="address" class="input-labels">Address</label>
                                    <input type="text" name="address" id="address" placeholder="enter address here" class="input-field" required>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="address2" class="input-labels">Address 2</label>
                                    <input type="text" name="address2" id="address2" placeholder="enter address here" class="input-field" required>
                                    @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="state" class="input-labels">State</label>
                                    <input type="text" name="state" id="state" placeholder="Rivers" class="input-field" value="Rivers" required>

                                    <label for="goods" class="input-labels">Type Of Goods</label>
                                    <select name="tog[]" id="category" multiple data-live-search="true" class="input-field select-upload select-upload2 selectpicker form-control @error('tog') is-invalid @enderror" value="{{ old('tog') }}">
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
                            </div>
                                <p><span class="note-word">Note:</span>&nbsp; After filling the form below you are to be contacted by the Marketing team
                                    for checks that ensure the authenticity of sellers on the platform.
                                </p>
                                <input type="submit" value="Submit" class="similar-buttons verify-submit-btn">
                            </div>
                            
                        </form>
                    </div>
                </section>
            </main>
        </div>          
    </div>
    @include('partials.frontend._footerii')
    <script src="/js/script.js"></script>
    @if(Auth::check())
    <script src="/js/user.js"></script>
    @endif
</body>
</html>