<?php require_once 'upload_image.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Upload Image file with PHP and MySQL</title>
  </head>
  <body class="bg-body-secondary">
    <div class="container mt-3">
      <?php echo $message; ?>
      <form class="card p-3" method="post" enctype="multipart/form-data">
        <label for="image" class="fw-medium ps-1">Image</label>
        <input class="form-control" type="file" name="image" id="image" accept="image/jpeg, image/png, image/gif">
        <input class="btn btn-primary mt-3" type="submit" name="upload" value="Upload">
      </form>
    </div>
  </body>
</html>