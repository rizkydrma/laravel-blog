@extends('template_backend.home')

@section('title', $data['title'])

@section('content')

@if(session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif

<a href="{{ route('category.create') }}" class="btn btn-info mb-3">Tambah Data Category</a>

<table class="table table-striped table-bordered table-hover table-sm">
  <thead>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Slug</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data['category'] as $result => $item)
    <tr>
      <td> {{ $result + $data['category']->firstitem() }} </td>
      <td> {{ $item->name }} </td>
      <td> {{ $item->slug }} </td>
      <td>
        <div class="d-inline-flex">
          <a href="{{ route('category.edit', $item->id ) }}" class="btn btn-primary d-inline-block mr-2">Edit</a>
          <form action="{{ route('category.destroy', $item->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger inline-block">Delete</button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $data['category']->links() }}

@endsection