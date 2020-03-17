@extends('template_backend.home')

@section('title', $title)

@section('content')
@if(session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif

<a href="{{ route('tag.create') }}" class="btn btn-info mb-3">Add {{ $title }}</a>

<table class="table table-striped table-bordered table-hover table-sm">
  <thead>
    <tr>
      <th>No</th>
      <th>Username</th>
      <th>Email</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $result => $data)
    <tr>
      <td> {{ $result + $users->firstitem() }} </td>
      <td> {{ $data->name }} </td>
      <td> {{ $data->email }} </td>
      <td>
        @if ($data->role)
        <span class="badge badge-info ">Administrator</span>
        @else
        <span class="badge badge-success ">Author</span>
        @endif
      </td>
      <td>
        <div class="d-inline-flex">
          <a href="{{ route('tag.edit', $data->id ) }}" class="btn btn-primary d-inline-block mr-2">Edit</a>
          <form action="{{ route('tag.destroy', $data->id) }}" method="POST">
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

{{ $users->links() }}

@endsection