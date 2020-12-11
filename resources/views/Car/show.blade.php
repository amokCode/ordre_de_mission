@extends((request()->ajax() ? 'layouts.master' : 'layouts.app'))

@section('content')

@include('Car.form', [$title='Détails de Car', $show=true])

@endsection

@section('script')
<script>
    $('.btn-nav').click(function(e) {
        e.preventDefault();
        console.log('link:' + $(this).attr('href'))

        $('.contenu').load($(this).attr('href'))
    });
</script>
@endsection

