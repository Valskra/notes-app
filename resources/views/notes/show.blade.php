@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $note->title }}</h1>

    <p>{{ $note->content }}</p>

    <a href="{{ route('notes.edit', $note) }}" class="btn btn-secondary">Modifier</a>
    <form action="{{ route('notes.destroy', $note) }}" method="POST" class="d-inline"
        onsubmit="return confirm('Supprimer cette note ?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Supprimer</button>
    </form>
    <a href="{{ route('notes.index') }}" class="btn btn-outline-primary">Retour à la liste</a>
</div>
@endsection