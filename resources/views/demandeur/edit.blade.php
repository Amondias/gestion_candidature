@extends('layouts.master')
@section('title', "Création de demande d'emploi")
@section('content')
<div class="container">
    <h2>Créer une demande</h2>
    <form method="POST" action="{{ route('demande.store') }}">
        @csrf
        <div class="form-group">
            <label>Nom Complet</label>
            <input type="text" name="nom_complet" class="form-control" value="{{$demande->nom_complet}}" required>
        </div>
        <div class="form-group col-md-6">
            <label>Numéro de téléphone</label>
            <textarea name="numero" class="form-control" value="{{$demande->numero}}" required></textarea>
        </div>
        <div class="form-group col-md-6">
            <label>E-mail</label>
            <textarea name="email" class="form-control" value="{{$demande->email}}" required></textarea>
        </div>
        
        <div class="form-group col-md-8">
            <label>Domaine</label>
            <input type="text" name="domaine_de_travail" class="form-control" value="{{$demande->domaine}}" required>
        </div>

        <div class="form-group">
            <label>Spécialisation</label>
            <input type="text" name="specialisation" class="form-control" value="{{$demande->specialisation}}">
        </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label style="width: 120px">Qualifications</label>
            <textarea name="qualification" class="form-control" rows="7" value="{{$demande->qualification}}" required></textarea>
        </div>
        <div class="form-group col-md-4">
            <label style="width: 120px">Compétences</label>
            <textarea name="competence" class="form-control" rows="7" value="{{$demande->competence}}" required></textarea>
        </div>
        </div>

        <button type="submit" class="btn btn-success mt-2">Mettre à jour</button>
    </form>
</div>
@endsection