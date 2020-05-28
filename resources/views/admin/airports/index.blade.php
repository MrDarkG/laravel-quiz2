@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-sm-between">
        <div>
            აეროპორტები
        </div>
        <div>
            <button class="btn bg-transparent">
                <a href="{{ route('adminairports') }}">
                    დამატება
                </a>
            </button>
        </div>

    </div>
    <hr>
    <table class="table table-light">
        <tr>
            <td>კოდი</td>
            <td>სახელი</td>
            <td>ქვეყანა</td>
            <td>დროის სარტყელი</td>
            <td>მოწმედება</td>
        </tr>
        @foreach ($airports as $air)
            <tr>
                <td>{{ $air->code }}</td>                
                <td>{{ $air->name }}</td>                
                <td>{{ $air->country }}</td>                
                <td>{{ $air->gmt }}</td>                
                <td>
                    <a class="btn btn-primary w-100 mb-2" href="{{ route('adminairportsedit',["id"=>$air->a_id]) }}">
                        ჩასწორება
                    </a>
                    <form action="{{ route('adminairportsdestroy') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $air->a_id }}">
                        <button class="btn btn-danger w-100">
                            წაშლა
                        </button>
                    </form>
                </td>                
            </tr>
        @endforeach
    </table>


    <hr>


    <div class="row justify-content-sm-between">
        <div>
            ფრენები
        </div>
        <div>
            <button class="btn bg-transparent">
                <a href="{{ route('createflights') }}">
                    დამატება
                </a>
            </button>
        </div>

    </div>
    <hr>
    <table class="table table-light">
        <tr>
            <td>კოდი</td>
            <td>საიდან</td>
            <td>სად</td>
            <td>გაფრენის დრო</td>
            <td>დაფრენის დრო</td>
            <td>მოქმედება</td>
        </tr>
        @foreach ($flights as $flight)
            <tr>
                <td>{{ $flight->code }}</td>                
                <td>{{ $flight->fly_from }}</td>                
                <td>{{ $flight->fly_to }}</td>                
                <td>{{ $flight->fly_from_time }}</td>                
                <td>{{ $flight->fly_to_time }}</td>                
                <td>
                    <a class="btn btn-primary w-100 mb-2" href="{{ route('editflight',["id"=>$flight->f_id]) }}">
                        ჩასწორება
                    </a>
                    <form action="{{ route('delfli') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $flight->f_id }}">
                        <button class="btn btn-danger w-100">
                            წაშლა
                        </button>
                    </form>
                </td>                
            </tr>
        @endforeach
    </table>
</div>
@endsection
