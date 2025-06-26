@extends('layouts.master')

@section('title', 'Mes suivis')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Mes suivis</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste de mes suivis</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Publicateur</th> <!-- Colonne renommée -->
                            <th>Date de publication</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($follows as $follow)
                            <tr>
                                <td>
                                    @if($follow->followable_type === 'App\Models\Demande')
                                        <span class="badge badge-info">Demande</span>
                                    @else
                                        <span class="badge badge-success">Offre</span>
                                    @endif
                                </td>
                                <td>
                                    @if($follow->followable_type === 'App\Models\Demande')
                                        {{ $follow->followable->user->name }}
                                    @else
                                        {{ $follow->followable->nom_entreprise }}
                                    @endif
                                </td>
                                <td>{{ $follow->followable->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ $follow->followable_type === 'App\Models\Demande' ? route('demande.show', $follow->followable_id) : route('offre.show', $follow->followable_id) }}" 
                                    class="btn btn-sm btn-primary">
                                        Voir
                                    </a>
                                    <form action="{{ route('follow.toggle') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="followable_id" value="{{ $follow->followable_id }}">
                                        <input type="hidden" name="followable_type" value="{{ $follow->followable_type }}">
                                        <button type="submit" class="btn btn-sm btn-danger">Ne plus suivre</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Vous ne suivez aucun élément pour le moment.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                {{ $follows->links() }}
            </div>
        </div>
    </div>
</div>
@endsection