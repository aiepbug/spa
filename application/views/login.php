<div class="container">
	<div id="isi">
		<form id="login">
			<h3>Login SPA Anak</h3>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Userid" id="userid">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Password" id="password">
			</div>
			<div class="form-group">
				<a onclick="login()" class="btn btn-primary btn-lg btn-block">Login</a>
			</div>
			<p class="text-danger"><?php if(isset($pesan)){echo $pesan;}?></p>
		</form>
	</div>
</div>
<div id="loading"></div>
<style>
body{background-color:#E7E7E7;}
#login {
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	background-color: white;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
                max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
  }
</style>
<style>#loading{position: fixed;top: 50%;left: 50%;-webkit-transform: translate(-50%, -50%);transform: translate(-50%, -50%);}​</style>
<script>
$('#loading').html('');
function login()
{
	var userid=$('#userid').val()
	var password=$('#password').val()
	$('#loading').html('<span class="fa fa-spinner fa-pulse fa-2x"></span>');
	$.ajax({
			url      : 'index.php/login/logins/',
			data     : ({userid:userid,password:password}),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
				$('#isi').html(respon);
				$('#loading').html('');
			},
		})
}
</script>
