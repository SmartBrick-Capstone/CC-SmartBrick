@extends('layouts.app')

@section('content')
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="card-title">Form Controls</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="simpleinput">Title</label>
                            <input type="text" id="simpleinput" class="form-control" name="title">
                        </div>
                        <div class="form-group mb-3">
                            <label for="slug">Slug</label>
                            <input type="email" id="slug" name="slug" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="author">Author</label>
                            <input type="email" id="author" name="author" class="form-control">
                        </div>
                    </div> <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="publisher">Publisher</label>
                            <input type="text" id="publisher" name="publisher" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="image">Thumbnail</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                </div>
            </div>
        </div> <!-- / .card -->
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Content</h5>
                <p>Pages type scale includes a range of contrasting styles that support the needs of your product and its
                    content.</p>
                <!-- Create the editor container -->
                <div id="editor" style="min-height:100px;">
                    <textarea name="content"></textarea>
                </div>
            </div>
        </div>
        @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    </div>
@endsection
