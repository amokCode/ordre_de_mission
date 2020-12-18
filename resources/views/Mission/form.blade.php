<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header bg-primary">
                <h4 class="card-title text-center text-light"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form action="{{ ($title == 'Nouvel Mission') ? route('mission.store') : route('mission.update', $mission->id) }}" method="POST">
                    @csrf
                                        <!-- Champs id -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="id"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs numero -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="numero"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs nom_client -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="nom_client"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs lieu -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="lieu"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs date_debut -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="date_debut"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs date_fin -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="date_fin"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs heure_debut -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="heure_debut"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs heure_fin -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="heure_fin"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs responsable -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="responsable"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs description -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="description"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs observation -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="observation"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs solution -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="solution"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs recommandation -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="recommandation"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs arrete -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="arrete"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs statut -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="statut"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs date_report -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="date_report"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs libelle_depense -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="libelle_depense"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs prix_depense -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="prix_depense"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs qte_depense -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="qte_depense"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs montant_depense -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="montant_depense"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs total_depense -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="total_depense"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs created_at -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="created_at"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                    </div>


                    <!-- Champs updated_at -->
                    <div class="row">
                        <div class="col-md-">
                            <div class="form-group">
                                <label> :</label>
                                <input
                                    
                                    type=""
                                    name="updated_at"
                                    class="form-control"
                                    placeholder=""
                                    value="{{ $mission->nom ?? old('nom_mission') }}" {{ ($show) ? 'disabled' : ''}}>
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
