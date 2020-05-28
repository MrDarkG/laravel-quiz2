@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('updateflight') }}" method="POST">
        @csrf
        <input type="hidden"   name="id" value="{{ $fl->f_id }}">
        <input type="text"  class="mb-2 form-control" placeholder="კოდი" name="code" value="{{ $fl->code }}">
        <select name="fly_from" class="form-control mb-2">
        	@foreach (App\Airport::get() as $ap)
        		<option value="{{ $ap->a_id }}">{{ $ap->name }}</option>
        	@endforeach
        </select>
        <select name="fly_to" class="form-control mb-2">
        	@foreach (App\Airport::get() as $ap)
        		<option value="{{ $ap->a_id }}">{{ $ap->name }}</option>
        	@endforeach
        </select>
        <input type="text"  class="mb-2 form-control" placeholder="აფრებნის დრო" name="fly_from_time" value="{{ $fl->fly_from_time }}">
        <input type="text"  class="mb-2 form-control" placeholder="დაფრენის დრო" name="fly_to_time" value="{{ $fl->fly_to_time }}">
        <button class="mt-2 btn btn-primary w-100">დამატება</button>
    </form>
</div>
@endsection
