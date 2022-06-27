@extends ('layouts.app')

@section ('content')
    <div style="position: relative; top 40%; left: 40%">
        <h1> Bienvenido {{Auth::user()->nombre}} </h1>
    </div>

@endsection
