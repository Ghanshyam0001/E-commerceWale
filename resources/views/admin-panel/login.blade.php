<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ env('APP_NAME') }} | </title>

  <!-- Bootstrap -->

  <link href="{{asset('admin-panel/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">


  <!-- Custom Theme Style -->
  <link href="{{asset('admin-panel/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <h1>Login Form</h1>

           

            <div>
              <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" />
            </div>

            <div>
              <input type="password" name="password" class="form-control" placeholder="Password" />
            </div>

            <div>
              <button type="submit" class="btn btn-default">
                Log in
              </button>
             
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">New to site?
                <a href="{{ route('admin.register') }}" class="to_register"> Create Account </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i> {{ env('APP_NAME') }}</h1>
                <p>©2026 All Rights Reserved.</p>
              </div>
            </div>
          </form>
           {{-- Error Messages --}}
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

        </section>
      </div>


    </div>
  </div>
</body>

</html>