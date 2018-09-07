


@extends('required/HTML')

@section('connexion')<br /><br /><br />
	
	<div class="ui container">
		<div class="ui grid">
			<div class="row">
				<div class="column sixteen wide computer"><br />

                <h3><i class="sign in icon"></i>Connexion à un compte</h3><br />

                @if($message = Session::get('error'))

                    <div class="ui red segment" style="color: red;">
                        <b>{{$message }}</b>
                    </div>

                @endif

                <form method="post" action="{{ url('checklogin') }}">

                {{ csrf_field() }}

                <div class="ui two column middle aligned very relaxed stackable grid">
                    <div class="column">
                        <div class="ui form">
                        <div class="field">
                            <label>Username</label>
                            <div class="ui left icon input">
                            <input type="text" placeholder="Username" name="email">
                            <i class="user icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <div class="ui left icon input">
                            <input type="password" placeholder="********" name="password">
                            <i class="lock icon"></i>
                            </div>
                        </div>
                        <button type="submit" class="ui blue submit button" style="border-radius: 2px;"><i class="sign in icon"></i>Login</button>
                        </div>
                    </div>
                   
                    <div class="center aligned column">
                        <a href="{{'inscription'}}" class="ui big green labeled icon button" style="border-radius: 2px;">
                        <i class="signup icon"></i>
                        Inscription
                        </a>
                    </div>
                    </div>
				</div>
                </form>

			</div>
		</div>
	</div>

@endsection