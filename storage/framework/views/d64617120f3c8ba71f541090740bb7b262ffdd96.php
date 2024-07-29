<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>

<body>
    <div class="container">
        <h1>Add New Book</h1>
        <form action="<?php echo e(route('books.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="published_year">Published Year:</label>
                <input type="text" id="published_year" name="published_year" required>
            </div>
            <button type="submit">Save</button>
        </form>
        <a href="<?php echo e(route('books.index')); ?>" class="back-link">Back to List</a>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\booksApp\resources\views/books/create.blade.php ENDPATH**/ ?>