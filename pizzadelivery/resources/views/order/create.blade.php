@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Orders') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create Order') }}</h4>

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('order.order-delivery.store') }}">
                    @csrf
                    {{-- User Name --}}
                    <div class="form-group">
                        <label for="user_name">{{ __('Name') }}</label>
                        <input name="user_name" type="text" class="form-control" id="user_name">
                        @error('user_name')
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
                    {{-- Pizza --}}
                    <div class="form-group">
                        <label for="name">{{ __('Pizza') }}</label>
                        <select name="name" class="form-control" id="name">
                            <option value="">Select</option>
                            @foreach ($pizzas as $pizza)
                                <option value="{{ $pizza->name }}">{{ $pizza->name }}</option>
                            @endforeach
                        </select>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Category --}}
                    <div class="form-group">
                        <label for="">{{ __('Category') }}</label>
                        <select name="category" class="form-control" id="category">
                            <option value="">Select</option>
                            <option value="1">Thin Crust</option>
                            <option value="0">Stuffed Crust</option>
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- qty  --}}
                    <div class="form-group">
                        <label for="qty">{{ __('Qty') }}</label>
                        <input name="qty" type="text" class="form-control" id="qty">
                        @error('qty')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- price  --}}
                    <div class="form-group">
                        <label for="price">{{ __('Price') }}</label>
                        <input readonly value="{{$pizza->price}}" name="price" type="text" class="form-control" id="price">
                        @error('price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- status --}}
                    <div class="form-group">
                        {{-- <label for="price">{{ __('Price') }}</label> --}}
                        <input hidden value="0" name="status" type="number" class="form-control" id="status">
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- slug --}}
                    {{-- <div class="form-group">
                        <label for="">{{ __('Slug') }}</label>
                        <input name="slug" readonly type="text" class="form-control" id="slug">
                        @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}
                    {{-- default --}}
                    {{-- <div class="form-group">
                        <label for="">{{ __('Default?') }}</label>
                        <select name="default" id="" class="form-control">
                            <option value="1">{{ __('Yes') }}</option>
                            <option value="0">{{ __('No') }}</option>
                        </select>
                        @error('default')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}
                    {{-- status --}}
                    {{-- <div class="form-group">
                        <label for="">{{ __('Status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">{{ __('Active') }}</option>
                            <option value="0">{{ __('Inactive') }}</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}
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
