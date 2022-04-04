@extends('layouts.index')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>Short link</h1>
                <a href="{{$shortLink}}" target="_blank">{{$shortLink}}</a>
            </div>
        </div>
    </section>
@endsection
