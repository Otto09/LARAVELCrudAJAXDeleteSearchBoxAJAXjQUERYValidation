@extends('layouts.app')

@section('content')

@if(!isset($user))
<!--ADD new user-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ADD') }}</div>

                <div class="card-body">
                    <form method="POST" action="/users">
                        @csrf
                        <input type="hidden" id="id">
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="username_span">This field is required</span>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="password_span">This field is required</span>
                        </div>
                        <!--
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="name_span">This field is required</span>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="surname_span">This field is required</span>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="email_span">This field is required</span>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="phone_span">This field is required</span>
                        </div>

                        <!--ADD new user button-->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="submit();" id="add_submit">
                                    {{ __('ADD') }}
                                </button>
                            </div>
                        </div>

                        <!--Logout button-->
                        <a href="{{ route('logout') }}" class="btn btn-primary btn-lg active float-right" role="button"
                        aria-pressed="true" style="margin-right: 15px;">{{ __('Logout') }}</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

  // Username can't be blank
  $('#username').on('input', function() {
    var input=$(this);
    var is_username=input.val();
    if(!is_username){
      $('#username_span').removeClass("error").addClass("error_show");
    } else {
      $('#username_span').removeClass("error_show").addClass("error");
    }
  });

  // Password can't be blank
  $('#password').on('input', function() {
    var input=$(this);
    var is_password=input.val();
    if(!is_password){
      $('#password_span').removeClass("error").addClass("error_show");
    } else {
      $('#password_span').removeClass("error_show").addClass("error");
    }
  });

  // Name can't be blank
  $('#name').on('input', function() {
    var input=$(this);
    var is_name=input.val();
    if(!is_name){
      $('#name_span').removeClass("error").addClass("error_show");
    } else {
      $('#name_span').removeClass("error_show").addClass("error");
    }
  });

  // Surname can't be blank
  $('#surname').on('input', function() {
    var input=$(this);
    var is_surname=input.val();
    if(!is_surname){
      $('#surname_span').removeClass("error").addClass("error_show");
    } else {
      $('#surname_span').removeClass("error_show").addClass("error");
    }
  });

  // Email can't be blank
  $('#email').on('input', function() {
    var input=$(this);
    var is_email=input.val();
    if(!is_email){
      $('#email_span').removeClass("error").addClass("error_show");
    } else {
      $('#email_span').removeClass("error_show").addClass("error");
    }
  });

  // Phone can't be blank
  $('#phone').on('input', function() {
    var input=$(this);
    var is_phone=input.val();
    if(!is_phone){
      $('#phone_span').removeClass("error").addClass("error_show");
    } else {
      $('#phone_span').removeClass("error_show").addClass("error");
    }
  });

  // After Form-Group Submitted Validation
  $("#add_submit button").click(function(event){
    var form_data=$(":input").serializeArray();
    if(!form_data){event.preventDefault();}
  });

});
</script>

@else
<!--EDIT user-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDIT') }}</div>

                <div class="card-body">
                    <form method="POST" action="/users/{{ $user->id }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="username_span">This field is required</span>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ Hash::make('password') }}">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="password_span">This field is required</span>
                        </div>
                        <!--
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="name_span">This field is required</span>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ $user->surname }}" autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="surname_span">This field is required</span>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="email_span">This field is required</span>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}" autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="error" id="phone_span">This field is required</span>
                        </div>

                        <!--EDIT user button-->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="edit_submit">
                                    {{ __('EDIT') }}
                                </button>
                            </div>
                        </div>

                        <!--Logout button-->
                        <a href="{{ route('logout') }}" class="btn btn-primary btn-lg active float-right" role="button"
                        aria-pressed="true" style="margin-right: 15px;">{{ __('Logout') }}</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

  // Username can't be blank
  $('#username').on('input', function() {
    var input=$(this);
    var is_username=input.val();
    if(!is_username){
      $('#username_span').removeClass("error").addClass("error_show");
    } else {
      $('#username_span').removeClass("error_show").addClass("error");
    }
  });

  // Password can't be blank
  $('#password').on('input', function() {
    var input=$(this);
    var is_password=input.val();
    if(!is_password){
      $('#password_span').removeClass("error").addClass("error_show");
    } else {
      $('#password_span').removeClass("error_show").addClass("error");
    }
  });

  // Name can't be blank
  $('#name').on('input', function() {
    var input=$(this);
    var is_name=input.val();
    if(!is_name){
      $('#name_span').removeClass("error").addClass("error_show");
    } else {
      $('#name_span').removeClass("error_show").addClass("error");
    }
  });

  // Surname can't be blank
  $('#surname').on('input', function() {
    var input=$(this);
    var is_surname=input.val();
    if(!is_surname){
      $('#surname_span').removeClass("error").addClass("error_show");
    } else {
      $('#surname_span').removeClass("error_show").addClass("error");
    }
  });

  // Email can't be blank
  $('#email').on('input', function() {
    var input=$(this);
    var is_email=input.val();
    if(!is_email){
      $('#email_span').removeClass("error").addClass("error_show");
    } else {
      $('#email_span').removeClass("error_show").addClass("error");
    }
  });

  // Phone can't be blank
  $('#phone').on('input', function() {
    var input=$(this);
    var is_phone=input.val();
    if(!is_phone){
      $('#phone_span').removeClass("error").addClass("error_show");
    } else {
      $('#phone_span').removeClass("error_show").addClass("error");
    }
  });

  // After Form-Group Submitted Validation
  $("#edit_submit button").click(function(event){
    var form_data=$(":input").serializeArray();
    if(!form_data){event.preventDefault();}
  });

});
</script>

@endif
@endsection
