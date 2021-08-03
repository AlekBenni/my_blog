
@extends('admin.layouts.layout')

@section('content')

<section class="content">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Страница тегов</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('index.index')}}">Главная</a></li>
              <li class="breadcrumb-item active">Страница тегов</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Теги</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
      <a href="{{route('tag.create')}}" class="btn btn-success mb-3">Добавить тег</a>

      <h1>Тег: {{$tag->title}}</h1>
      <h4>Посты тега {{$tag->title}}:</h4>
      @foreach($tag->posts->pluck('id', 'title') as $k => $v)
      <a href="{{route('post.show', ['post' => $v])}}"> <span class="mr-2">{{$k}}</span>  </a>
      @endforeach
  </div>

  <div class="d-flex justify-content-center">
    <a href="{{route('tag.edit', ['tag' => $tag->id])}}" class="btn btn-info btn-sm float-left mr-1">
        <i class="fas fa-pencil-alt"></i>
    </a>
    <form action="{{route('tag.destroy', ['tag' => $tag->id])}}" method="post" class="float-left">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm"
        onclick="return confirm('Подтвердите удаление')">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
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
