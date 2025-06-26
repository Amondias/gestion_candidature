@extends('layouts.master')
@section('title', 'Conversation')
@section('content')
<div class="container">
    <h3>Conversation avec {{ $otherUser->name }}</h3>

    <div class="mb-4">
        @foreach ($messages as $message)
            <div class="alert {{ $message->sender_id == auth()->id() ? 'alert-primary' : 'alert-secondary' }}">
                <strong>{{ $message->sender->name }} :</strong>
                {{ $message->content }}<br>
                <small class="text-muted">{{ $message->created_at->format('d/m/Y H:i') }}</small>
            </div>
        @endforeach
    </div>

    <form action="{{ route('messages.send') }}" method="POST">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $otherUser->id }}">
        <div class="form-group">
            <textarea name="content" class="form-control" rows="3" required placeholder="Écrire un message..."></textarea>
        </div>
        <button class="btn btn-success">Envoyer</button>
    </form>
</div>
@endsection
