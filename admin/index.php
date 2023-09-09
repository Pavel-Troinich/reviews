<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Панель администратора</title>
  <link rel="stylesheet" href="../style.css">
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
      $content .= sprintf($review . $admin_block, $row['name'], $row['date'], $row['rating'], $row['title'], $row['text'], $row['id'], $row['id'], $row['id']);
    }
    $rating_average = round(($rating_summ / $result->num_rows), 1);
  } else {
    $content = "<h3>Ещё нет отзывов</h3>";
  }

  ?>
  <h1>Панель администратора</h1>
  <section class="reviews">
    <?= $content ?>
  </section>

</html>