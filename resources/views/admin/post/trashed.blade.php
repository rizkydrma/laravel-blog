@extends('template_backend.home')
@section('title', $title)

@section('content')

@if(session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif

<a href="{{ route('post.create') }}" class="btn btn-info mb-3">Buat Post</a>

<table class="table table-striped table-bordered table-hover table-sm">
  <thead>
    <tr>
      <td>No</td>
      <td>Nama</td>
      <td>Category</td>
      <td>Tags</td>
      <td>Gambar</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post => $data)
    <tr>
      <td>{{ $post + $posts->firstitem() }}</td>
      <td>{{ $data->judul }}</td>
      <td>{{ $data->category->name}}</td>
      <td>
        <ul>
          @foreach ($data->tag as $item)
          <li>
            {{ $item->name }}
          </li>
          @endforeach
        </ul>
      </td>
      <td>
        <img src="{{ asset($data->gambar) }}" class="img-fluid img-thumbnail" style="width: 5rem">
      </td>
      <td>
        <div class="d-inline-flex">
          <a href="{{ route('post.restore', $data->id) }}" class="btn btn-primary d-inline-block mr-2">Restore</a>
          <form action="{{ route('post.kill', $data->id) }}" method="POST">
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

{{ $posts->links() }}

@endsection