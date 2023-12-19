@extends('layouts.app')

@section('content')
    <div class="col-sm-12">
        <form action="{{ route('article.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="card-title">Form Controls</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Title</label>
                                <input type="text" id="title"
                                    class="form-control @error('title') is-invalid @enderror" name="title">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" id="slug" name="slug"
                                    class="form-control @error('slug') is-invalid @enderror">
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="author">Author</label>
                                <input type="text" id="author" name="author"
                                    class="form-control @error('author') is-invalid @enderror">
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="publisher">Publisher</label>
                                <input type="text" id="publisher" name="publisher"
                                    class="form-control @error('publisher') is-invalid @enderror">
                                @error('publisher')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="date">Date</label>
                                <input type="date" id="date" name="date"
                                    class="form-control  @error('date') is-invalid @enderror">
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Thumbnail</label>
                        <input type="file" id="image" name="image"
                            class="form-control-file  @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div> <!-- / .card -->
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Content</h5>
                    <p>Pages type scale includes a range of contrasting styles that support the needs of your product and
                        its
                        content.</p>
                    <!-- Create the editor container -->
                    {{-- <div id="editor" style="min-height:100px;"> --}}
                    <textarea name="content" id="editor"></textarea>
                    {{-- <input type="hidden" name="content" id="content" /> --}}
                    {{-- </div> --}}
                    {{-- <div class="form-group mb-3">
                        <label for="content">Content</label>
                        <input type="text" id="content" name="content"
                            class="form-control @error('content') is-invalid @enderror">
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                </div>
            </div>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
    </form>
    </div>
@endsection
