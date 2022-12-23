@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __("Hello Sankyu Tech! My name is Muhammad Irsyad Bin Sha'ari. This is my coding assessment. Thank you for giving me this opportunity.") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
