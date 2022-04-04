@extends('layouts.index')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Generate short link</h1>
                <form method="POST" action="{{route('links.short.generate')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="url" class="form-label">Your link</label>
                        <input type="url" class="@error('url') is-invalid @enderror form-control" id="url" name="url"
                               placeholder="http://domain.com/">
                        @error('url')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="redirectLimit" class="form-label">Redirect limit</label>
                            <input type="number" id="redirectLimit" name="max_redirect"
                                   class="@error('max_redirect') is-invalid @enderror form-control">
                            @error('max_redirect')<div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>
                        <div class="col">
                            <label for="periodLimit" class="form-label">Period limit</label>
                            <input type="time" id="periodLimit" name="end_life"
                                   class="@error('end_life') is-invalid @enderror form-control">
                            @error('end_life')<div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mb-3">Get short link</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
