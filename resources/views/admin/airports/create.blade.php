@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('adminairportsstore') }}" method="POST">
        @csrf
        <input type="text"  class="mb-2 form-control" placeholder="კოდი" name="code">
        <input type="text" class="mb-2 form-control" placeholder="სახელი" name="name">
        <input type="text" class="mb-2 form-control" placeholder="ქვეყანა" name="country">
        <input type="text"  class="mb-2 form-control" placeholder="დროის სარტყეილ" name="gmt">
        <button class="mt-2 btn btn-primary w-100">დამატება</button>
    </form>
</div>
@endsection
