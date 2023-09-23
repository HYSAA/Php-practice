<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    *{
      background-color: aqua;
    }
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;

    }
    .calendar-container {
      text-align: center;
      padding: 30px;
      margin: 30px;
    }
  </style>
</head>
<body>
  <div class="calendar-container">
    <?php
      $selectedDate = date('Y-m-d', strtotime($_GET['date'] ?? 'now'));
    ?>

    <h2><?= date('F Y', strtotime($selectedDate)); ?></h2>

    <table border="1">
      <tr>
        <th>S</th>
        <th>M</th>
        <th>T</th>
        <th>W</th>
        <th>TH</th>
        <th>F</th>
        <th>S</th>
      </tr>
      <?php
        $firstDay = date('w', strtotime(date('Y-m-01', strtotime($selectedDate))));
        $lastDay = date('t', strtotime($selectedDate));
        $currentDay = 1;

        for ($week = 0; $currentDay <= $lastDay; $week++) {
          echo "<tr>";
          for ($day = 0; $day < 7; $day++) {
            if ($week === 0 && $day < $firstDay) {
              echo "<td></td>";
            } elseif ($currentDay <= $lastDay) {
              echo "<td>$currentDay</td>";
              $currentDay++;
            } else {
              echo "<td></td>";
            }
          }
          echo "</tr>";
        }
      ?>
    </table>

    <div id="buttons">
      <form method="get" action="" style="padding: 1px">
        <button type="submit" name="date" value="<?= date('Y-m-d', strtotime('-1 month', strtotime($selectedDate))); ?>">Previous</button>
        <button type="submit" name="date" value="<?= date('Y-m-d', strtotime('+1 month', strtotime($selectedDate))); ?>">Next</button>
        <button type="submit" name="date" value="<?= date('Y-m-d'); ?>">Today</button>
      </form>
    </div>
  </div>
</body>
</html>
