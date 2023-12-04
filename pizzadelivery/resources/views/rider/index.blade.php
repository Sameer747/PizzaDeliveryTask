@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Riders') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Riders') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('rider.rider-delivery.create') }}" class="btn btn-primary">
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
                                <th>{{ __('Rider Name') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Capacity') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riders as $rider)
                                <tr>
                                    <td>
                                        {{ $rider->id }}
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('rider.rider-delivery.edit', $rider->id) }}">{{ $rider->rider_name }}</a>
                                    </td>
                                    <td>{{ $rider->phone }}</td>
                                    <td>{{ $rider->capacity }}</td>
                                    <td>
                                        <a href="{{ route('rider.rider-delivery.edit', $rider->id) }}"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('rider.rider-delivery.destroy', $rider->id) }}"
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
