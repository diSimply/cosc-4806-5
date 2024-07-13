<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
  <h1>Users Good / Bad Login Attempts</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">User</th>
        <th scope="col">Good Attempts</th>
        <th scope="col">Bad Attempts</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['users_attempts'] as $user_attempts) : ?>
        <tr>
          <td><?php echo $user_attempts['username']; ?></td>
          <td><?php echo $user_attempts['good_attempts']; ?></td>
          <td><?php echo $user_attempts['bad_attempts']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  
  <!-- How many total logins by username  -->
 

  
</div>
<?php require_once 'app/views/templates/footer.php' ?>