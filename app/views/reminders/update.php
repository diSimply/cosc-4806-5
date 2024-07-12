<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
  <div class="mt-3 p-3 row border">
    <h2>Update Reminder</h2>
    <div class="col-sm-auto">
      <form action="/reminders/update_reminder/<?php echo $data['reminder_id']; ?>" method="post" >
        <fieldset>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input required type="text" class="form-control" name="subject" value="<?php echo $data['subject'];?>">
          </div>
          <br>
          <a href="/reminders" class="btn btn-primary">Cancel</a>
          <button type="submit" class="btn btn-primary">Update</button>
        </fieldset>
      </form>
    </div>
  </div>
  <?php require_once 'app/views/templates/footer.php' ?>
</div>