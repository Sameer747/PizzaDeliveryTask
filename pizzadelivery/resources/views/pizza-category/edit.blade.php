@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Pizzas') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create Pizza') }}</h4>

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pizza.pizza-delivery.update', $pizzas->id) }}">
                    @csrf
                    @method('PUT')
                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input name="name" value="{{ $pizzas->name }}" type="text" class="form-control" id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Category --}}
                    <div class="form-group">
                        <label for="">{{ __('Category') }}</label>
                        {{-- <input name="category" type="text" class="form-control" id="category"> --}}
                        <select name="category" class="form-control" id="category">
                            @if ($pizzas->category === 'Thin Crust')
                                <option selected value="1">Thin Crust</option>
                                <option value="0">Stuffed Crust</option>
                            @else
                                <option value="1">Thin Crust</option>
                                <option selected value="0">Stuffed Crust</option>
                            @endif
                        </select>
                        @error('category')
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
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#language-select').on('change', function() {
                let value = $(this).val();
                let name = $(this).children(':selected').text();
                $('#slug').val(value);
                $('#name').val(name);
            })
        })
    </script>
@endpush
