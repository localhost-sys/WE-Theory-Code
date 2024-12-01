<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Resources</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .dropzone {
      border: 2px dashed #007bff;
      border-radius: 5px;
      padding: 20px;
      text-align: center;
    }
    .file-preview {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h3>Upload Resources</h3>
    <form action="upload_action.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
      </div>
      <div class="form-group">
        <label>Upload File</label>
        <div class="dropzone" id="dropzone">
          <input type="file" name="file" id="file" required>
          <div class="file-preview" id="file-preview"></div>
        </div>
      </div>
      <div class="form-group">
        <label for="tags">Tags</label>
        <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter tags">
      </div>
      <button type="submit" class="btn btn-primary">Upload</button>
    </form>
  </div>
</body>
</html>
