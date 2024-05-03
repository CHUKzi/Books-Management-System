@extends('layouts.app')

@section('title')
    Home | Books List
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    @include('../layouts/alert')
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('books.create.index') }}"><button class="btn btn-primary float-end">Add
                                    Book</button></a>
                        </div>
                    </div>

                    <!--Books Filter Area-->
                    <div class="row">
                        <div class="col-md-4">
                            <form method="get" action="{{ route('books.index') }}">
                                <div class="mt-3 mb-3 d-flex align-items-center">
                                    <select class="form-select me-2" name="category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('book_category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--Books List Area-->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Category</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($books->isEmpty())
                            <td colspan="6">
                                <center>No data available.</center>
                            </td>
                            @else
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->price }}</td>
                                    <td>{{ $book->stock }}</td>
                                    <td>{{ $book->category }}</td>
                                    <td>
                                        <a href="{{ route('books.edit.index', $book->id) }}"><button type="button"
                                                class="btn btn-primary btn-sm">Edit</button></a>
                                        <form action="{{ route('books.delete.destroy', $book->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete?');">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
