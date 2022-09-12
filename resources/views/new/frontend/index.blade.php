@extends('new.frontend.layouts.app')
@section('content')

    <main class="main">
    <section class="intro">
        <div class="intro__container container">
            <div class="intro__holder">
                <div class="intro__block">
                    <picture class="intro__img">
                        <source media="(max-width: 414px)" srcset="{{ asset('public/frontend/img/transport-mobile.svg') }}">
                        <img src="{{ asset('public/frontend/img/transport.svg') }}" alt="Transport">
                    </picture>
                    <div class="intro__content">
                        <strong class="intro__subtitle">Shipping to and from anywhere</strong>
                        <h1 class="intro__title">Find the best <br>freight quote</h1>
                        <figure class="intro__icon">
                            <img src="{{ asset('public/frontend/img/cube.svg') }}" alt="Cube">
                        </figure>
                    </div>
                </div>
                <div class="intro__tabs tabs">
                    <div class="tabs__titles titles">
                        <button type="button" class="tabs__title titles__item active">Freight Quotes</button>
                        <button type="button" class="tabs__title titles__item">Container Tracking</button>
                    </div>
                    <div class="tabs__blocks">
                        <div class="tabs__block active">
                            <div class="tabs__content">
                                <form action="{{ route('get_quote_step1') }}" method="POST" class="form" name="freight-quotes" autocomplete="off">


                                        @csrf
                                    <div class="form__routes">
                                        <div class="form__routes-item">
                                            <input type="radio" id="route-ocean" name="transportation_type" value="sea" checked>
                                            <label for="route-ocean">Ocean</label>
                                        </div>
                                        <span class="form__routes-text">VIA</span>
                                        <div class="form__routes-item">
                                            <input type="radio" id="route-air" name="transportation_type" value="air" >
                                            <label for="route-air">Air</label>
                                        </div>
                                    </div>
                                    <div class="form__flex">
                                        <div class="input">
                                            <div class="input__holder">
                                                <label for="shipment-origin">Port, Country, City, Zip</label>
                                                <input type="text" id="shipment-origin" name="origin" required>
                                                <button type="button" aria-label="Close"></button>
                                            </div>
                                            <span class="input__text">Origin of shipment</span>
                                        </div>
                                        <div class="input">
                                            <div class="input__holder">
                                                <label for="shipment-destination">Port, Country, City, Zip</label>
                                                <input type="text" id="shipment-destination" name="destination" required>
                                                <button type="button" aria-label="Close"></button>
                                            </div>
                                            <span class="input__text">Destination of shipment</span>
                                        </div>
                                    </div>
                                    <div class="form__flex">
                                        <div class="input">
                                            <label for="date" class="sr-only">Ready to load</label>
                                            <input type="text" id="date"  name="date" class="calendar">
                                            <span class="input__text">Ready to load</span>
                                        </div>
                                        <div class="route route-select input active" data-route="sea">
                                            <label for="ocean-shipment" class="sr-only">Type of shipment</label>
                                            <select id="ocean-shipment" name="type">
                                                <option value="fcl">Fcl</option>
                                                <option value="lcl">Lcl</option>
                                            </select>
                                            <span class="input__text">Select sealine</span>
                                        </div>
                                        <div class="route route-radio input" data-route="air">
                                            <label for="air-shipment">Air</label>
                                            <input type="radio" id="air-shipment" name="type" value="air" readonly>
                                            <span class="input__text">Type of shipment</span>
                                        </div>
                                    </div>
                                    <button type="submit" class="form__submit">QUOTE</button>
                                </form>
                            </div>
                        </div>
                        <div class="tabs__block">
                            <div class="tabs__content">
                                <form method="GET" action="https://www.track-trace.com" target="_blank" class="form" name="container-tracking">
                                    <div class="form__flex">
                                        <div class="input">
                                            <div class="input__holder">
                                                <label for="tracking-number">Container Number/Code</label>
                                                <input type="text" id="tracking-number" name="container" pattern="[A-Za-z0-9\-]{5,}">
                                                <button type="button" aria-label="Close"></button>
                                            </div>
                                            <span class="input__text">Tracking number</span>
                                        </div>
                                        <div class="input">
                                            <label for="sealine" class="sr-only">Select sealine</label>
                                            <select name="sealine" id="sealine">
                                                <option value="0">Auto Detect</option>
                                                <option value="14">APL</option>
                                                <option value="2">ARKAS</option>
                                                <option value="15">CMA CGM</option>
                                                <option value="5">COSCO</option>
                                                <option value="6">EVERGREEN</option>
                                                <option value="4">HAMBURG SUD</option>
                                                <option value="7">HAPAG-LLOYD</option>
                                                <option value="104">HYUNDAI</option>
                                                <option value="10">MAERSK</option>
                                                <option value="1">MSC</option>
                                                <option value="88">ONE</option>
                                                <option value="17">OOCL</option>
                                                <option value="111">SAFMARINE</option>
                                                <option value="112">SEALAND</option>
                                                <option value="124">SINOKOR</option>
                                                <option value="69">TURKON</option>
                                                <option value="97">WAN HAI</option>
                                                <option value="18">YANG MING</option>
                                                <option value="13">ZIM</option>
                                            </select>
                                            <span class="input__text">Select sealine</span>
                                        </div>
                                    </div>
                                    <button type="submit" class="form__submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <section class="benefits">
            <div class="benefits__container container">
                <h2 class="benefits__title">Why LogistiQuote</h2>
                <div class="benefits__holder">
                    <div class="benefits__list">
                        <article class="benefits__item">
                            <h2 class="benefits__item-title">
                                <img src="{{asset('public/frontend/img/box.svg')}}" alt="Box">
                                Benefit 1
                            </h2>
                            <p class="benefits__item-text">Customs classifier and freight forwarding for logistics facilities.</p>
                        </article>
                        <article class="benefits__item">
                            <h2 class="benefits__item-title">
                                <img src="{{asset('public/frontend/img/box.svg')}}" alt="Box">
                                Benefit 2
                            </h2>
                            <p class="benefits__item-text">Wide coverage throughout Israel.</p>
                        </article>
                        <article class="benefits__item">
                            <h2 class="benefits__item-title">
                                <img src="{{asset('public/frontend/img/box-2.svg')}}" alt="Box">
                                Benefit 3
                            </h2>
                            <p class="benefits__item-text">Dedicated personnel available 24/7.</p>
                        </article>
                        <article class="benefits__item">
                            <h2 class="benefits__item-title">
                                <img src="{{asset('public/frontend/img/box.svg')}}" alt="Box">
                                Benefit 4
                            </h2>
                            <p class="benefits__item-text">1 STOP SHOP for supply chain.</p>
                        </article>
                        <article class="benefits__item">
                            <h2 class="benefits__item-title">
                                <img src="{{asset('public/frontend/img/box.svg')}}" alt="Box">
                                Benefit 5
                            </h2>
                            <p class="benefits__item-text"> Our recognition with the Israel logistics.</p>
                        </article>
                        <article class="benefits__item">
                            <h2 class="benefits__item-title">
                                <img src="{{asset('public/frontend/img/box.svg')}}" alt="Box">
                                Benefit 6
                            </h2>
                            <p class="benefits__item-text">Our solutions.</p>
                        </article>
                        <article class="benefits__item">
                            <h2 class="benefits__item-title">
                                <img src="{{asset('public/frontend/img/box-3.svg')}}" alt="Box">
                                Benefit 7
                            </h2>
                            <p class="benefits__item-text">Our industry specific professional team.</p>
                        </article>
                        <article class="benefits__item">
                            <h2 class="benefits__item-title">
                                <img src="{{asset('public/frontend/img/box.svg')}}" alt="Box">
                                Benefit 8
                            </h2>
                            <p class="benefits__item-text"> Excellent relationships with forwarders, and governmental ministries.</p>
                        </article>
                        <article class="benefits__item">
                            <h2 class="benefits__item-title">
                                <img src="{{asset('public/frontend/img/box-4.svg')}}" alt="Box">
                                Benefit 9
                            </h2>
                            <p class="benefits__item-text">Our knowledge In the project planning logistics solutions providers and for infrastructure.</p>
                        </article>
                    </div>
                    <figure class="benefits__img">
                        <img src="{{asset('public/frontend/img/benefits.svg')}}" alt="Benefits">
                    </figure>
                </div>
            </div>
        </section>
</main>
@endsection
