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
                <form action="{{route('admin.posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- عنوان الخبر -->
                    <div class="mb-3">
                        <label class="form-label">عنوان الخبر</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- محتوى الخبر -->
                    <div class="mb-3">
                        <label class="form-label">محتوى الخبر</label>
                        <textarea name="msg" class="form-control" rows="4">{{ $post->content }}</textarea>
                        @error('msg')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">صورة الخبر</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">الفئة</label>
                        <select name="category_id" id="category_id"
                                class="form-select @error('category_id') is-invalid @enderror">
                            <option value="">-- اختر الفئة --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- اختيار التاجز -->
                    <div class="mb-3">
                        <label class="form-label">اختر الوسوم (Tags)</label>
                        <select name="tags[]" class="form-select" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" >
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('tags')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- زر الحفظ -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">حفظ الخبر</button>
                    </div>

                </form>
            </div>
        </div>

    </body>
    </html>
@endsection
