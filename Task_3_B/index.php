<?php
try {
    $db = new PDO('sqlite:research_archive.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->exec("CREATE TABLE IF NOT EXISTS blogs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        expertise TEXT,
        title TEXT,
        content TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = $_POST['name'];
        $expertise = $_POST['expertise'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $db = new PDO('sqlite:research_archive.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("INSERT INTO blogs (name, expertise, title, content) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $expertise, $title, $content]);

        $message = "Blog post submitted successfully!";
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Technical Knowledge - Research Archive</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container mt-5">
    <h3>Technical Knowledge Blog</h3>

    <?php
    try {
        $db = new PDO('sqlite:research_archive.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $db->query("SELECT * FROM blogs ORDER BY created_at DESC");
        $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($blogs) {
            foreach ($blogs as $blog) {
                echo "<div class='card mb-4'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . htmlspecialchars($blog['title']) . "</h5>
                            <h6 class='card-subtitle mb-2 text-muted'>By " . htmlspecialchars($blog['name']) . " | Expertise: " . htmlspecialchars($blog['expertise']) . "</h6>
                            <p class='card-text'>" . nl2br(htmlspecialchars($blog['content'])) . "</p>
                        </div>
                      </div>";
            }
        } else {
            echo "<p>No blogs available at the moment.</p>";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>

    <hr>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postBlogModal">Post Your Blog</button>

    <div class="modal fade" id="postBlogModal" tabindex="-1" role="dialog" aria-labelledby="postBlogModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="postBlogModalLabel">Post Your Technical Blog</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">

              <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>

              <div class="form-group">
                <label for="expertise">Expertise Profile</label>
                <textarea class="form-control" id="expertise" name="expertise" rows="4" required></textarea>
              </div>

              <div class="form-group">
                <label for="title">Blog Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div>

              <div class="form-group">
                <label for="content">Blog Content</label>
                <textarea class="form-control" id="content" name="content" rows="8" required></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Submit Blog Post</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
    if (isset($message)) {
        echo "<div class='alert alert-success mt-3'>$message</div>";
    }
    ?>
  </div>
</body>
</html>
