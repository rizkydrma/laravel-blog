@extends('template_backend.home')

@section('title', $title)

@section('content')
<div class="row">
  <div class="col">

    @if(session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="judul"
          placeholder="Enter new judul">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
          <option value="" holder>Choose category</option>
          @foreach ($category as $data)
          <option value="{{ $data->id }}"> {{ $data->name }} </option>
          @endforeach
        </select>
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Enter a content"></textarea>
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label>Thumbnail</label>
        <input type="file" name="gambar" class="form-control">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <button class="btn btn-primary btn-block">Save Post</button>
    </form>
  </div>
</div>
@endsection