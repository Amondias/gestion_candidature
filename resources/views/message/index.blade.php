@extends('layouts.master')
@section('title', 'Messagerie')

@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- Liste des utilisateurs --}}
        <div class="col-md-3 border-right">
            <h4>Utilisateurs</h4>
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item">
                        {{ $user->name }}<br>
                        <small>{{ $user->email }}</small>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Zone de chat --}}
        <div class="col-md-9">
            <h4>Envoyer un message</h4>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('messages.send') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email du destinataire</label>
                    <input type="email" name="receiver_email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" rows="4" class="form-control" required></textarea>
                </div>
                <button class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>
@endsection
