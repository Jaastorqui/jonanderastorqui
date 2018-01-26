@extends('frontend.layouts.app')

@section('content')
    <div class="row mb-4">
        Entra
        <div id="towns">
            <town-component></town-component>
        </div>
    </div><!--row-->

    <div class="row mb-4">
        <div class="col">
            <example-component></example-component>
        </div><!--col-->
    </div><!--row-->


@endsection
