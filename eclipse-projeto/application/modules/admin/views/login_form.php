<div id="content">
<div id="login_form">

    <?php 
	echo form_open('admin/login');
	echo form_input('username', 'Username');
	echo form_password('password', 'Password');
	echo form_submit('submit', 'Login');
	echo form_close();
	?>
</div>
</div>