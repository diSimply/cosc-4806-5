<?php require_once 'app/views/templates/header.php' ?>
<div class="container page">
  <h2>Report: Users Reminders</h2>
  <!-- Who has the most reminders  -->
  <?php if (isset($data['user_most_reminders'])) {
    echo "<p>The user with the most reminders is <strong>" . $data['user_most_reminders']['username'] . "</strong> with <strong>" . $data['user_most_reminders']['total']. "</strong> reminders</p>";
  }
  ?>
  <div class="row"> 
    <!-- table  -->
    <div class="col-6">
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
    </div>
    <!-- chart  -->
    <div class="col-6">
      <canvas id="myChart" style="width:100%;max-width:700px"></canvas>  
    </div>
  </div> 
</div>

<script>

  async function displayChart() {
    const response = await fetch('/reminders/weekdays');
    const data = await response.json();
    const xValues = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    const yValues = [data.monday, data.tuesday, data.wednesday, data.thursday, data.friday, data.saturday, data.sunday];
    const barColors = ["red", "green","blue","orange", "brown", "purple", "yellow"];
    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "Reminders Created Per Week Day"
        }
      }
    });
  }
  displayChart();  
</script>
<?php require_once 'app/views/templates/footer.php' ?>