@extends('layouts.master')

@section('title', "Détails de l'offre d'emploi")

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
    {{-- Logo ou photo de l’entreprise --}}
    <div class="profile-photo">
        Logo<br>de l'entreprise
    </div>

    <h2>Fiche de l'offre d'emploi</h2>

    {{-- Informations sur l’entreprise --}}
    <div class="section-title">Entreprise</div>
    <div class="info"><strong>Nom :</strong> {{ $offre->nom_entreprise }}</div>
    <div class="info"><strong>Numéro de téléphone :</strong> {{ $offre->numero }}</div>
    <div class="info"><strong>E-mail :</strong> {{ $offre->email }}</div>

    {{-- Détails de l’offre --}}
    <div class="section-title">Poste proposé</div>
    <div class="info"><strong>Intitulé du poste :</strong> {{ $offre->poste }}</div>

    <div class="section-title">Domaine et spécialisation</div>
    <div class="info"><strong>Domaine :</strong> {{ $offre->domaine }}</div>
    <div class="info"><strong>Spécialisation :</strong> {{ $offre->specialisation }}</div>

    {{-- Qualifications --}}
    <div class="section-title">Qualifications requises</div>
    <div class="info">{{ $offre->qualification }}</div>

    {{-- Compétences --}}
    <div class="section-title">Compétences</div>
    <div class="info">{{ $offre->competence }}</div>

    {{-- Actions --}}
    <div class="no-print mt-4">
        <a href="{{ route('offre.dashboard') }}" class="btn btn-secondary">Retour</a>
        <button onclick="window.print()" class="btn btn-primary">Imprimer</button>
    </div>
</div>
@endsection
