<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header bg-primary">
                <h4 class="card-title text-center text-light"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form action="{{ ($title == 'Nouvel Eleve') ? route('eleve.store') : route('eleve.update', $eleve->id) }}" method="POST">
                    @csrf
                    
					<div class="row">                        <!-- Champ nom -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Nom:</label>
                                <input class="form-control" name="nom" value="{{ $eleve->nom ?? old('nom') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Champ prenom -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Prenom:</label>
                                <input class="form-control" name="prenom" value="{{ $eleve->prenom ?? old('prenom') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

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
