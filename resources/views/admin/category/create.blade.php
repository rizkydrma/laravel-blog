@extends('template_backend.home')

@section('title', $data['title'])

@section('content')
<div class="row">
  <div class="col-6">
    <form action="{{ route('category.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label>Category</label>
        <input type="text" class="form-control" name="name">
      </div>

      <button class="btn btn-primary btn-block">Save Category</button>
    </form>
  </div>
</div>
@endsection