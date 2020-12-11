@extends((request()->ajax() ? 'layouts.master' : 'layouts.app'))

@section('content')
    @include('Element.form', [$title='Nouvel Element', $show=false])
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
