@extends('layouts.master')
@section('title', "Création d'offre d'emploi")
@section('content')
<div class="container">
    <h2>Créer un'offre</h2>
    <form method="POST" action="{{ route('offre.store') }}">
        @csrf
        <div class="form-group">
            <label>Nom de l'entreprise</label>
            <input type="text" name="nom_entreprise" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label>Numéro de téléphone</label>
            <textarea name="numero" class="form-control"required></textarea>
        </div>
        <div class="form-group col-md-6">
            <label>E-mail</label>
            <textarea name="email" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Poste proposé</label>    
            <input type="text" name="poste" class="form-control" required>
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

        <button type="submit" class="btn btn-success mt-2">Créer</button>
    </form>
</div>
@endsection