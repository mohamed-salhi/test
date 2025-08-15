@extends('admin.master.index')
@section('title')
    posts
@endsection
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--end::App Content Header-->

        <!--begin::App Content-->
        <div class="app-content">
            <div class="container-fluid">
                <!-- زر الإضافة -->
                <div class="mb-3 text-end">
                    <a href="{{route('admin.posts.create')}}" class="btn btn-success">
                        <i class="bi bi-plus-lg"></i> إضافة
                    </a>
                </div>

                <!-- جدول البيانات -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">جدول الاخبار</h5>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>المحتوى</th>
                                <th>الفئة</th>
                                <th>هشتاق</th>
                                <th>الصور</th>
                                <th>الإجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                          @foreach($posts as $item)
                              <tr>
                                  <td>{{$item->id}}</td>
                                  <td>{{$item->title}}</td>
                                  <td>{{$item->content}}</td>
                                  <td>{{$item->category->name}}</td>
                                  <td>@foreach($item->tags as $i)
                                          <h1>{{$i->name}}</h1>
                                  @endforeach</td>

                                  <td><img src="{{asset('storage/'.$item->image)}}" alt=""></td>

                                  <td>
                                      <a href="{{route('admin.posts.edit',$item->id)}}" class="btn btn-warning btn-sm">
                                          <i class="bi bi-pencil"></i> تعديل
                                      </a>
                                      <form method="post" action="{{route('admin.posts.delete',$item->id)}}">
                                      @csrf
                                          @method('delete')
                                          <button class="btn btn-danger btn-sm">
                                              <i class="bi bi-trash"></i> حذف
                                          </button>
                                      </form>

                                  </td>
                              </tr>
                          @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end::App Content-->
    </main>

    <!-- Bootstrap Icon
@endsection
