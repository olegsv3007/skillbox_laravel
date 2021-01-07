@extends('layout.admin.app')

@section('title', 'Отчеты')

@section('content')
<h3>Отчеты</h3>
<hr>
<br>
<a type="button" href="{{ route('summary') }}" class="btn btn-info">Итого</a>
<br><br>
@endsection
