<div class="">
	<a class="hiddenanchor" id="toregister"></a> <a class="hiddenanchor"
		id="tologin"></a>

	<div id="wrapper">
		<div id="login" class="animate form">
			<section class="login_content">
				<form action="<?=base_url()?>account/user-login" id="login-form">
					<h1>Login Form</h1>
					<span class="error-msg"><span class="msg">&nbsp;</span></span>
					<div>
						<input id="username" type="text" class="form-control"
							placeholder="Username" required="required" />
					</div>
					<div>
						<input id="password" type="password" class="form-control"
							placeholder="Password" required="" />
					</div>
					<div>
						<button id="loginBtn" class="btn btn-default submit" type="submit">Log in</button>
						<a class="reset_pass" href="#">Lost your password?</a>
					</div>
					<div class="clearfix"></div>
					<div class="separator">
						<p class="change_link">
							New to site? <a href="#toregister" class="to_register"> Create
								Account </a>
						</p>
						<div class="clearfix"></div>
						<br />
						<div>
							<h1>Muscle and Science</h1>
							<p>&#169; 2015 All Rights Reserved. Muscle and Science. Privacy
								and Terms</p>
						</div>
					</div>
				</form>
				<!-- form -->
			</section>
			<!-- content -->
		</div>
		<div id="register" class="animate form">
			<section class="login_content">
				<form>
					<h1>Create Account</h1>
					<div>
						<input type="text" class="form-control" placeholder="Username"
							required="" />
					</div>
					<div>
						<input type="email" class="form-control" placeholder="Email"
							required="" />
					</div>
					<div>
						<input type="password" class="form-control" placeholder="Password"
							required="" />
					</div>
					<div>
						<a class="btn btn-default submit" href="index.html">Submit</a>
					</div>
					<div class="clearfix"></div>
					<div class="separator">

						<p class="change_link">
							Already a member ? <a href="#tologin" class="to_register"> Log in
							</a>
						</p>
						<div class="clearfix"></div>
						<br />
						<div>
							<h1>Muscle and Science</h1>
							<p>&#169; 2015 All Rights Reserved. Muscle and Science. Privacy
								and Terms</p>
						</div>
					</div>
				</form>
				<!-- form -->
			</section>
			<!-- content -->
		</div>
	</div>
</div>