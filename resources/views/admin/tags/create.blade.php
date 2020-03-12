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

    <form action="{{ route('tag.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label>Tags</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
          placeholder="Enter new tag">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <button class="btn btn-primary btn-block">Save Tags</button>
    </form>
  </div>
</div>
@endsection