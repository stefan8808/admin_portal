@extends('index')

@section('content')


@if ($customer->isEmpty())
<div class="alert alert-danger">
  <ul>
    <p>Customers table is Empty !!</p>
  </ul>
</div>
@else
<table class="table table-bordered table-hover table-dark table-responsive">
  <thead >
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Service</th>
      <th scope="col">Referral Code</th>
      <th scope="col">Referral time</th>
      <th scope="col">Username</th>
      <th scope="col">Discount time</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customer as $data)  
      <tr id="table-row">
        <th scope="row">{{$data->name}}</th>
        <td>{{$data->phone_number}}</td>
        <td>{{$data->address}}</td>
        <td>{{$data->services}}</td>
        <td>{{$data->Referral_code}}</td>
        <td>{{$data->Referral_times}}</td>
        <td>{{$data->username}}</td>
        <td>{{$data->discount_remaining}}</td>
      </tr>    
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
  <ul class="pagination">
    {{ $customer->links() }}  
  </ul>
</div>
@endif

<script type="text/javascript">
    var isOffer = <?= $customer ?>;
    console.log(isOffer.length)
    var table = document.getElementById('table-row')
    for(let i = 0; i < isOffer.length; i++){
      if(isOffer[i].status == 1){
        table.classList.add('table-primary')
      }
    }
</script>
@stop