
@extends('admin.layouts.layout')

@section('content')

<section class="content">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Страница категорий</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('index.index')}}">Главная</a></li>
              <li class="breadcrumb-item active">Страница категорий</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Категории</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
      <a href="{{route('category.create')}}" class="btn btn-success mb-3">Добавить категорию</a>
    @if($categories->count())
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width:30px">#</th>
            <th>Наименование</th>
            <th>Слаг</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td> <a href="{{route('category.show', ['category' => $category->id])}}">{{$category->title}}</a> </td>
            <td>{{$category->slug}}</td>
            <td>
            <a href="{{route('category.edit', ['category' => $category->id])}}" class="btn btn-info btn-sm float-left mr-1">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <form action="{{route('category.destroy', ['category' => $category->id])}}" method="post" class="float-left">
                 @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Подтвердите удаление')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <h4>Категорий пока нет</h4>
    @endif
    <div class="mt-3">
        {{$categories->links()}}
    </div>

  </div>

  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>

@endsection
