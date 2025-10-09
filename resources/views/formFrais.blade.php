@extends('layouts.master')

@section('content')
    <form method="POST" action="{{ url('/validerFrais') }}">
        {{ csrf_field() }}

        <h1>@if ($unFrais->id_frais) Fiche @else Ajout @endif de frais</h1>
        <div class="col-md-12 card card-body bg-light">
            @if ($unFrais->id_frais) <input type="hidden" name="id" class="form-control" value="{{$unFrais->id_frais}}" required> @endif

            <div class="form-group">
                <label class="col-md-3">Année-Mois</label>
                <div class="col-md-6">
                    <input type="month" name="annee-mois" class="form-control" value="{{$unFrais->anneemois}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Montant saisi</label>
                <div class="col-md-6">
                    <input type="number" name="montant-saisi" class="form-control " min="0" step="0.01" value="" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Nombre de justificatifs</label>
                <div class="col-md-6">
                    <input type="number" name="nb-justificatifs" class="form-control" min="0" value="{{$unFrais->nbjustificatifs}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Montant validé</label>
                <div class="col-md-6">
                    <input type="number" name="montant-validé" class="form-control" min="0" step="0.01" value="{{$unFrais->montantvalide}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">État</label>
                <div class="col-md-6">
                    <select class="form-select form-control" name="etat" required>
                        <option value="" @if (!($unFrais->id_etat < 1) && !($unFrais->id_etat > 4)) selected @endif>--- Sélectionnez un état ---</option>
                        <option value="1" @if ($unFrais->id_etat == 1) selected @endif>Saisie clôturée</option>
                        <option value="2" @if ($unFrais->id_etat == 2) selected @endif>Fiche créée, saisie en cours</option>
                        <option value="3" @if ($unFrais->id_etat == 3) selected @endif>Remboursée</option>
                        <option value="4" @if ($unFrais->id_etat == 4) selected @endif>Validée et mise en paiement</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-md-12 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        @if ($unFrais->id_frais) Modifier @else Valider @endif
                    </button>
                    <button type="button" class="btn btn-secondary"
                            @if ($unFrais->id_frais) onclick="if (confirm ('Annuler la saisie ?')) window.location='{{ url('/listerFrais') }}';">
                        @else onclick="if (confirm ('Annuler la saisie ?')) window.location='{{ url('/') }}';">
                        @endif
                        Annuler
                    </button>
                </div>
            </div>

        </div>
    </form>

    @if(isset($erreur))
        <div class="alert alert-danger" role="alert">{{ $erreur }}</div>
    @endif
@endsection
