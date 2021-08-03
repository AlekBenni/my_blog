
@extends('admin.layouts.layout')

@section('content')

<section class="content">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Статья {{$post->title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('index.index')}}">Главная</a></li>
              <li class="breadcrumb-item active">Статья {{$post->title}}</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Статья {{$post->title}}</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
      <a href="{{route('post.create')}}" class="btn btn-success mb-3">Добавить статью</a>

    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <img class="img-thumbnail" src="{{ $post->getImage() }}" alt="">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <h2>{{$post->title}}</h2>
            <h4><b>Категория</b> <a href="{{route('category.show', ['category' => $post->category->id])}}">{{$post->category->title}}</a></h4>
            <h4><b>Теги: </b>
                @foreach($post->tags->pluck('title', 'id') as $k => $v)
                    <a href="{{route('tag.show', ['tag' => $k])}}">{{$v}} /</a>
                @endforeach
            </h4>
            <p><b>Дата публикации:</b>  {{$post->getDate()}}</p>
            <p>{!!$post->description!!}</p>
        </div>
    </div>
    <div class="container admin_block_for_img mt-5 text-center mb-5">
        {!!$post->content!!}
    </div>

    <div class="d-flex justify-content-center">
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
