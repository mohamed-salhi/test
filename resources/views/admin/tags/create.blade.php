@extends('admin.master.index')
@section('title')
    create
@endsection
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Item</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Add New Item</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{route('admin.tags.store')}}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text"
                               name="name"
                               id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <!-- Actions -->
                    <div class="d-flex justify-content-between">
                        <a href="{{route('admin.tags.index')}}" class="btn btn-secondary">رجوع</a>
                        <button type="submit" class="btn btn-success">إضافة</button>
                    </div>
                </form>            </div>
        </div>
    </div>

    </body>
    </html>
@endsection
