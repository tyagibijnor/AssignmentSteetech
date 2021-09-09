<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
		 <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" 
                action="<?php echo base_url();?>user/registration" method="post">
					<span class="login100-form-title">
					Sign Up					
                    </span>
                    
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Please reenter password">
						<input class="input100" type="password" name="confirmpassword" placeholder="Confirm Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
                    <input type="submit" name="signupSubmit" class="login100-form-btn" value="Sign Up">
						
					</div>
					<div class="flex-col-c p-t-20 p-b-40">
				    <p>Already have an account? 
						<a href="<?php echo base_url('user/login'); ?>" class="txt3">Login here</a>
						<br>
						
					</p>
					
					
					</div>
				</form>
				<center><?php $msg=$this->session->flashdata('msg'); if(isset($msg)) { echo $msg; } ?></center>
			</div>
			
		</div>
	</div>
	
	
