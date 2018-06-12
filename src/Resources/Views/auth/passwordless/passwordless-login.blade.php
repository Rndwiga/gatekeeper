@extends(config(\Rndwiga\Base\BaseHelper::getActiveTheme(true)))
@section('content')
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <h1>Login Form</h1>
                        @if(\Illuminate\Support\Facades\Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username" required="" autofocus />
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary submit" type="submit" >Log in</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="{{ route('register') }}" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> {{config('app.name')}}</h1>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection