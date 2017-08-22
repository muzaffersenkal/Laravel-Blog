
@extends('main')
@section('title')
    About
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12" id="app">
            <h1 :bind="message">@{{ message }}</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis aspernatur quas quibusdam veniam sunt animi, est quos optio explicabo deleniti inventore unde minus, tempore enim ratione praesentium, cumque, dolores nesciunt?</p>
        </div>
    </div>

    <button id="orderButtonId">Tıkla</button>


@endsection

@section('scripts')

    <script>
        $('button#orderButtonId').on('click', function(){

            swal({
                    title: "Are you sure?",
                    text: "Die Bestellung wird aufgegeben und es können keine weiteren Artikel hinzugefügt werden!", type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ja, Bestellung aufgeben!",
                    closeOnConfirm: false
                },
                function(){
                    $("#orderFormId").submit();
                });
        })
    </script>
    @endsection
