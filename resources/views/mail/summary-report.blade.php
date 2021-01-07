@component('mail::message')
    # Introduction

    Отчет итого:

    @foreach($reportData as $key => $value)
        {{ $key }}: {{ $value }}
    @endforeach

    {{ config('app.name') }}
@endcomponent
