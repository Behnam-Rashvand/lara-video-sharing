@extends('auth-layout')

@section('class-body' , 'log_in_page')

@section('content')
  <!--======= log_in_page =======-->
  <div id="log-in" class="site-form log-in-form">
      
    <div id="log-in-head">
      <h1>ورود</h1>
      <div id="logo"><a href="{{ route('home') }}"><img src="{{ Vite::image('logo.png') }}" alt=""></a></div>
  </div>
  
  <div class="form-output">
      <form action="{{ route('login.store') }}" method="POST">
        <x-validation-error />
        @csrf
          <div class="form-group label-floating">
              <label class="control-label">ایمیل</label>
              <input class="form-control" placeholder="" name="email" type="email">
          </div>
          <div class="form-group label-floating">
              <label class="control-label">رمز عبور</label>
              <input name="password" class="form-control" placeholder="" type="password">
          </div>
          
          <div class="remember">
              <div class="checkbox">
                  <label>
                      <input name="remember" type="checkbox">
                          مرا به خاطر بسپار
                  </label>
              </div>
              <a href="#" class="forgot">رمز عبور من را فراموش کرده ام</a>
          </div>
          
          <button class="btn btn-lg btn-primary full-width">ورود</button>

        <div class="or"></div>


          <p>آیا شما یک حساب کاربری ندارید؟ <a href="{{ route('register.create') }}">ثبت نام کنید!</a> </p>
      </form>
  </div>
</div>
<!--======= // log_in_page =======-->
@endsection