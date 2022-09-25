<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"
        integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />

    <style>
    .main-head {
        height: 150px;
        background: #FFF;

    }

    .sidenav {
        height: 100%;
        background-color: rgb(28, 27, 56);
        overflow-x: hidden;
        padding-top: 20px;
    }


    .main {
        margin-top: 50px;
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }
    }

    @media screen and (max-width: 450px) {
        .login-form {
            margin-top: 10%;
        }

        .register-form {
            margin-top: 10%;
        }
    }

    @media screen and (min-width: 768px) {
        .main {
            margin-left: 51%;
        }

        .sidenav {
            width: 50%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
        }

        .login-form {
            margin-top: 80%;
            width: 80vh;
        }

        .register-form {
            margin-top: 20%;
        }
    }


    .login-main-text {
        margin-top: 10%;
        padding: 60px;
        color: #fff;
    }

    .login-main-text h2 {
        font-weight: 300;
    }

    .btn-black {
        background-color: #000 !important;
        color: #fff;
    }

    .socials {
        margin-top: 20%;
    }

    .socials a {

        width: 60px;
        height: 60px;
        background-color: #53c1b0;
        border-radius: 50%;
        -webkit-box-shadow: 0 3px 2px 0 #53c1b0;
        box-shadow: 0 3px 2px 0 #53c1b0;
        text-align: center;
        color: #fff;
        padding-top: 10px;
        font-size: 40px;
        margin-right: 20px;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }
    </style>
</head>

<body>
    <div class="sidenav">
        <div class="login-main-text">
            <img class="img-responsive mx-5" src="{{ asset('/img/alogo.png') }}" style='width:70%' alt="#" />

            <p style='color:#fff; font-size:15px;' class=" text-center mb-5">Join our medical platform, keep up with
                technology,<br> and benefit from our free online services</p>

            <div class="socials text-center">
                <h5 class=" my-5 text-white text-center">Follow Us</h5>
                <a href="#" class="zmdi zmdi-facebook"></a>
                <a href="#" class="zmdi zmdi-twitter"></a>
                <a href="#" class="zmdi zmdi-google"></a>
                <a href="#" class="zmdi zmdi-instagram"></a>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 ">
            <div class="login-form ">
                <form action='/LoginAdmin' method='post'>
                    @csrf
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="User Name" name='clinic_email'
                            value="{{ old('clinic_email') }}">
                    </div>
                    <div class="form-group mb-5">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name='pass'>
                    </div>
                    @if (session('message'))
                    <div class="alert alert-danger mb-5 " role="alert">
                        {{session('message')}}
                    </div>
                    @endif

                    @if (session('fail'))
                    <div class="alert alert-danger mb-5 " role="alert">
                        {{session('fail')}}
                    </div>
                    @endif
                    <div class="form-group text-center">
                        <button type="submit" class="btn btnMain mb-3  "
                            style='font-size:15px;width: 100%;'>Login</button>
                    </div>

                    <div class="mt-3 text-center mb-5">
                        <h6> Don't have an account? <a style='color:#53c1b0' href="/regAdmin"> Register</a></h6>
                    </div>


                </form>
            </div>
        </div>
    </div>
</body>

</html>