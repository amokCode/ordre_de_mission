<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header bg-primary">
                <h4 class="card-title text-center text-light"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form action="{{ ($title == 'Nouvel Mission') ? route('mission.store') : route('mission.update', $mission->id) }}" method="POST">
                    @csrf
                    <h3>Informations générales</h3>
					<div class="row">
                        <!-- Champ nom -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Dénomination<span class="text-danger">*</span>:</label>
                                <input class="form-control" required type="search" name="nom" placeholder="Exp: Dépôt Mobile money" value="{{ $mission->nom ?? old('nom') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                        <!-- Champ responsable -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Responsable<span class="text-danger">*</span>:</label>
                                <input class="form-control" required type="text" name="responsable" value="{{ $mission->responsable ?? "Amoq DOPEGNON" }}" {{ ($show) ? 'disabled' : ''}}>
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
                                <input class="form-control" required type="search" name="nom_client" value="{{ $mission->nom_client ?? old('nom_client') }}" {{ ($show) ? 'disabled' : ''}}>
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
                                <input class="form-control" required type="search" name="lieu" value="{{ $mission->lieu ?? old('lieu') }}" {{ ($show) ? 'disabled' : ''}}>
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
                                <label> Date Début<span class="text-danger">*</span>:</label>
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
                                <label> Heure Début<span class="text-danger">*</span>:</label>
                                <input class="form-control" type="time" name="heure_debut" value="{{ $mission->heure_debut ?? old('heure_debut') }}" {{ ($show) ? 'disabled' : ''}}>
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
                                <input class="form-control" type="time" name="heure_fin" value="{{ $mission->heure_fin ?? old('heure_fin') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					{{-- <div class="row">
                        <!-- Champ description -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Description:</label>
                                <textarea class="form-control" name="description" {{ ($show) ? 'disabled' : ''}} rows="5">{{ $mission->description ?? old('description') }}</textarea>
                                <input class="form-control" type="text" name="description" value="" >
                                @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror
                            </div>
                        </div>
					</div> --}}
                    <h3 class="mt-4">Informations sur le Terrain</h3>
					<div class="row">
                        <!-- Champ observation -->
                        <div class="col-md-6">
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
                        <!-- Champ solution -->
                        <div class="col-md-6">
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
                        <!-- Champ arrete -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Arrêté:</label>
                                <input class="form-control" type="text" name="arrete" value="{{ $mission->arrete ?? old('arrete') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- <textarea class="form-control" name="arrete" {{ ($show) ? 'disabled' : ''}} rows="5">{{ $mission->arrete ?? old('arrete') }}</textarea> --}}
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                        <!-- Champ prochaine_rencontre -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Prochaine rencontre:</label>
                                <input class="form-control" type="date" name="prochaine_rencontre" value="{{ $mission->prochaine_rencontre ?? old('prochaine_rencontre') }}" {{ ($show) ? 'disabled' : ''}}>
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
