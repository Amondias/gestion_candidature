@extends('layouts.master')
@section('title', "Création d'offre' d'emploi")
@section('content')
<div class="container">
    <h2>Créer une offre</h2>
    <form method="POST" action="{{ route('offre.store') }}">
        @csrf
        <div class="form-group">
            <label>Nom de l'entreprise</label>
            <input type="text" name="nom_entreprise" class="form-control" value="{{$offre->nom_entreprise}}" required>
        </div>
        <div class="form-group col-md-6">
            <label>Numéro de téléphone</label>
            <textarea name="numero" class="form-control" value="{{$offre->numero}}" required></textarea>
        </div>
        <div class="form-group col-md-6">
            <label>E-mail</label>
            <textarea name="email" class="form-control" value="{{$offre->email}}" required></textarea>
        </div>
        
        <div class="form-group col-md-8">
            <label>Domaine</label>
            <input type="text" name="domaine_de_travail" class="form-control" value="{{$offre->domaine}}" required>
        </div>

        <div class="form-group">
            <label>Spécialisation</label>
            <input type="text" name="specialisation" class="form-control" value="{{$offre->specialisation}}">
        </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label style="width: 120px">Qualifications</label>
            <textarea name="qualification" class="form-control" rows="7" value="{{$offre->qualification}}" required></textarea>
        </div>
        <div class="form-group col-md-4">
            <label style="width: 120px">Compétences</label>
            <textarea name="competence" class="form-control" rows="7" value="{{$offre->competence}}" required></textarea>
        </div>
        </div>

        <button type="submit" class="btn btn-success mt-2">Mettre à jour</button>
    </form>
</div>
@endsection