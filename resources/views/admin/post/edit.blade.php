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

    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('patch')
      <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="judul"
          value="{{ $post->judul }}">
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
          <option value="{{ $data->id }}" @if ($data->id == $post->category_id)
            selected
            @endif
            > {{ $data->name }} </option>
          @endforeach
        </select>
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label>Tags</label>
        <select class="form-control select2" multiple="" name="tags[]">
          @foreach ($tags as $tag)
          <option value="{{ $tag->id }}" @foreach ($post->tag as $value)
            @if ($tag->id == $value->id)
            selected
            @endif
            @endforeach
            >{{ $tag->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" cols="30" rows="10"
          placeholder="Enter a content">{{ $post->content }}</textarea>
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