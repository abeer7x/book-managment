<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Book Mangment</title>
</head>
<style>
    .table-container {
        width: 70%; 
        height: 50vh;
        overflow-y: auto;
        margin: 0 auto;
    }
</style>

<body>
    <h1 style="text-align: center; margin:20px">Books Managment</h1>
    <br> <hr>
    <div class="table-container">
    <table class="table table-hover">
    <caption style="caption-side: top; text-align: center; font-weight: bold; padding: 10px;color:red">
   display the books from data
</caption>
        <tr>
        <th>#</th>
        <th>Title</th>
        <th>author name </th>
        <th>publish year </th>
</tr>   
        @foreach($books as $book)
        <tr  scope="row">
            <td> 
                {{$book->id}}
            </td>
            <td> 
                {{$book->title}}
            </td>
            <td> 
                {{$book->author->name}}
            </td>
            <td> 
                {{$book->publish_year}}
            </td>
            <td>
                </form>
            </td>
        </tr>
    @endforeach
  </table>
</div>
<hr>
<div class="container mt-5">
    <h2 class="mb-3 text-center">add a new book :</h2>
    <br>
    <form action="{{ route('books.store') }}" method="POST">
    @csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label>book title</label>
      <input type="text" name="title" class="form-control"  required>
    </div>
    <div class="col-md-5 mb-3"> 
      <label for="validationDefault02">author name</label>
      <input type="text" name="author_name" class="form-control" required>
    </div>
    <div class="col-md-4 mb-3">
      <label >publish year</label>
      <input type="number" class="form-control" name="publish_year" required>
        </div>
        <div class="col-md-5 mb-3">
      <label > author email</label>
      <input type="email" class="form-control"name="email" required>
        </div>

        <div class="col-md-5 mb-3">
        <button class="btn btn-primary" type="submit">Submit form</button>
  </div>  
</form>
</div>
<hr>
<h3 style="text-align: center; margin:20px">Edit or delete data </h3>
<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Author Name</th>
        <th>Publish Year</th>
        <th>Actions</th>
    </tr>   
    @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <td>
                    <input type="text" name="title" value="{{ $book->title }}" class="form-control" required>
  </td >
                <td>
                    <input type="text" name="author_name" value="{{ $book->author->name }}" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="publish_year" value="{{ $book->publish_year }}" class="form-control">
                </td>
                <td>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </td>
            </form>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <td>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                </td>
            </form>
        </tr>
    @endforeach
</table>


</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>