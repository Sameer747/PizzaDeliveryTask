@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Orders') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Orders') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('order.order-delivery.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('Place Order') }}
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
                                <th>{{ __('User Name') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Pizza') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Qty') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        {{ $order->id }}
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('order.order-delivery.edit', $order->id) }}">{{ $order->userName }}</a>
                                    </td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->pizza }}</td>
                                    <td>{{ $order->category }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>{{ $order->price . '$' }}</td>
                                    @if ($order->status === 0)
                                        <td>Pending</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('order.order-delivery.edit', $order->id) }}"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('order.order-delivery.destroy', $order->id) }}"
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
