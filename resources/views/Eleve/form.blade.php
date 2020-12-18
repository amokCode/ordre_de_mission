<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header bg-primary">
                <h4 class="card-title text-center text-light"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form action="{{ ($title == 'Nouvel Eleve') ? route('eleve.store') : route('eleve.update', $eleve->id) }}" method="POST">
                    @csrf
                    <row_start>

                        <!-- Champ nom_eleve -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Nom du Test:</label>
                                <input class="form-control" name="nom_eleve" value="{{ $eleve->nom ?? old('nom_eleve') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					<row_end>
<row_start>

                        <!-- Champ prenom_eleve -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Prenom du Test:</label>
                                <input class="form-control" name="prenom_eleve" value="{{ $eleve->prenom ?? old('prenom_eleve') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					<row_end>

                    <div class="text-right">
                        <a href="{{ route('eleve.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Fermer</a>
                        @if(!$show)
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-floppy-o"></i> Enregistrer
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
