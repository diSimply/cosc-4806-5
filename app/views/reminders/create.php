<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
  <div class="mt-3 p-3 row border">
    <h2>Create Reminder</h2>
    <div class="col-sm-auto">
      <form action="/reminders/create_reminder" method="post" >
        <fieldset>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input required type="text" class="form-control" name="subject">
          </div>
          <br>
          <a href="/reminders" class="btn btn-primary">Cancel</a>
          <button type="submit" class="btn btn-primary">Create</button>
        </fieldset>
      </form>
    </div>
  </div>
  <?php require_once 'app/views/templates/footer.php' ?>
</div>