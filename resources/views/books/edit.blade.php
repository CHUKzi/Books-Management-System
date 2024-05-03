@extends('layouts.app')

@section('title')
    Create Book
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Book #{{ $book->id }}</h4>
                    @include('../layouts/alert')
                    <form class="needs-validation" method="post" action="{{ route('books.edit.update', $book->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="book_title" class="form-label">Book Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('book_title') is-invalid @enderror"
                                    id="book_title" value="{{  $book->title }}" placeholder="Enter Book Title"
                                    name="book_title">
                                @error('book_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="book_author" class="form-label">Book Author <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('book_author') is-invalid @enderror"
                                    id="book_author" value="{{  $book->author }}" placeholder="Enter Book Author"
                                    name="book_author">
                                @error('book_author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="book_price" class="form-label">Book Price <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('book_price') is-invalid @enderror"
                                    id="book_price" value="{{  $book->price }}" placeholder="Enter Book Price"
                                    name="book_price">
                                @error('book_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="book_stock" class="form-label">Book Stock <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('book_stock') is-invalid @enderror"
                                    id="book_stock" value="{{  $book->stock }}" placeholder="Enter Book Stock"
                                    name="book_stock">
                                @error('book_stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="book_category" class="form-label">Book Category<span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('book_category') is-invalid @enderror" id="book_category"
                                    name="book_category">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{  $category->id }}"
                                            {{ $book->book_category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('book_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <a href="{{ route('books.index') }}"><button class="btn btn-warning" type="button">Go
                                    Back</button></a>
                            <button class="btn btn-primary" type="submit">Update Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
