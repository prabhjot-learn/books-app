<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>

<body>
<div class="container">
    <h1>Edit Book</h1>
    <form action="<?php echo e(route('books.update', $book->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
        <label for="title"> Title:</label>
        <input type="text" id="title" name="title" value="<?php echo e(old('title', $book->title)); ?>" required>
        </div>
        <div class="form-group">
        <label for="author"> Author:</label>
        <input type="text" id="author" name="author" value="<?php echo e(old('author', $book->author)); ?>" required>
        </div>
        <div class="form-group">
        <label for="published_year"> Published Year:</label>
        <input type="text" id="published_year" name="published_year"
            value="<?php echo e(old('published_year', $book->published_year)); ?>" required>
       </div>
        <button type="submit">Update</button>
    </form>
    <a href="<?php echo e(route('books.index')); ?>"> Back to List</a>
    </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\booksApp\resources\views/books/edit.blade.php ENDPATH**/ ?>