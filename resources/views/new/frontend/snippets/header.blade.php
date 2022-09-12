<header class="header">
    <div class="header__container container">
        <div class="header__holder">
            <a href="{{ route('index') }}" class="header__logo">
                <img src="{{ asset('public/frontend/img/logo.svg') }}" alt="LogistiQuote logo">
            </a>
            <button type="button" class="header__burger">
                <span class="header__burger-item"></span>
            </button>
            <div class="header__wrapper">
                <div class="header__block">
                    <nav class="header__navigation">
                        <ul class="main-menu">
                            <li class="main-menu__item active">
                                <a href="https://iccwbo.org/publication/incoterms-2020-practical-free-wallchart" target="_blank" class="main-menu__link">Incoterms</a>
                            </li>
                            <li class="main-menu__item parent">
                                <a href="#" class="main-menu__link">Ports</a>
                                <div class="main-menu__sub">
                                    <ul class="sub-menu">
                                        <li class="sub-menu__item">
                                            <a  href="https://www.ashdodport.co.il/pages/default.aspx" target="_blank" class="sub-menu__link">
                                                <figure class="sub-menu__link-img">
                                                    <img src="{{ asset('public/frontend/img/ashdod-port.svg') }}" alt="Ashdod port">
                                                </figure>
                                                <div class="sub-menu__link-content">
                                                    <strong class="sub-menu__link-title">Ashdod port</strong>
                                                    <span class="sub-menu__link-text">About 40 kilometers south of Tel Aviv</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="sub-menu__item">
                                            <a href="https://www.haifaport.co.il/" target="_blank" class="sub-menu__link">
                                                <figure class="sub-menu__link-img">
                                                    <img src="{{ asset('public/frontend/img/haifa-port.svg') }}" alt="Haifa port">
                                                </figure>
                                                <div class="sub-menu__link-content">
                                                    <strong class="sub-menu__link-title">Haifa port</strong>
                                                    <span class="sub-menu__link-text">Israel`s leading Cruise Terminal and the only turnaround terminal in Israel</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="sub-menu__item">
                                            <a href="https://www.maman.co.il/he/3-1-3.asp" target="_blank" class="sub-menu__link">
                                                <figure class="sub-menu__link-img">
                                                    <img src="{{ asset('public/frontend/img/maman.svg') }}" alt="Maman">
                                                </figure>
                                                <div class="sub-menu__link-content">
                                                    <strong class="sub-menu__link-title">Maman</strong>
                                                    <span class="sub-menu__link-text">It is a full-service logistics</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="sub-menu__item">
                                            <a href="https://www.swissport.co.il/heb/Main/" target="_blank" class="sub-menu__link">
                                                <figure class="sub-menu__link-img">
                                                    <img src="{{ asset('public/frontend/img/swissport.svg') }}" alt="Swissport">
                                                </figure>
                                                <div class="sub-menu__link-content">
                                                    <strong class="sub-menu__link-title">Swissport</strong>
                                                    <span class="sub-menu__link-text">Swissport In</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="main-menu__item">
                                <a href="https://shaarolami-query.customs.mof.gov.il/CustomspilotWeb/he/CustomsBook" target="_blank" class="main-menu__link">Taxes and duties</a>
                            </li>
                            <li class="main-menu__item">
                                <a href="{{ route('contact_us') }}" class="main-menu__link">Company</a>
                            </li>
                            <li class="main-menu__item">
                                <a href="https://chat.google.com/u/0/api/get_attachment_url?url_type=DOWNLOAD_URL&attachment_token=AD3oLg2hZsRf6eLzoMZhiuOO8JRwGZdoihXs7aP2MV82YbUEFYf%2BPZZBkPRfI3I2nDamlfZvE6W%2BHQf27DJiPSQZq4jrNxaDveZXA9nbickjMn6sbpdJMnP07NQePnbMStVhQvVVlGs2aGYIbzMG8iVztJxqYHUUPJ3%2Bj7MRggLezG7i0a4IZypJx5wKtKPU1lyqt2VT61EHagCA4scjThRi7hCc31Vk5OR6xJRRG5ILc%2BfRykF%2F0UY2YJZi%2Biw9sJO%2F9gIvp%2BDvpkukgQrhtk%2FoFBv8s4KY89I231UKB765hiLljHbSdQMx9uy82W%2BliT7cU8P3eI8uLTssh%2FqDGHfB2snr4VtQu8jQEeeMUkh65W%2BovGhuxV7dfFbYhynkJZK7KTdDkVgGfE%2B%2FNwjG6SV1%2BORWgEBJ1jYWTJM%2BLeHFigyKq3F2%2BFqPlNFfSGVMW3T%2FpvA0Rb6R1zULxkkffwjT2SoNzIPi%2BXBiKtMKOKOdD4TJLfKWvjbuBTXdIyeiJs3VqgyoNd8pphCn1qH6LVv5RXrJVJZTE4%2FN0A%3D%3D&content_type=application%2Fvnd.openxmlformats-officedocument.wordprocessingml.document&auto=true" target="_blank" class="main-menu__link">Terms</a>
                            </li>
                            <li class="main-menu__item">
                                <a href="{{ route('login') }}" class="main-menu__link">Sign in</a>
                            </li>
                        </ul>
                    </nav>
                    <figure class="header__img">
                        <img src="{{ asset('public/frontend/img/airplane.svg') }}" alt="Airplane">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</header>
