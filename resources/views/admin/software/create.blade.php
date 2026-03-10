@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Додати нове ПЗ</h1>

    <form action="{{ route('admin.software.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Назва:</label>
            <input type="text" name="Title" value="{{ old('Title') }}">
            @error('Title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Опис:</label>
            <textarea name="Description">{{ old('Description') }}</textarea>
            @error('Description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Ціна:</label>
            <input type="number" step="0.01" name="Price" value="{{ old('Price') }}">
            @error('Price')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Дата виходу:</label>
            <input type="date" name="ReleaseDate" value="{{ old('ReleaseDate') }}">
            @error('ReleaseDate')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Зберегти</button>
        <a href="{{ route('admin.software.index') }}">Скасувати</a>
    </form>
</div>
@endsection