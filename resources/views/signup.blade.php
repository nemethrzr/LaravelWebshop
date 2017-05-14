@extends('layouts.default')




@section('title','Regisztráció')
@section('content')

<div class="container">
<div class="main-login main-center col-md-6">
					<form class="form-horizontal" method="post" action="{{route('postsignup')}}">
						
						<div class="form-group">
							<label for="first_name" class="cols-sm-2 control-label">@lang('register.firstname')</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="first_name" id="first_name"  placeholder="@lang('register.enterfirstname')"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="last_name" class="cols-sm-2 control-label">@lang('register.lastname')</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="last_name" id="last_name"  placeholder="@lang('register.enterlastname')"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">@lang('register.email')</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="@lang('register.enteremail')"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="zipcode" class="cols-sm-2 control-label">@lang('register.zipcode')</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="zipcode" id="zipcode"  placeholder="@lang('register.enterzipcode')"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="city" class="cols-sm-2 control-label">@lang('register.city')</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="city" id="city"  placeholder="@lang('register.entercity')"/>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">@lang('register.password')</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="@lang('register.enterpassword')"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password_confirmation" class="cols-sm-2 control-label">@lang('register.confirmpassword')</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password_confirmation" id="password_confirm"  placeholder="@lang('register.enterconfirmpassword')"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">@lang('register.register')</button>
						</div>
						<div class="login-register">
				            <a href="index.php">Login</a>
				         </div>

				         {{csrf_field()}}
					</form>
				</div>

</div>









@endsection