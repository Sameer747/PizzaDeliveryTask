@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Riders') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create Rider') }}</h4>

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('rider.rider-delivery.store') }}">
                    @csrf
                    {{-- User Name --}}
                    <div class="form-group">
                        <label for="rider_name">{{ __('Name') }}</label>
                        <input name="rider_name" type="text" class="form-control" id="rider_name">
                        @error('rider_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Phone --}}
                    <div class="form-group">
                        <label for="phone">{{ __('Phone') }}</label>
                        <input name="phone" type="text" class="form-control" id="phone">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Total Capacity --}}
                    <div class="form-group">
                        <label for="total_capacity">{{ __('Total Capcity') }}</label>
                        <input name="total_capacity" type="text" class="form-control" id="total_capacity">
                        @error('total_capacity')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Available Capacity --}}
                    <div class="form-group">
                        <label for="available_capacity">{{ __('Available Capcity') }}</label>
                        <input name="available_capacity" type="text" class="form-control" id="available_capacity">
                        @error('available_capacity')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- submit btn --}}
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            $('#qty').focusout( function() {
                let value = $(this).val();
                console.log(value);
                $.ajax()
            })
        })
    </script> --}}
@endpush
