@extends('index')

@section('content')
    <h3>Register here</h3>
    <form action="{{url('/import')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import User Data</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
          <p>Duplicates values</p>
        </ul>
      </div>
    @endif
@stop