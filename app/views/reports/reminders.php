<?php require_once 'app/views/templates/header.php' ?>
<div class="container page">
  <h2>Report: Users Reminders</h2>
  <!-- Who has the most reminders  -->
  <?php if (isset($data['user_most_reminders'])) {
    echo "<p>The user with the most reminders is <strong>" . $data['user_most_reminders']['username'] . "</strong> with <strong>" . $data['user_most_reminders']['total']. "</strong> reminders</p>";
  }
  ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">User</th>
        <th scope="col">Subject</th>
        <th scope="col">Created At</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['reminders'] as $reminder) : ?>
        <tr>
          <td><?php echo $reminder['username']; ?></td>
          <td><?php echo $reminder['subject']; ?></td>
          <td><?php echo $reminder['created_at']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  
  <!-- How many total logins by username  -->
 

  
</div>
<?php require_once 'app/views/templates/footer.php' ?>