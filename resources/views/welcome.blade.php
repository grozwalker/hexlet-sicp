@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <img src="/images/sicp_cover.jpg" alt="Sicp cover" class="img-fluid">
        </div>
        <div class="col-8">
            <h1>
                {{ __('welcome.title') }}
            </h1>
            <p>{{ __('welcome.about') }}</p>
        </div>
    </div>
@endsection
