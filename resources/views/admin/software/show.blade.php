@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Деталі: {{ $software->Title }}</h1>
    <ul>
        <li><strong>ID:</strong> {{ $software->id }}</li>
        <li><strong>Опис:</strong> {{ $software->Description }}</li>
        <li><strong>Ціна:</strong> {{ $software->Price }}</li>
        <li><strong>Дата виходу:</strong> {{ $software->ReleaseDate }}</li>
    </ul>

    <a href="{{ route('admin.software.index') }}">
        <button type="button">Назад до списку</button>
    </a>
</div>
@endsection