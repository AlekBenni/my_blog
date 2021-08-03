
@extends('admin.layouts.layout')

@section('content')

<section class="content">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Страница статей</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('index.index')}}">Главная</a></li>
              <li class="breadcrumb-item active">Страница статей</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Статьи</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
      <a href="{{route('post.create')}}" class="btn btn-success mb-3">Добавить статью</a>
    @if($posts->count())
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width:30px">#</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Теги</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td> <a href="{{route('post.show', ['post' => $post->id])}}">{{$post->title}}</a></td>
            <td>{{$post->category->title}}</td>
            <td>{{$post->tags->pluck('title')->join(' ,')}}</td>
            <td>
            <a href="{{route('post.edit', ['post' => $post->id])}}" class="btn btn-info btn-sm float-left mr-1">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <form action="{{route('post.destroy', ['post' => $post->id])}}" method="post" class="float-left">
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
        <h4>Статей пока нет</h4>
    @endif
    <div class="mt-3">
        {{$posts->links()}}
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
