<!DOCTYPE html>
<html>
  <head>
    <title>Book List</title>
  </head>
  <body>
    <h1>{{ $book->title}}</h1>
    <p> Author: {{ $book->author }}</p>
    <p> Published Year: {{ $book->published_year }}</p>
   <a href="{{ route('books.index') }}">Back</a>
  </body>
</html>