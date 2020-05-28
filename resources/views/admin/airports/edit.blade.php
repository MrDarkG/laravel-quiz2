@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('adminairportsupdate') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $ap->a_id }}">
        <input type="text"  class="mb-2 form-control" placeholder="კოდი" name="code" value="{{ $ap->code }}">
        <input type="text" class="mb-2 form-control" placeholder="სახელი" name="name" value="{{ $ap->name }}">
        <input type="text" class="mb-2 form-control" placeholder="ქვეყანა" name="country" value="{{ $ap->country }}">
        <input type="text"  class="mb-2 form-control" placeholder="დროის სარტყეილ" name="gmt" value="{{ $ap->gmt }}">
        <button class="mt-2 btn btn-primary w-100">დამატება</button>
    </form>
</div>
@endsection
