@extends('template_backend.home')

@section('title', $title)

@section('content')
<div class="row">
  <div class="col-6">

    @if(session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('category.update', $category->id ) }}" method="POST">
      @csrf
      @method('patch')
      <div class="form-group">
        <label>Category</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
          placeholder="Enter new Category" value="{{ $category->name }}">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <button class="btn btn-primary btn-block">Save Category</button>
    </form>
  </div>
</div>
@endsection