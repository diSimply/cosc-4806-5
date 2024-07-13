<?php require_once 'app/views/templates/headerPublic.php'?>
<main role="main" class="container page">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Sign up</h1>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-sm-auto">
    <form action="/create/signup" method="post" >
    <fieldset>
      <div class="form-group">
        <label for="username">Username</label>
        <input required type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input required type="password" class="form-control" name="password">
      </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input required type="password" class="form-control" name="confirmPassword">
          </div>
        <?php if (isset($data) && isset($data['error'])) {
                echo '<p style="color: red;">' . $data['error'] .'</p>';
            }
        ?>
            <br>
        <button type="submit" class="btn btn-primary">Sign up</button>
    </fieldset>
    </form>
    <div>
        Already have an account? <a href="/login/index">Login</a>
  </div>
</div>
    </div>
    </main>
    <!-- when there is an error, display a toast with the error message -->
    <?php if(isset($data) && isset($data['error'])): ?>
        <div class="toast show login-toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-light">
                <strong class="me-auto">Failed to sign up</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php echo $data['error']; ?>
            </div>
        </div>
    <?php endif; ?>
<?php require_once 'app/views/templates/footer.php' ?>
