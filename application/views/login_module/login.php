
  <div class="animsition">
    <!-- Login Screen -->
    <div class="login-wrapper ">
      <div class="login-container">
		<div class="container-inset">	  
        <a href="index.html"><img width="100" height="30" src="<?php echo base_url();  ?>images/smsapp_logo.png" /></a>
		<?if($this->session->flashdata('flashSuccess')):?>
		<p class='flashMsg flashSuccess'> <?=$this->session->flashdata('Success')?> </p>
		<?endif?>
		 
		<?if($this->session->flashdata('flashError')):?>
		<p class='flashMsg flashError'> <?=$this->session->flashdata('Error')?> </p>
		<?endif?>
        <form class="login-form" method="post" action="<?php echo site_url('login/login_user')?>">
		<fieldset>
			  <div id="message" style="display:none;">
							<p class="error_msg">Your submitted login details are incorrect.</p>
			  </div>
			  <div class="form-group label-floating">
                <label for="111" class="control-label">Username</label>
                <input type="text" name="username" class="form-control" >
              </div>
               <div class="form-group label-floating">
                <label for="111" class="control-label">Password</label>
                <input type="password" name="password" class="form-control" ><input type="submit" value="&#xf054;">
              </div>
          <div class="form-options clearfix">
            <a class="animsition-link" href="#">Forgot password?</a>
            
          </div>
		  <p class="signup">
          Don't have an account yet? <a href="<?php echo site_url('login/register')?>" class="animsition-link">Sign up now</a>
         </p>
		  </fieldset>
        </form>
       <!-- <div class="social-login clearfix">
          <a class="btn btn-primary pull-left facebook" href="index-2.html"><i class="icon-facebook"></i>Facebook login</a><a class="btn btn-primary pull-right twitter" href="index-2.html"><i class="icon-twitter"></i>Twitter login</a>
        </div>-->
        </div>
      </div>
	 
    </div>
    <!-- End Login Screen -->
</div> 
<!--<script>
$(function() 
{
	$('.login-form').submit(function(event)
	{
		event.preventDefault();

		// Get the url that the ajax form data is to be submitted to.
		var submit_url = $(this).attr('action');

		// Get the form data.
		var $form_inputs = $(this).find(':input');
		var form_data = {};
		$form_inputs.each(function() 
		{
			form_data[this.name] = $(this).val();
		});

		$.ajax(
		{
			url: submit_url,
			type: 'POST',
			data: form_data,
			success:function(data)
			{
				// If the returned login value successul.
				if (data=='true')
				{
					// Empty the login form content and replace it will a successful login message.
					$('fieldset').empty().append('<h1>Login via Ajax was successful!</h1><p>Refreshing this page would now redirect you away from the login page to the user dashboard.</p>');
					
					// Hide any error message that may be showing.
					$('#message').hide();
				}
				// Else the login credentials were invalid.
				else
				{
					// Show an error message stating the users login credentials were invalid.
					$('#message').show();
				}
			}
		});
	})
});
</script>-->
  </body>

</html>