
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
              <li class="breadcrumb-item active">Добавить тег</li>
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

    <form role="form" method="post" action="{{route('tag.store')}}">
            @csrf
        <div class="card-body">
            <div class="form-group">
            <label for="title">Название тега</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Название" name="title">
            </div>
        </div>

        <div class="card-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>

  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>

@endsection
