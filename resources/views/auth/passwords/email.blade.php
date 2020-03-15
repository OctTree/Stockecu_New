@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="logo">
	<a href="/" style="text-decoration: none;">
    {{-- <img src="../../assets/admin/layout3/img/logo-big.png" alt=""/> --}}
    <div class="title m-b-md" style="font-size: 40px; margin-bottom: 30px; font-weight: bold; color:white;">
        Daily Receiving 4.0
    </div>
	</a>
</div>
<div class="container">
    <div  class="col-md-4 col-md-offset-4" style="color:white!important;">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="forget-form" action="{{ route('password.email') }}" method="post" >
            {{ csrf_field() }}
            <h3>Forget Password ?</h3>
            <p>
                 Enter your e-mail address below to reset your password.
            </p>
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" value="{{ old('email') }}" required/>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-actions">
                <a type="button" href="{{ route('login') }}" id="back-btn" class="btn btn-primary">
                <i class="m-icon-swapleft"></i> Back </a>
                <button type="submit" class="btn blue pull-right">
                Submit <i class="m-icon-swapright m-icon-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    jQuery(document).ready(function() {     
      Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
         Login.init();
          Demo.init();
           // init background slide images
           $.backstretch([
            "../../assets/admin/pages/media/bg/1.jpg",
            "../../assets/admin/pages/media/bg/2.jpg",
            "../../assets/admin/pages/media/bg/3.jpg",
            "../../assets/admin/pages/media/bg/4.jpg"
            ], {
              fade: 1000,
              duration: 8000
        }
        );
    });
</script>
@endsection
