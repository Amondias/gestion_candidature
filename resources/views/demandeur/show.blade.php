@extends('layouts.master')

@section('title', "Détails de la demande d'emploi")

@section('content')
<style>
    @media print {
        .no-print {
            display: none;
        }
    }
    .page-a4 {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: auto;
        background: white;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .profile-photo {
        width: 120px;
        height: 120px;
        border: 1px solid #ccc;
        float: right;
        margin-top: -10px;
        text-align: center;
        font-size: 12px;
        color: #aaa;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .section-title {
        font-weight: bold;
        margin-top: 25px;
        margin-bottom: 10px;
        font-size: 18px;
        border-bottom: 1px solid #ccc;
    }
    .info {
        margin-bottom: 10px;
        font-size: 16px;
    }
</style>

<div class="page-a4">
    {{-- Photo de profil --}}
    <div class="profile-photo">
        Photo<br>de profil
    </div>

    <h2>Dossier de demande d'emploi</h2>

    {{-- Informations personnelles --}}
    <div class="section-title">Informations personnelles</div>
    <div class="info"><strong>Nom complet :</strong> {{ $demande->nom_complet }}</div>
    <div class="info"><strong>Numéro de téléphone :</strong> {{ $demande->numero }}</div>
    <div class="info"><strong>E-mail :</strong> {{ $demande->email }}</div>

    {{-- Détails professionnels --}}
    <div class="section-title">Informations professionnelles</div>
    <div class="info"><strong>Domaine :</strong> {{ $demande->domaine }}</div>
    <div class="info"><strong>Spécialisation :</strong> {{ $demande->specialisation }}</div>

    {{-- Qualification --}}
    <div class="section-title">Qualifications</div>
    <div class="info">{{ $demande->qualification }}</div>

    {{-- Compétences --}}
    <div class="section-title">Compétences</div>
    <div class="info">{{ $demande->competence }}</div>

    {{-- Bouton retour ou impression --}}
    <div class="no-print mt-4">
        <a href="{{ route('demande.dashboard') }}" class="btn btn-secondary">Retour</a>
        <button onclick="window.print()" class="btn btn-primary">Imprimer</button>
    </div>
</div>
@endsection
