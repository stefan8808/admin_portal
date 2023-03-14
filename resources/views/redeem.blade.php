@extends('index')

@section('content')
<form action="{{url('/redeem')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <h4>Redeem Here</h4>
    <div class="mb-3">
      <label for="redeemFiled" class="form-label">Redeem Code</label>
      <input type="string" class="form-control" id="redeemFiled" name="code">
    </div>
    <div class="mb-3">
      <label for="redeemFiled" class="form-label">Name</label>
      <input type="string" class="form-control" id="redeemFiled" name="name">
    </div>
    <div class="mb-3">
      <label for="redeemFiled" class="form-label">Username</label>
      <input type="string" class="form-control" id="redeemFiled" name="username">
    </div>
    <div class="mb-3">
      <label for="redeemFiled" class="form-label">Phone number</label>
      <input type="number" class="form-control" id="redeemFiled" name="phone">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    @if ($errors->any())
    <span class="alert alert-danger">This user already redeemed</span>
    @endif
  </form>
@stop