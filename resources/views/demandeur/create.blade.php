@extends('layouts.master')
@section('title', "Création de demande d'emploi")
@section('content')
<div class="container">
    <h2>Créer une demande</h2>
    <form method="POST" action="{{ route('demande.store') }}">
        @csrf
        <div class="form-group">
            <label>Nom Complet</label>
            <input type="text" name="nom_complet" class="form-control" value="Par : {{ Auth::user()->name }}" required readonly>
        </div>
        <div class="form-group col-md-6">
            <label>Numéro de téléphone</label>
            <textarea name="numero" class="form-control"required></textarea>
        </div>
        <div class="form-group col-md-6">
            <label>E-mail</label>
            <textarea name="email" class="form-control" required></textarea>
        </div>
        
        <div class="form-group col-md-8">
            <label>Domaine</label>
            <input type="text" name="domaine" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Spécialisation</label>
            <input type="text" name="specialisation" class="form-control">
        </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label style="width: 120px">Qualifications</label>
            <textarea name="qualification" class="form-control" rows="7" required></textarea>
        </div>
        <div class="form-group col-md-4">
            <label style="width: 120px">Compétences</label>
            <textarea name="competence" class="form-control" rows="7" required></textarea>
        </div>
        </div>

        <button href="{{route('demande.dashboard')}}" type="submit" class="btn btn-success mt-2">Créer</button>
    </form>
</div>
@endsection