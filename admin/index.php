<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Панель администратора</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <?php
  include_once "../tools/connect.php";

  $review = file_get_contents("../template/review_item.php");
  $admin_block = file_get_contents("../template/review_admin.php");
  $review_item_admin = $review . $admin_block;
  $sql = 'SELECT * FROM `reviews` WHERE `isApproved`= 0 ORDER BY `date` DESC';
  $result = mysqli_query($link, $sql);
  $rating_summ = 0;
  $content = '';

  if ($result->num_rows) {

    while ($row = mysqli_fetch_array($result)) {
      $rating_summ += $row['rating'];
      $date = explode(' ', $row['date'])[0];
      $content .= sprintf($review . $admin_block, $row['name'], $date, $row['rating'], $row['title'], $row['text'], $row['id'], $row['id'], $row['id']);
    }
    $rating_average = round(($rating_summ / $result->num_rows), 1);
  } else {
    $content = "<hr><h3>Ещё нет отзывов</h3>";
  }

  ?>
  <section class="reviews container">
    <h1 class="mb-4">Панель администратора</h1>
    <?= $content ?>
  </section>

</html>