<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Отзывы о товаре</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <?php
  include_once "./tools/connect.php";

  $review = file_get_contents("./template/review_item.php");
  $sql = 'SELECT * FROM `reviews` WHERE `isApproved`= 1 ORDER BY `date` DESC';
  $result = mysqli_query($link, $sql);
  $rating_summ = 0;
  $content = '';

  if ($result->num_rows) {

    while ($row = mysqli_fetch_array($result)) {
      $rating_summ += $row['rating'];
      $date = explode(' ', $row['date'])[0];
      $content .= sprintf($review, $row['name'], $date, $row['rating'], $row['title'], $row['text']);
    }
    $rating_average = round(($rating_summ / $result->num_rows), 1);
  } else {
    $content = "<h3>Ещё нет отзывов</h3>";
    $rating_average = 0;
  }

  ?>
  <main class="container">
    <h1 class="mb-4">Отзывы о товаре</h1>
    <hr>
    <div class="d-flex align-items-center fs-5">
      <div class="w-25 text-center">
        <div class="rating__count">
          <p>Всего оценок:</p>
          <p><b><?= $result->num_rows ?></b></p>
        </div>
        <div class="rating__average">
          <p>Средняя оценка:</p>
          <p><b><?= $rating_average ?></b></p>
        </div>
      </div>
      <form class="w-100 px-5" name="review" method="POST" action="./tools/add.php">
        <p>
          <label for="name" class="form-label mb-2">Ваше имя: </label>
          <input class="form-control form-control-sm" type="text" name="name" required>
        </p>
        <p>
          <label for="title" class="form-label mb-2">Заголовок: </label>
          <input class="form-control form-control-sm" type="text" name="title" required>
        </p>
        <p>
          <label for="text" class="form-label mb-2">Сообщение: </label>
          <textarea class="form-control form-control-sm" name="text" required></textarea>
        </p>
        <p>
          <label for="rating" class="form-label mb-2">Оценка: </label>
          <select class="form-select form-select-sm w-25" name="rating" required>
            <option value="" disabled selected>Выберите оценку</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </p>


        <input class="btn btn-outline-success my-2" type="submit" name="send" value="Добавить отзыв">
      </form>
    </div>
    <section class="reviews mb-5">
      <?= $content ?>
    </section>
  </main>
</body>

</html>