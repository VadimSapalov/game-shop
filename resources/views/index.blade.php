@extends('layouts.app')

@section('title', 'Game Shop')

@section('content')
    <h1>Всі ігри</h1>
    <div class="row row-cols-1">
        <x-card title="Devil May Cry 5" publisher="Capcom"/>
        <x-card title="Elden Ring" publisher="Bandai Namco"/>
        <x-card title="Hades II" publisher="Supergiant Games"/>
    </div>
@endsection