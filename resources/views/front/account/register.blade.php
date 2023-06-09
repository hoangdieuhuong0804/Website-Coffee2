@extends('front.layout.master')

@section('title', 'Register')

@section('body')

    <!-- Breadcrumb (định vị vị trí ở web) -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./index.html"><i class="fa fa-home">Trang Chủ</i></a>
                        <span>Đăng kí</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Breadcrumb (định vị vị trí ở web) -->

    <!-- Đăng kí -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Đăng kí</h2>

                        @if(session('notification'))
                            <div class="alert alert-warning" role="alert">
                                {{session('notification')}}
                            </div>
                        @endif

                        <form action="" method="POST">
                            @csrf
                            <div class="group-input">
                                <label for="email">Name <span>*</span></label>
                                <input type="text" id="name" name="name">
                            </div>
                            <div class="group-input">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" id="email" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu <span>*</span></label>
                                <input type="text" id="pass" name="password">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Xác nhận mật khẩu <span>*</span></label>
                                <input type="text" id="con-pass" name="password_confirmation">
                            </div>
                            <button type="submit" class="site-btn register-btn">Đăng kí</button>
                        </form>
                        <!-- Switch login to sign up -->
                        <div class="switch-login">
                            <a href="./account/login" class="or-login">Hoặc Đăng nhập!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END Đăng kí -->

@endsection
