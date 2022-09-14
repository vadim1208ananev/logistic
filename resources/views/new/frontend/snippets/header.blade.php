<header class="header">
    <div class="header__container container">
        <div class="header__holder">
            <a href="{{ route('index') }}" class="header__logo">
                <img src="{{ asset('public/frontend/img/logo.svg') }}" alt="LogistiQuote logo">
            </a>
            @guest
            @else
            <div class="header__user user-block" tabindex="0">
                <button type="button" class="user-block__btn">
                    @if(Auth::user()->image)
                        <img src="{{asset('public/images').'/'.Auth::user()->image}}" alt="Avatar">
                        @else
                    <img src="{{asset('public/frontend/img/avatar.png')}}" alt="Avatar">
                       @endif
                </button>
                <div class="user-block__window">
                    <div class="user-block__info">
                        <strong class="user-block__title">{{ Auth::user()->name }}</strong>
                        @if (Auth::user()->role=="user")

                            <p class="user-block__text">{{ Auth::user()->role }}</p>
                        @endif
                        @if (Auth::user()->role=="vendor")

                            <p class="user-block__text">Forwarder</p>
                        @endif




                        <p class="user-block__text">Profile ID: {{ Auth::user()->id }}</p>
                    </div>
                    <div class="user-block__links">
                        <a href="{{ route('user') }}" class="user-block__link">
                            <svg width="30" height="26" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.75 10.3001L17.35 11.7501C16.5 12.2501 15.6 12.7001 14.7501 13.1001C14.5 13.2001 14.2 13.3501 13.9 13.5001C12.85 14.0501 12.3 15.2001 12.55 16.3501C12.75 17.2501 13.5 18.0001 14.4 18.2001C14.6 18.2501 14.8 18.2501 15 18.2501C15.95 18.2501 16.8 17.7001 17.25 16.8501C17.35 16.6001 17.5 16.3001 17.65 16.0001C18.1 15.1501 18.5001 14.2501 19 13.4001L20.4501 11.0001C20.5501 10.8001 20.5 10.6001 20.35 10.4001C20.2 10.2001 19.95 10.2001 19.75 10.3001ZM18.15 12.8501C17.6 13.7501 17.15 14.6501 16.75 15.5501C16.65 15.8501 16.5 16.1001 16.35 16.4001C16.05 17.0501 15.35 17.3501 14.65 17.2001C14.1 17.1001 13.65 16.6501 13.5501 16.1001C13.4001 15.4001 13.7001 14.7001 14.35 14.4001C14.6001 14.2501 14.9001 14.1501 15.2001 14.0001C16.1001 13.5501 17.05 13.1001 17.9001 12.6001L18.55 12.2001L18.15 12.8501Z" fill="#E78200"/>
                                <path d="M28.9288 10.1997C28.9225 10.166 28.913 10.1326 28.9 10.1C28.887 10.0673 28.8703 10.0373 28.851 10.0099C28.1017 8.21602 27.0132 6.59596 25.6665 5.23072C25.6475 5.20248 25.6254 5.17541 25.6 5.14998C25.5746 5.12455 25.5475 5.10246 25.5193 5.08348C22.8066 2.40779 19.0877 0.75 15 0.75C13.0419 0.75 11.1686 1.13086 9.44971 1.82115C9.41602 1.82748 9.38256 1.83697 9.35004 1.84998C9.3174 1.86305 9.2874 1.87969 9.25998 1.89902C7.46607 2.64826 5.84602 3.73682 4.48078 5.08348C4.45254 5.10246 4.42547 5.12455 4.40004 5.14998C4.37461 5.17541 4.35246 5.20248 4.33354 5.23072C1.65779 7.94338 0 11.6623 0 15.75C0 19.15 1.09998 22.4 3.25002 25.05C3.35004 25.2 3.50004 25.25 3.65004 25.25H26.35C26.5 25.25 26.65 25.2 26.75 25.05C28.9 22.4 30 19.15 30 15.75C30 13.7919 29.6191 11.9186 28.9288 10.1997ZM26.15 24.25H3.9C3.22389 23.3781 2.66238 22.4428 2.21865 21.46L3.6 20.9C3.85002 20.8 3.94998 20.5 3.85002 20.2501C3.75 20 3.45 19.9001 3.20004 20L1.84594 20.549C1.34355 19.1813 1.06113 17.7353 1.00934 16.25H4.5C4.8 16.25 4.99998 16.0501 4.99998 15.7501C4.99998 15.4501 4.8 15.25 4.5 15.25H1.00998C1.06605 13.6734 1.38592 12.1612 1.92686 10.7562L3.3 11.35C3.34998 11.4 3.45 11.4 3.49998 11.4C3.69996 11.4 3.84996 11.3 3.94998 11.1C4.05 10.85 3.94998 10.55 3.69996 10.45L2.31293 9.85019C2.93982 8.51244 3.77227 7.28842 4.7693 6.21932L5.79996 7.24998C5.89998 7.35 5.99994 7.39998 6.14994 7.39998C6.29994 7.39998 6.39996 7.35 6.49992 7.24998C6.6999 7.05 6.6999 6.75 6.49992 6.54996L5.46926 5.5193C6.58939 4.47469 7.87928 3.61025 9.29215 2.9741L9.84996 4.35C9.89994 4.54998 10.1 4.65 10.3 4.65C10.3499 4.65 10.4 4.65 10.4999 4.60002C10.75 4.5 10.8499 4.2 10.75 3.95004L10.2033 2.60168C11.5522 2.1058 12.997 1.81348 14.5 1.76004V5.25006C14.5 5.55006 14.6999 5.75004 14.9999 5.75004C15.2999 5.75004 15.4999 5.55006 15.4999 5.25006V1.75998C17.0765 1.81605 18.5887 2.13592 19.9937 2.67686L19.3999 4.05006C19.2999 4.30008 19.3999 4.60008 19.6499 4.70004C19.6999 4.75002 19.7999 4.75002 19.8499 4.75002C20.0499 4.75002 20.2499 4.60002 20.2999 4.45002L20.8997 3.06299C22.2375 3.68988 23.4615 4.52232 24.5306 5.51936L23.5 6.55002C23.3 6.75 23.3 7.05 23.5 7.25004C23.6 7.35006 23.6999 7.40004 23.8499 7.40004C23.95 7.40004 24.1 7.35006 24.1999 7.25004L25.2306 6.21937C26.2752 7.33951 27.1396 8.62939 27.7758 10.0423L26.3999 10.6001C26.1499 10.7001 26.0499 11.0001 26.1499 11.2501C26.1998 11.45 26.3999 11.5501 26.5999 11.5501C26.6498 11.5501 26.6999 11.5001 26.7998 11.5001L28.1483 10.9535C28.6441 12.3023 28.9365 13.7471 28.9899 15.2501H25.5C25.2 15.2501 25 15.4501 25 15.7501C25 16.0501 25.2 16.25 25.5 16.25H28.9907C28.9364 17.8082 28.6291 19.3233 28.0873 20.75L26.7 20.15C26.45 20.05 26.15 20.15 26.05 20.4001C25.95 20.6501 26.05 20.9501 26.3 21.05L27.7052 21.6577C27.2838 22.5683 26.764 23.4368 26.15 24.25Z" fill="#E78200"/>
                            </svg>
                            Dashboard
                        </a>
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();   document.getElementById('logout-form').submit();" class="user-block__link">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 7.40665V22.5933C0 24.6859 1.70712 26.393 3.79971 26.393H16.0738C18.1664 26.393 19.8735 24.6859 19.8735 22.5933V20.1335C19.8735 19.7175 19.537 19.3809 19.1209 19.3809C18.7049 19.3809 18.3683 19.7175 18.3683 20.1335V22.5933C18.3683 23.8598 17.3343 24.8939 16.0677 24.8939H3.79971C2.53314 24.8939 1.49908 23.8598 1.49908 22.5933V7.40665C1.49908 6.14008 2.53314 5.10602 3.79971 5.10602H16.0738C17.3404 5.10602 18.3745 6.14008 18.3745 7.40665V9.86637C18.3745 10.2824 18.711 10.619 19.1271 10.619C19.5431 10.619 19.8797 10.2824 19.8797 9.86637V7.40665C19.8797 5.31405 18.1725 3.60693 16.08 3.60693H3.79971C1.70712 3.60693 0 5.30793 0 7.40665Z" fill="#E78200"/>
                                <path d="M23.5815 20.6598C23.7284 20.8066 23.9181 20.88 24.1138 20.88C24.3096 20.88 24.4993 20.8066 24.6462 20.6598L29.7798 15.5262C30.0735 15.2325 30.0735 14.7613 29.7798 14.4676L24.6462 9.33404C24.3525 9.04035 23.8813 9.04035 23.5876 9.33404C23.2939 9.62774 23.2939 10.0989 23.5876 10.3926L27.4424 14.2474H13.3755C12.9595 14.2474 12.6229 14.5839 12.6229 15C12.6229 15.416 12.9595 15.7526 13.3755 15.7526H27.4363L23.5815 19.6073C23.2878 19.8949 23.2878 20.3722 23.5815 20.6598Z" fill="#E78200"/>
                            </svg>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            @endguest

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
                            @guest
                            <li class="main-menu__item">

                                <a href="{{ route('login') }}" class="main-menu__link">Sign in</a>

                            </li>
                            @endguest
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
