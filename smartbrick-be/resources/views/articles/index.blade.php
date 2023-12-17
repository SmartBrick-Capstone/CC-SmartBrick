@extends('layouts.app')

@section('content')
    <div class="col-12">
        <h2 class="mb-2 page-title">Data Article</h2>
        <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built
            upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table.
        </p>
        <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <!-- table -->
                        <table class="table datatables" id="dataTable-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Author</th>
                                    <th>Tanggal</th>
                                    <th>Thumbnail</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $index => $article)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->author }}</td>
                                        <td>{{ $article->date }}</td>
                                        <td>
                                            <img src="{{ Storage::url($article->image) }}" class="img-fluid rounded"
                                                style="width: 150px">
                                        </td>

                                        <td class="text-nowrap justify-content-center align-items-center text-center">
                                            <a href="#" class="btn btn-primary btn-xs rounded-pill">
                                                <em class="ni ni-eye"></em>
                                            </a>
                                            <a href="" class="btn btn-warning btn-xs rounded-pill">
                                                <em class="ni ni-edit"></em>
                                            </a>
                                            <button class="btn btn-danger btn-xs rounded-pill">
                                                <em class="ni ni-trash"></em>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- simple table -->
        </div> <!-- end section -->
    </div> <!-- .col-12 -->
@endsection
