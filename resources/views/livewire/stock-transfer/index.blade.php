@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('') }}</div>

                    <div class="card-body">
                        <livewire:stock-transfer></livewire:stock-transfer>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
