@extends('index')

@section('content')
<form action="{{url('/addService')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" class="form-control">
    <br>
    <button class="btn btn-success">Import Order Data</button>
</form>
@if ($service->isEmpty())
<div class="alert alert-danger mt-3">
  <ul>
    <h5>No Order Records</h5>
  </ul>
</div>
@else
<section class="mt-4">
  <form action="{{url('/updateService')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table class="table table-bordered table-hover table-dark table-responsive">
        <thead >
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Date</th>
            <th scope="col">Discount</th>
            <th scope="col">Cancel</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($service as $data)  
          <form action="POST" action={{"/deleteService/{$data->customer_id}"}}>
            <tr id="table-row">
              <th scope="row">{{$data->customer->name}}</th>
              <td>RM {{$data->Price}}</td>
              <td><input type="hidden" name="date" value="{{$data->date}} ">{{$data->date}}</td>
              <input type="hidden" name="id" value="{{$data->customer_id}}">
              @if($data->customer->discount_remaining == 0)
              <td></td>
              @else
              <td><input type="checkbox" name="discount" id="discount" value="discount"></td>
              @endif
              <td>
                <button class="btn btn-danger" type="submit" value="delete" name="delete">
                  <ion-icon name="trash-outline"></ion-icon>
                </button>
              </td>
            </tr>  
          </form>  
          @endforeach
        </tbody>
      </table>
      <button class="btn btn-primary" type="submit" value="confirm" id="submit-btn">Confirm Order</button>
    </form>
</section>
@endif
@stop