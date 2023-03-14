@extends('index')

@section('content')
<h1>Redeem Records</h1>
<table class="table table-bordered table-hover table-dark table-responsive">
    <thead >
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Username</th>
       
      </tr>
    </thead>
    <tbody>
      @foreach ($record as $data)  
        <tr id="table-row">
          <th scope="row">{{$data->name}}</th>
          <td>{{$data->phone}}</td>
          <td>{{$data->username}}</td>
         
        </tr>    
      @endforeach
    </tbody>
  </table>
@stop