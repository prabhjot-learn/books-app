<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<div class="container">
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="title"> Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>
        </div>
        <div class="form-group">
        <label for="author"> Author:</label>
        <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" required>
        </div>
        <div class="form-group">
        <label for="published_year"> Published Year:</label>
        <input type="text" id="published_year" name="published_year"
            value="{{ old('published_year', $book->published_year) }}" required>
       </div>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('books.index') }}"> Back to List</a>
    </div>

</body>

</html>