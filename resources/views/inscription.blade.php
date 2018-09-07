


@extends('required/HTML')

@section('connexion')<br /><br /><br />
	
	<div class="ui container">
		<div class="ui grid">
			<div class="row">
				<div class="column sixteen wide computer"><br />

                <h3><i class="signup icon"></i>Création de compte</h3><br />

                <div class="ui two column middle aligned very relaxed stackable grid">
                    <div class="column">
                        <div class="ui form">
                        <div class="field">
                            <label>Username</label>
                            <div class="ui left icon input">
                            <input type="text" placeholder="Username">
                            <i class="user icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <div class="ui left icon input">
                            <input type="password">
                            <i class="lock icon"></i>
                            </div>
                        </div>
                            <button class="ui blue submit button" style="border-radius: 2px;"><i class="edit icon"></i>S'inscrire</button>
                        </div>
                    </div>
                    
                    </div>
				</div>
			</div>
		</div>
	</div>

@endsection