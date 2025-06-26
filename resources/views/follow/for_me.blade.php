@extends('layouts.master')

@section('title', 'Suivi pour moi')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Suivi pour moi</h1>
    
    <div class="row">
        <!-- Demandes suivies -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personnes suivant mes demandes</h6>
                </div>
                <div class="card-body">
                    @forelse($demandeFollows as $follow)
                        <div class="mb-3 p-3 border-bottom">
                            <h5>{{ $follow->followable->titre }}</h5>
                            <p>
                                <strong>Suivi par:</strong> {{ $follow->user->name }}<br>
                                <strong>Contact:</strong> {{ $follow->user->email }}
                            </p>
                            <a href="{{ route('demande.show', $follow->followable_id) }}" class="btn btn-sm btn-info">
                                Voir la demande
                            </a>
                        </div>
                    @empty
                        <p class="text-muted">Personne ne suit vos demandes pour le moment.</p>
                    @endforelse
                </div>
            </div>
        </div>
        
        <!-- Offres suivies -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personnes suivant mes offres</h6>
                </div>
                <div class="card-body">
                    @forelse($offreFollows as $follow)
                        <div class="mb-3 p-3 border-bottom">
                            <h5>{{ $follow->followable->nom_entreprise }}</h5>
                            <p>
                                <strong>Suivi par:</strong> {{ $follow->user->name }}<br>
                                <strong>Contact:</strong> {{ $follow->user->email }}
                            </p>
                            <a href="{{ route('offre.show', $follow->followable_id) }}" class="btn btn-sm btn-info">
                                Voir l'offre
                            </a>
                        </div>
                    @empty
                        <p class="text-muted">Personne ne suit vos offres pour le moment.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection