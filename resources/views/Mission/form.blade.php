<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header bg-primary">
                <h4 class="card-title text-center text-light"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form action="{{ ($title == 'Nouvelle Mission') ? route('mission.store') : route('mission.update', $car->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        {{-- Nom du Client --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Nom du client:</label>
                                <input required type="text" name="nom_client" class="form-control" value="{{ $mission->nom_client ?? old('nom_client') }}" {{ ($show) ? 'disabled' : ''}}>
                            </div>
                        </div>
                        {{-- Lieu --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Lieu:</label>
                                <input required type="text" name="lieu" class="form-control" value="{{ $mission->lieu ?? old('nom_client') }}" {{ ($show) ? 'disabled' : ''}}>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Date début et Heure début --}}
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label> Date mission:</label>
                                        <input required type="date" name="date_debut" placeholder="Date Début" class="form-control" value="{{ $mission->date_debut ?? old('date_debut') }}" {{ ($show) ? 'disabled' : ''}}>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-light"> _</label>
                                        <input required type="text" name="heure_debut" placeholder="Heure Début" class="form-control" value="{{ $mission->heure_debut ?? old('heure_debut') }}" {{ ($show) ? 'disabled' : ''}}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Date fin et Heure fin --}}
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="text-light">_</label>
                                        <input required type="date" name="date_debut" placeholder="Date Début" class="form-control" value="{{ $mission->date_debut ?? old('date_debut') }}" {{ ($show) ? 'disabled' : ''}}>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    {{-- Heure fin --}}
                                    <div class="form-group">
                                        <label class="text-light"> _</label>
                                        <input required type="text" name="heure_debut" placeholder="Heure Fin" class="form-control" value="{{ $mission->heure_debut ?? old('heure_debut') }}" {{ ($show) ? 'disabled' : ''}}>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Responsable --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Responsable:</label>
                                <input required type="text" name="responsable"  class="form-control" value="{{ $mission->responsable ?? old('responsable') }}" {{ ($show) ? 'disabled' : ''}}>
                            </div>
                        </div>
                        {{-- Recommandation --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Recommandation:</label>
                                <input required type="text" name="responsable"  class="form-control" value="{{ $mission->recommandation ?? old('recommandation') }}" {{ ($show) ? 'disabled' : ''}}>
                            </div>
                        </div>
                    </div>
{{------------------------------------------}}
                    <div class="row">
                        {{-- Responsable --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Responsable:</label>
                                <input required type="text" name="responsable"  class="form-control" value="{{ $mission->responsable ?? old('responsable') }}" {{ ($show) ? 'disabled' : ''}}>
                            </div>
                        </div>
                        {{-- Recommandation --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Recommandation:</label>
                                <input required type="text" name="responsable"  class="form-control" value="{{ $mission->recommandation ?? old('recommandation') }}" {{ ($show) ? 'disabled' : ''}}>
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
