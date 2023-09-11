<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Редактирование отзыва</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="container">
  <?php
  include_once "./connect.php";

  $id = $_GET['id'];
  $sql = "SELECT * FROM `reviews` WHERE `id`= $id";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);

  ?>
  <h1 class="mb-4">Редактирование отзыва</h1>
  <hr>
  <form class="w-75 mx-auto fs-5" name="review" method="POST" action="/tools/update.php?id=<?= $id ?>">
    <p>
      <label for="name" class="form-label mb-2">Имя: </label>
      <input class="form-control form-control-sm" type="text" name="name" value="<?= $row["name"] ?>" required>
    </p>
    <p>
      <label for="title" class="form-label mb-2">Заголовок: </label>
      <input class="form-control form-control-sm" type="text" name="title" value="<?= $row["title"] ?>" required>
    </p>
    <p>
      <label for="text" class="form-label mb-2">Сообщение: </label>
      <textarea class="form-control form-control-sm" name="text" required><?= $row["text"] ?></textarea>
    </p>
    <p>
      <label for="rating" class="form-label mb-2">Оценка: </label><br>
      <select class="form-select form-select-sm w-25" name="rating" disabled required>
        <option value="<?= $row["rating"] ?>"><?= $row["rating"] ?></option>
      </select>
    </p>

    <input class="btn btn-outline-success my-2" type="submit" name="send" value="Опубликовать">
  </form>
</body>

</html>