@extends('layout.admin.app')

@section('title', 'Отчеты')

@section('content')
    <h3>Отчет "Итого" будет сформирован и отправлен вам на почту</h3>
    <hr>
    <br>
    <summary-report :user-id="{{ auth()->id() }}"></summary-report>
@endsection
