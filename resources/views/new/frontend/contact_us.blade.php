@extends('new.frontend.layouts.app')
@section('content')

    <main class="main">
        <div class="single-page contact">
            <div class="single-page__container container">
                <h1 class="single-page__title">CONTACT US</h1>
                <div class="contact__block">
                    <div class="contact__block-item">
                        <strong class="contact__block-title">Address</strong>
                        <span> <a href="https://goo.gl/maps/m7BaCDZjdJsrPUff6" target="_blank">
                            Moshe Aviv St 4 Or Yehuda, Tel Aviv Israel
                        </a></span>
                    </div>
                    <div class="contact__block-item">
                        <strong class="contact__block-title">Email</strong>
                        <a href="mailto:support@logistiquote.com">support@logistiquote.com</a>
                    </div>
                </div>
                <form action="{{ route('contact') }}" method="POST" class="single-page__form form" name="contact-us">
                    @csrf
                    <div class="form__flex">
                        <div class="input">
                            <div class="input__holder">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" required>
                                <button type="button" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="input">
                            <div class="input__holder">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" required>
                                <button type="button" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <div class="form__flex">
                        <div class="input">
                            <div class="input__holder">
                                <label for="phone">Phone</label>
                                <input type="number" id="phone" name="phone" required>
                                <button type="button" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="input">
                            <div class="input__holder">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" name="email"required>
                                <button type="button" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <div class="textarea input">
                        <label for="message" class="sr-only">Message</label>
                        <textarea name="message" id="message" spellcheck="false"></textarea>
                        <span class="input__text">Message</span>
                    </div>
                    <button type="submit" class="form__submit">Next</button>
                </form>
            </div>
        </div>
    </main>

@endsection
