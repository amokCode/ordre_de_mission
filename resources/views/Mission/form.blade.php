<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header bg-primary">
                <h4 class="card-title text-center text-light"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form action="{{ ($title == 'Nouvel Mission') ? route('mission.store') : route('mission.update', $mission->id) }}" method="POST">
                    @csrf

					<div class="row">
                        <!-- Champ nom -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Nom:</label>
                                <input class="form-control" type="text" name="nom" value="{{ $mission->nom ?? old('nom') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ nom_client -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Nom du Client<span class="text-danger">*</span>:</label>
                                <input class="form-control" required type="text" name="nom_client" value="{{ $mission->nom_client ?? old('nom_client') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Champ lieu -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Lieu<span class="text-danger">*</span>:</label>
                                <input class="form-control" required type="text" name="lieu" value="{{ $mission->lieu ?? old('lieu') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ date_debut -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Date Debut<span class="text-danger">*</span>:</label>
                                <input class="form-control" required type="date" name="date_debut" value="{{ $mission->date_debut ?? old('date_debut') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Champ heure_debut -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> Heure Debut<span class="text-danger">*</span>:</label>
                                <input class="form-control" required type="time" name="heure_debut" value="{{ $mission->heure_debut ?? old('heure_debut') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Champ date_fin -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Date Fin<span class="text-danger">*</span>:</label>
                                <input class="form-control" required type="date" name="date_fin" value="{{ $mission->date_fin ?? old('date_fin') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Champ heure_fin -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> Heure Fin<span class="text-danger">*</span>:</label>
                                <input class="form-control" required type="time" name="heure_fin" value="{{ $mission->heure_fin ?? old('heure_fin') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ responsable -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Responsable<span class="text-danger">*</span>:</label>
                                <input class="form-control" required type="text" name="responsable" value="{{ $mission->responsable ?? old('responsable') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ description -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Description:</label>
                                <textarea class="form-control" name="description" {{ ($show) ? 'disabled' : ''}} rows="5">{{ $mission->description ?? old('description') }}</textarea>
                                {{-- <input class="form-control" type="text" name="description" value="" > --}}
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ observation -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Observation:</label>
                                <textarea class="form-control" name="observation" {{ ($show) ? 'disabled' : ''}} rows="5">{{ $mission->observation ?? old('observation') }}</textarea>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ solution -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Solution:</label>
                                <textarea class="form-control" name="solution" {{ ($show) ? 'disabled' : ''}} rows="5">{{ $mission->solution ?? old('solution') }}</textarea>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ recommandation -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Recommandation:</label>
                                <textarea class="form-control" name="recommandation" {{ ($show) ? 'disabled' : ''}} rows="5">{{ $mission->recommandation ?? old('recommandation') }}</textarea>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ arrete -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Arreté:</label>
                                <textarea class="form-control" name="arrete" {{ ($show) ? 'disabled' : ''}} rows="5">{{ $mission->arrete ?? old('arrete') }}</textarea>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ statut -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Statut<span class="text-danger">*</span>:</label>
                                {{-- <input list="statut" class="form-control" type="text" required name="statut" value="{{ $mission->statut ?? old('statut') }}" {{ ($show) ? 'disabled' : ''}}> --}}
                                <select class="form-control" name="statut">
                                    <option value="En Attente">En Attente</option>
                                    <option value="En Cours">En Cours</option>
                                    <option value="Terminé">Terminé</option>
                                </select>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Champ date_report -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Date de Report:</label>
                                <input class="form-control" type="date" name="date_report" value="{{ $mission->date_report ?? old('date_report') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

                    <div class="text-right">
                        <a href="{{ route('mission.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Fermer</a>
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
