@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-primary-light">
                <div class="card-body">
                    <h1>Hello</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('mission.create') }}">
                <div class="card box">
                    <div class="card-body">
                        <div class="row m-3">
                            <div class="col-md-12 text-center">
                                <h1><i class="fa fa-file-text-o fa-2x mb-3"></i></h1>
                            </div>
                            <div class="col-md-12 text-center">
                                <strong>Nouvelle Mission</strong><br>
                                <span>Vous verrez ici le formulaire de création d'une mission</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('mission.index') }}">
                <div class="card box">
                    <div class="card-body">
                        <div class="row m-3">
                            <div class="col-md-12 text-center">
                                <h1><i class="fa fa-file-text fa-2x mb-3"></i></h1>
                            </div>
                            <div class="col-md-12 text-center">
                                <strong>Liste des Missions</strong><br>
                                <span>Vous verrez ici la liste de toute les missions enrégistrées</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#">
                <div class="card box">
                    <div class="card-body">
                        <div class="row m-3">
                            <div class="col-md-12 text-center">
                                <h1><i class="fa fa-file-zip-o fa-2x mb-3"></i></h1>
                            </div>
                            <div class="col-md-12 text-center">
                                <strong>Archive des Missions</strong><br>
                                <span>Vous verrez ici la liste de toutes les missions mis en archives</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
