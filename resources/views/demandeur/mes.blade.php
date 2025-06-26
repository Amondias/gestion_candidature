@extends('layouts.master')

@section('title', 'Mes publications (Candidatures)')

@section('content')
    <section class="content">
        <div class="box box-success">
            <div class="box-header">Mes candidatures</div>
            
            <div class="box-body">
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Mes candidatures sur le marché</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" colspan="1">Id</th>
                                            <th rowspan="1" colspan="1">Nom complet</th>
                                            <th rowspan="1" colspan="1">Numéro de téléphone</th>
                                            <th rowspan="1" colspan="1">E-mail</th>
                                            <th rowspan="1" colspan="1">Domaine de travail</th>
                                            <th rowspan="1" colspan="1">Publication</th>
                                            <th rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <tbody> 
                                        @forelse ($demandes as $demande)
                                        <tr class="odd">
                                                <td>{{ $demande->id }}</td>
                                                <td>{{ $demande->nom_complet }}</td>
                                                <td>{{ $demande->numero }}</td>
                                                <td>{{ $demande->email }}</td>
                                                <td>{{ $demande->domaine }}</td>
                                                <td>{{ $demande->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <a href="{{ route('demande.show', $demande->id) }}">Détails</a>
                                                    <a href="{{ route('demande.edit', $demande->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                                    <form action="{{ route('demande.destroy', $demande->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette demande ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Aucune demande trouvée.</td>
                                            </tr>
                                        @endforelse
                               
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                    Showing 1 to 25 of 57 entries
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                    <ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">
                                            Previous
                                        </a>
                                    </li>
                                    <li class="paginate_button page-item active">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">
                                            1
                                        </a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">
                                            2
                                        </a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">
                                            3
                                        </a>
                                    </li>
                                    <li class="paginate_button page-item next" id="dataTable_next">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">
                                            Next
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection