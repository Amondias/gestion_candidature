@extends('layouts.master')
@section('title', 'Messages reçus')
@section('content')
<div class="container">
    <h3>Messages reçus</h3>
    <ul class="list-group">
        @forelse ($messagesRecus as $message)
            <li class="list-group-item">
                <strong>De :</strong> {{ $message->sender->name }} <br>
                <strong>Sujet :</strong> {{ Str::limit($message->content, 50) }} <br>
                <a href="{{ route('messages.conversation', $message->sender->id) }}" class="btn btn-sm btn-primary mt-1">Voir la discussion</a>
            </li>
        @empty
            <li class="list-group-item">Aucun message reçu.</li>
        @endforelse
    </ul>
</div>
@endsection
