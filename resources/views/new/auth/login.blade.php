
@extends('new.frontend.layouts.app')
@section('content')
<main class="main">
    <div class="single-page login">
        <div class="single-page__container container">
            <h1 class="single-page__title">Sign in</h1>

                <form class="single-page__form form" action="{{ route('login') }}" method="POST">
                    @csrf
                <div class="input">
                    <div class="input__holder  @error('email') error @enderror">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" autocomplete="off" autocapitalize="off" spellcheck="false">
                        <button type="button" aria-label="Close"></button>
                    </div>
                    @error('email')
                    <p class="errorInputMsg">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input">
                    <div class="input__holder @error('password') error @enderror">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" autocomplete="off">
                        <button type="button" aria-label="Close"></button>
                    </div>
                    @error('password')
                    <p class="errorInputMsg">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="form__submit">Sign in</button>
            </form>
            <div class="single-page__footer">
                <h2 class="single-page__footer-title">Don't have a LogistiQuote account yet?</h2>
                <div class="single-page__footer-links">
                    <a href="{{ route('register') }}" class="single-page__footer-link">Sign Up</a>
                    <a href="{{ route('password.request') }}" class="single-page__footer-link">Forgot Password?</a>
                </div>
                <p class="single-page__footer-text">By signing in or creating an account, you agree with our <a href="https://docs.google.com/document/d/1ekmQw-GAlQS33g1J9r1_iutdKcbZ-uQJt0yEfYUR6xc/edit">Terms & conditions</a></p>
            </div>
        </div>
    </div>
</main>
@endsection
