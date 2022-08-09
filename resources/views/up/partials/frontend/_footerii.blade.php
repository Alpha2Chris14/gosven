<footer>
        <div class="subscribe-NewsLetter-Container">
            <div class="subscribe-text">
                <p class="subscribe">Subscribe to NewsLetter</p>
                <p class="subscribe-detail">Sign up to get latest information about latest
                    products from our farms and also promotions,
                    discount deals
                </p>
            </div>
            <form action="" class="subscribe-form">
                <input type="email" name="subscribe-email" id="subscribe-email" 
                class="subscribe-input" required>
                <input type="submit" value="Sign up" class="btn-subscribe-email">
            </form>
        </div>
        <div class="addition-container">
            <div class="additional-link-container">
                <ul class="link-container">
                    <li class="additional-list"><a href="{{route('terms')}}" class="additional-link-item">Terms and Conditions</a></li>
                    <li class="additional-list"><a href="" class="additional-link-item">Services</a></li>
                    <li class="additional-list"><a href="{{route('return_policy')}}" class="additional-link-item">Return Policy</a></li>
                </ul>
                <ul class="link-container payment-link-container">
                    <li class="additional-list"><a href="" class="additional-link-item">Payments</a></li>
                    <div class="visa-mastercard-container">
                        <img src="/images/master-card.svg" alt="pay with master card" loading="lazy">
                        <img src="/images/visa.svg" alt="pay with visa" loading="lazy">
                    </div>
                    <a href="https://www.flutterwave.com">
                        <picture>
                            <source media="(min-width: 768px)" srcset="/images/flutterwave-desktop.svg">
                            <img src="/images/flutterwave-mobile.svg" alt="Flutter wave" loading="lazy" class="flutterwave-mobile">
                        </picture>
                    </a>
                </ul>
                <ul class="link-container">
                    <li class="additional-list list-align-right"><a href="{{route('privacy_policy')}}" class="additional-link-item">Privacy Policies</a></li>
                    <li class="additional-list list-align-right"><a href="" class="#">Deliveries</a></li>
                    <li class="additional-list list-align-right"><a href="{{route('about')}}" class="additional-link-item">About Us</a></li>
                </ul>
            </div>
            <small>Copyright &copy; 2020 marketlada.com. All rights reserved</small>
        </div>
    </footer>