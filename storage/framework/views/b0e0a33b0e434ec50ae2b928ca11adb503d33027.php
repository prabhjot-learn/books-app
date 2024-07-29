<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>

<body>
    <div class="container">
        <h1>Books List</h1>
        <?php if(session('success')): ?>
            <p class="message"><?php echo e(session('success')); ?></p>
        <?php endif; ?>
        <a href="<?php echo e(route('books.create')); ?>" class="add-book-btn">Add New Book</a>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($book->title); ?></td>
                        <td><?php echo e($book->author); ?></td>
                        <td><?php echo e($book->published_year); ?></td>
                        <td>
                            <a href="<?php echo e(route('books.edit', $book->id)); ?>" class="edit-btn">Edit</a>
                            <form action="<?php echo e(route('books.destroy', $book->id)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="delete-btn">DELETE</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\booksApp\resources\views/books/index.blade.php ENDPATH**/ ?>