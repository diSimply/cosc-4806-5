<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
  <div class="page-header mt-3" id="banner">
    <div class="row">
      <div class="col-9">
         <h1>Reminders</h1>
      </div>
      <div class="col-3">
        <a href="/reminders/display_create_form" class="btn btn-primary">Create Reminder</a>
      </div>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Subject</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['reminders'] as $reminder) : ?>
        <tr>
          <td><?php echo $reminder['subject']; ?></td>
          <td><?php echo $reminder['created_at']; ?></td>
          <td>
            <a href="/reminders/display_update_form/<?php echo $reminder['id']; ?>">Update</a>
            <a href="/reminders/delete_reminder/<?php echo $reminder['id']; ?>">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <!-- Data rows  -->
  <?php require_once 'app/views/templates/footer.php' ?>
</div>