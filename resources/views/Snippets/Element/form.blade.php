<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header bg-primary">
                <h4 class="card-title text-center text-light"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form action="{{ ($title == 'Nouvel Element') ? route('element.store') : route('element.update', $element->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label> Nom:</label>
                        <input required type="text" name="nom" class="form-control" value="{{ $element->nom ?? old('nom') }}" {{ ($show) ? 'disabled' : ''}}>
                    </div>
                    <div class="form-group">
                        <label>.</label>
                        <div class="input-group">
                            <input type="text" name="" class="form-control" value=""  {{ ($show) ? 'disabled' : ''}}>
                            <div class="input-group-append">
                                <span class="bg-primary-light text-light input-group-text"><i class="fa fa-money"></i> <span class="pl-1">fcfa</span> </span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('element.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Fermer</a>
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
