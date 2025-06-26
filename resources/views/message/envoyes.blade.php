@extends('layouts.master')
@section('title', 'Messages envoyés')
@section('content')
<div class="container">
    <h3>Messages envoyés</h3>
    <ul class="list-group">
        @forelse ($messagesEnvoyes as $message)
            <li class="list-group-item">
                <strong>À :</strong> {{ $message->receiver->name }} <br>
                <strong>Message :</strong> {{ Str::limit($message->content, 50) }} <br>
                <a href="{{ route('messages.conversation', $message->receiver->id) }}" class="btn btn-sm btn-primary mt-1">Voir la discussion</a>
            </li>
        @empty
            <li class="list-group-item">Aucun message envoyé.</li>
        @endforelse
    </ul>
</div>
@endsection
