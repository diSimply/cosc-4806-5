<?php require_once 'app/views/templates/headerPublic.php'
?>

<?php
$waitTime = 0;
if(isset($_SESSION['failedAuth']) && $_SESSION['failedAuth'] >= 3) {
	$lastFailedTime = $_SESSION['failedTime'];
	$currentTime = time();
	$timeDifferenceSec = ($currentTime - $lastFailedTime);
	$waitTime = 60 - $timeDifferenceSec;
}
?>

<?php if($waitTime > 0): ?>
	<div style="color: white; background: maroon; margin: 20px auto; width: 50%; text-align: center; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
		<p> You have been locked out for failing to login <?php echo $_SESSION['failedAuth']; ?> times.</p>
		<p>Please wait at least <?php echo $waitTime; ?> seconds and then refresh.</p>
	</div>
<?php else:  ?>
	<main role="main" class="container page">
	    <div class="page-header" id="banner">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1>You are not logged in</h1>
	            </div>
	        </div>
	    </div>
	
	<div class="row">
	    <div class="col-sm-auto">
			<form action="/login/verify" method="post" >
			<fieldset>
				<div class="form-group">
					<label for="username">Username</label>
					<input required type="text" class="form-control" name="username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input required type="password" class="form-control" name="password">
				</div>
	            <br>
			    <button type="submit" class="btn btn-primary">Login</button>
			</fieldset>
			</form>
				<div>
							Do not have an account? <a href="/create/index">Sign up</a>
				</div>
		</div>
	</div>
	</main>
	<!-- when there is an error, display a toast with the error message -->
	<?php if(isset($_SESSION['failedAuth'])): ?>
		<div class="toast show login-toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header bg-danger text-light">
				<strong class="me-auto">Login Failed</strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body">
				Incorrect username or password
			</div>
		</div>
	<?php endif; ?>
	<?php require_once 'app/views/templates/footer.php' ?>
<?php endif; ?>