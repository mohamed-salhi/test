@extends('admin.master.index')
@section('title')
    edit
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
                <h4 class="mb-0">edit new</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{route('admin.ads.update',$ads->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- عنوان الخبر -->
                    <div class="mb-3">
                        <label class="form-label">الرابط</label>
                        <input type="text" name="link" class="form-control" value="{{ $ads->link }}">
                        @error('link')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- محتوى الخبر -->
                    <div class="mb-3">
                        <label class="form-label">صورة الاعلانات</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>



                    <!-- زر الحفظ -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">حفظ الاعلان</button>
                    </div>

                </form>
            </div>
        </div>

    </body>
    </html>
@endsection
