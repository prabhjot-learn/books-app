<!DOCTYPE html>
<html>
  <head>
    <title>Book List</title>
  </head>
  <body>
    <h1><?php echo e($book->title); ?></h1>
    <p> Author: <?php echo e($book->author); ?></p>
    <p> Published Year: <?php echo e($book->published_year); ?></p>
   <a href="<?php echo e(route('books.index')); ?>">Back</a>
  </body>
</html><?php /**PATH C:\xampp\htdocs\booksApp\resources\views/books/show.blade.php ENDPATH**/ ?>