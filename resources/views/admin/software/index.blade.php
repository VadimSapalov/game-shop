@extends('layouts.app')

@section('title', 'Game Shop')

@section('content')
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Дії</th>
        </tr>
    </thead>
    <tbody>
        @foreach($softwares as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->Title }}</td>
            <td>
                <a href="{{ route('admin.software.show', $item->id) }}">
                    <button type="button">Переглянути</button>
                </a>
                
                <form action="{{ route('admin.software.destroy', $item->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Ви впевнені, що хочете видалити?')">Видалити</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection