@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Orders') }}</h1>
        </div>
        <div id="success"></div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Orders') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('order.order-delivery.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('Place Order') }}
                    </a>
                    <a href="{{ route('order.order-complete') }}" id="addAllSelectedRecord" class="btn btn-primary comp">
                        <i class="fas "></i> {{ __('Complete Order') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                {{-- <th>
                                    <input type="checkbox" name="" id="select_all_ids">
                                </th> --}}
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
                                {{-- id="order_ids{{ $order->id }}" --}}
                                <tr>
                                    {{-- <td>
                                        <input type="checkbox" name="ids" class="checkbox_ids" id=""
                                            value="{{ $order->id }}">
                                    </td> --}}
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
                                    @if ($order->status === 1)
                                        <td>Completed</td>
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
                "targets": [3, 4]
            }]
        });

        // $(function() {
        //     $('#select_all_ids').click(function() {
        //         $('.checkbox_ids').prop('checked', $(this).prop('checked'));
        //     });

        //     $('#addAllSelectedRecord').click(function(e) {
        //         // e.preventDefault();
        //         var all_ids = [];
        //         $('input:checkbox[name=ids]:checked').each(function() {
        //             all_ids.push($(this).val());
        //         });

        //         $.ajax({
        //             url: "{{ route('order.order-complete') }}",
        //             type: 'GET',
        //             data: {
        //                 _token: '{{ csrf_token() }}',
        //                 ids: all_ids
        //             },
        //             success: function(response) {
        //                 // Handle success response
        //                 $('#success').html(response);
        //                 console.log(response);
        //                 $.each(all_ids, function(key, val) {
        //                     $('#order_ids' + val).add();
        //                 });
        //             },
        //             error: function(error) {
        //                 // window.location.reload();
        //                 $('#success').html(error);
        //                 console.error(error);
        //             }
        //         });
        //     });
        // });
    </script>
@endpush
