{{-- resources/views/commandes/index.blade.php --}}

@extends('layouts.dashboard')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="card">
                <div class="card-header">
                    Liste des Commandes
                </div>

                <div class="card-body">

                   @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                    @if($commandes->isEmpty())
                        <div class="alert alert-info">
                            Aucune commande n'est disponible pour le moment.
                        </div>
                    @else

                        <table class="table" id="table-1">
                            <thead>
                                <tr>
                                     <th>Utilisateur</th>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Mode règlement</th>
                                    <th>État</th>
                                    <th>Payé</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($commandes as $commande)
                                    <tr>
                                          <td>
                                            {{ $commande->user->nom ?? '' }}
                                            {{ $commande->user->prenom ?? '' }}
                                        </td>
                                        <td>{{ $commande->date }}</td>
                                        <td>{{ $commande->time }}</td>


                                        <td>
                                            {{ $commande->modeReglement->mode_reglements ?? 'Non spécifié' }}
                                        </td>

                                        <td>
                                            {{ $commande->etat->etat ?? 'N/A' }}
                                        </td>
                                        <td>
                                            <span class="badge {{ $commande->regle ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $commande->regle ? 'Oui' : 'Non' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                {{ $commande->total }} DH
                                            </span>
                                        </td>
                                        <td>

                                            {{-- DETAIL BUTTON --}}
                                            <a href="#"
                                                class="text-success me-6"
                                               data-bs-toggle="modal"
                                               data-bs-target="#detailModal{{ $commande->id }}">
                                                <i class="fas fa-circle-info text-2xl"></i>
                                            </a>

                                            {{-- EDIT --}}
                                            <a href="#"
                                               class="text-blue-500 hover:text-blue-700 me-6"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $commande->id }}">
                                                    <i class="fas fa-pen text-2xl"></i>
                                                </a>

                                            {{-- DELETE --}}
                                            <form action="{{ route('commandes.destroy', $commande->id) }}"
                                                  method="POST"
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        onclick="return confirm('Supprimer cette commande ?')"
                                                        class="text-danger border-0 bg-transparent">
                                                    <i class="fas fa-trash text-2xl"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    @endif

                </div>
            </div>

        </div>
    </div>
</div>

{{-- ================= MODALS ================= --}}
@foreach($commandes as $commande)

<div class="modal fade" id="detailModal{{ $commande->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">
    Détails Commande de {{ $commande->user->nom ?? '' }} {{ $commande->user->prenom ?? '' }}
</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-2">
                    <strong>Date:</strong> {{ $commande->date }} <br>
                    <strong>Heure:</strong> {{ $commande->time }}
                </div>

                <hr>

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix HT</th>
                            <th>TVA</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($commande->detailsCommandes as $detail)
                            <tr>
                                <td>{{ $detail->produit->designation ?? '' }}</td>
                                <td>{{ $detail->quantite }}</td>
                                <td>{{ $detail->prix_ht }}</td>
                                <td>{{ $detail->tva }}%</td>
                                <td>
                                {{ $detail->quantite * $detail->prix_ht }} DH
                             </td>
                            </tr>
                          
                        @endforeach
                    </tbody>
                </table>
<hr>

<h5 class="text-end">
    Total Commande:
    <span class="text-success">
        {{ $commande->total }} DH
    </span>
</h5>
            </div>

        </div>
    </div>
</div>


{{-- ================= editModal ================= --}}

<div class="modal fade" id="editModal{{ $commande->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Modifier Commande #{{ $commande->id }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('commandes.update', $commande->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    {{-- USER --}}
                    <div class="mb-3">
                        <label>User</label>
                        <input type="text" class="form-control"
                               value="{{ $commande->user->nom ?? '' }}"
                               disabled>
                    </div>

                    {{-- MODE REGLEMENT --}}
                    <div class="mb-3">
                        <label>Mode règlement</label>
                        <select name="mode_reglements_id" class="form-control">
                            @foreach($modesReglement ?? [] as $mode)
                                <option value="{{ $mode->id }}"
                                    {{ $commande->mode_reglements_id == $mode->id ? 'selected' : '' }}>
                                    {{ $mode->mode_reglements }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- ETAT --}}
                    <div class="mb-3">
                        <label>État</label>
                        <select name="etat_id" class="form-control">
                            @foreach($etats ?? [] as $etat)
                                <option value="{{ $etat->id }}"
                                    {{ $commande->etat_id == $etat->id ? 'selected' : '' }}>
                                    {{ $etat->etat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- PAYÉ --}}
                    <div class="mb-3">
                        <label>Payé</label>
                        <select name="regle" class="form-control">
                            <option value="1" {{ $commande->regle ? 'selected' : '' }}>Oui</option>
                            <option value="0" {{ !$commande->regle ? 'selected' : '' }}>Non</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Sauvegarder
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>



@endforeach


@endsection