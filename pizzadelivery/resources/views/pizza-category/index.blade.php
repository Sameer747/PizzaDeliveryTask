@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Pizzas') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Pizzas') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('pizza.pizza-delivery.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th>
                                    {{ __('#') }}
                                </th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pizzas as $pizza)
                                <tr>
                                    <td>
                                        {{ $pizza->id }}
                                    </td>
                                    <td>
                                        <a href="{{route('pizza.pizza-delivery.edit',$pizza->id)}}">{{ $pizza->name }}</a>
                                    </td>
                                    <td>{{ $pizza->category }}</td>
                                    <td>{{ $pizza->price . '$' }}</td>
                                    <td>
                                        <a href="{{ route('pizza.pizza-delivery.edit', $pizza->id) }}"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('pizza.pizza-delivery.destroy', $pizza->id) }}"
                                            class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#table-1").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    </script>
@endpush
