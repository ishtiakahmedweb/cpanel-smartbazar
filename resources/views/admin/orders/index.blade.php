@extends('layouts.light.master')
@section('title', 'Orders')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/daterange-picker.css')}}">
    <style>
        .daterangepicker {
            border: 2px solid #d7d7d7 !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
    <style>
        .dt-buttons.btn-group {
            margin: .25rem 1rem 1rem 1rem;
        }
        .dt-buttons.btn-group .btn {
            font-size: 12px;
        }
        th:focus {
            outline: none;
        }
        
        /* Fix horizontal scrolling */
        body, html {
            overflow-x: hidden !important;
            max-width: 100vw;
        }
        
        /* Compact table styling */
        .datatable {
            font-size: 0.875rem;
        }
        
        .datatable td, .datatable th {
            padding: 0.5rem !important;
            white-space: nowrap;
        }
        
        .datatable td .customer-info,
        .datatable td ul {
            white-space: normal;
        }

        /* Premium Fraud Checker Styles */
        #fraudCheckModal .modal-content {
            border: none !important;
            border-radius: 16px !important;
            overflow: hidden !important;
            box-shadow: 0 25px 60px rgba(0,0,0,0.2) !important;
        }
        .fraud-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%) !important;
            color: white !important;
            padding: 1.25rem 1.5rem !important;
            border: none !important;
        }
        .fraud-header h5 { color: white !important; font-weight: 700 !important; margin: 0 !important; }
        
        .risk-badge-container {
            padding: 1.5rem !important;
            text-align: center !important;
            border-bottom: 1px solid #f1f5f9 !important;
        }
        .risk-icon-large {
            font-size: 3.5rem !important;
            margin-bottom: 0.5rem !important;
            display: block !important;
        }
        
        .premium-stat-grid {
            display: flex !important;
            gap: 1rem !important;
            padding: 1rem 1.5rem !important;
        }
        .p-stat-item {
            flex: 1 !important;
            background: #f8fafc !important;
            border-radius: 12px !important;
            padding: 1rem !important;
            text-align: center !important;
            border: 1px solid #e2e8f0 !important;
        }
        .p-stat-label {
            font-size: 0.7rem !important;
            text-transform: uppercase !important;
            font-weight: 700 !important;
            color: #64748b !important;
            margin-bottom: 0.25rem !important;
            display: block !important;
        }
        .p-stat-value {
            font-size: 1.5rem !important;
            font-weight: 800 !important;
            color: #1e293b !important;
        }
        
        .chart-box {
            padding: 1.5rem !important;
            background: #fff !important;
            border-radius: 12px !important;
            margin: 0 1.5rem 1.5rem 1.5rem !important;
            border: 1px solid #f1f5f9 !important;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02) !important;
        }
        
        .courier-card-list {
            padding: 0 1.5rem 1.5rem 1.5rem !important;
        }
        .courier-card {
            display: flex !important;
            align-items: center !important;
            padding: 1rem !important;
            background: #fff !important;
            border-radius: 12px !important;
            margin-bottom: 0.75rem !important;
            border: 1px solid #f1f5f9 !important;
            transition: transform 0.2s ease !important;
        }
        .courier-card:hover { transform: scale(1.01) !important; border-color: #cbd5e1 !important; }
        
        .c-logo-box {
            width: 50px !important;
            height: 50px !important;
            min-width: 50px !important;
            background: white !important;
            border-radius: 10px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            margin-right: 1.25rem !important;
            padding: 4px !important;
            border: 1px solid #f1f5f9 !important;
            overflow: hidden !important;
        }
        .c-logo-box img {
            max-width: 100% !important;
            max-height: 100% !important;
            object-fit: contain !important;
        }
        
        .c-details { flex: 1 !important; }
        .c-name { font-weight: 700 !important; color: #334155 !important; font-size: 0.95rem !important; }
        .c-mini-stats { display: flex !important; gap: 1rem !important; margin-top: 2px !important; }
        .c-m-val { font-size: 0.75rem !important; color: #64748b !important; }
        .c-m-val b { color: #475569 !important; }
        
        .success-tag {
            background: #f0fdf4 !important;
            color: #16a34a !important;
            padding: 0.25rem 0.75rem !important;
            border-radius: 20px !important;
            font-size: 0.8rem !important;
            font-weight: 700 !important;
        }
    </style>
@endpush

@section('breadcrumb-title')
    <h3>Orders</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Orders</li>
@endsection

@section('content')
    <div class="mb-5 row">
        <div class="col-sm-12">
            <div class="orders-table">
                <div class="shadow-sm card rounded-0">
                    <div class="p-2 card-header">
                        <div class="px-3 row justify-content-between align-items-center">
                            <div>All Orders</div>
                            <div>
                                <a href="{{route('admin.orders.create')}}" class="btn btn-sm btn-primary">New Order</a>
                                <a href="{{ route('admin.orders.pathao-csv') }}" class="ml-1 btn btn-sm btn-primary">Pathao CSV</a>
                            </div>
                        </div>
                        <div class="row d-none" style="row-gap: .25rem;">
                            <div class="col-auto pr-0 d-flex align-items-center" check-count></div>
                            @unless(false && in_array(request('status'), ['CONFIRMED', 'PACKAGING']))
                            <div class="col-auto px-1">
                                <select name="status" id="status" onchange="changeStatus()" class="text-white form-control form-control-sm bg-primary">
                                    <option value="">Change Status</option>
                                    @foreach(config('app.orders', []) as $status)
                                        @php $show = false @endphp
                                        @switch($status)
                                            @case('WAITING')
                                                @php $show = in_array(request('status'), ['PENDING', 'CANCELLED']) @endphp
                                                @break

                                            @case('CONFIRMED')
                                                @php $show = in_array(request('status'), ['PENDING', 'WAITING', 'CANCELLED']) @endphp
                                                @break

                                            @case('CANCELLED')
                                                @php $show = in_array(request('status'), ['PENDING', 'WAITING']) @endphp
                                                @break

                                            @case('DELIVERED')
                                            @case('RETURNED')
                                            @case('LOST')
                                                @php $show = in_array(request('status'), ['SHIPPING']) @endphp
                                                @break

                                            @default

                                        @endswitch
                                        @if($show || true)
                                        <option value="{{ $status }}">{{ $status }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @endunless
                            @unless(request('status') == 'SHIPPING')
                            <div class="col-auto px-1">
                                <select name="courier" id="courier" onchange="changeCourier()" class="text-white form-control form-control-sm bg-primary">
                                    <option value="">Change Courier</option>
                                    @foreach(couriers() as $provider)
                                    <option value="{{ $provider }}">{{ $provider }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endunless
                            @if(!auth()->user()->is('salesman'))
                            <div class="col-auto px-1">
                                <select name="staff" id="staff" onchange="changeStaff()" class="text-white form-control form-control-sm bg-primary">
                                    <option value="">Change Staff</option>
                                    @foreach(\App\Models\Admin::where('role_id', \App\Models\Admin::SALESMAN)->get() as $staff)
                                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="col-auto pl-0 ml-auto">
                                @if(request('status') == 'CONFIRMED')
                                    <button onclick="printSticker()" id="sticker" class="ml-1 btn btn-sm btn-primary">Print Sticker</button>
                                    <button onclick="printInvoice()" id="invoice" class="ml-1 btn btn-sm btn-primary">Print Invoice</button>
                                    @if(isReseller())
                                    <button onclick="forwardToOninda()" id="forward-to-oninda" class="ml-1 btn btn-sm btn-primary">Forward to Wholesaler</button>
                                    @endif
                                @elseif(request('status') == 'PACKAGING')
                                    <button onclick="courier()" id="courier" class="ml-1 btn btn-sm btn-primary">Send to Courier</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-3 card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatable" style="width: 100%;">
                                <thead>
                                <tr>
                                    @if($bulk = true || request('status') && !in_array(request('status'), ['DELIVERED', 'RETURNED', 'LOST']))
                                    <th style="max-width: 5%">
                                        <input type="checkbox" class="form-control" name="check_all" style="min-height: 20px;min-width: 20px;max-height: 20px;max-width: 20px;">
                                    </th>
                                    @endif
                                    <th width="60">ID</th>
                                    @if(isOninda() || isReseller())
                                    <th width="70">Source</th>
                                    @endif
                                    <th width="180">Customer</th>
                                    <th width="200">Products</th>
                                    <th width="80">Amount</th>
                                    <th width="120">Status</th>
                                    <th width="140">Courier</th>
                                    <th width="120">Staff</th>
                                    <th width="130">Date/Time</th>
                                    @if(auth()->user()->is('admin'))
                                    <th width="90">Action</th>
                                    @endif
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fraud Check Modal -->
    <div class="modal fade" id="fraudCheckModal" tabindex="-1" role="dialog" aria-labelledby="fraudCheckModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content fraud-modal-content">
                <div class="modal-header fraud-header">
                    <h5 class="modal-title" id="fraudCheckModalLabel"><i class="fa fa-shield mr-2"></i> Fraud Detection Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4" id="fraudCheckContent">
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary mb-3" role="status" style="width: 3rem; height: 3rem;">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <h5 class="text-muted">Analyzing Courier History...</h5>
                        <p class="small text-secondary">Fetching data from BDCourier database</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}" defer></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}" defer></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}" defer></script>
    <script src="{{asset('assets/js/product-list-custom.js')}}" defer></script>
@endpush

@php($parameters = array_merge(request()->query(), request('status') && auth()->user()->is('salesman') ? ['staff_id' => auth()->id()] : []))

@push('scripts')
    <script data-push-script>
        var checklist = new Set();
        function updateBulkMenu() {
            $('[name="check_all"]').prop('checked', true);
            $(document).find('[name="order_id[]"]:not([disabled])').each(function () {
                if (checklist.has($(this).val())) {
                    $(this).prop('checked', true);
                } else {
                    $('[name="check_all"]').prop('checked', false);
                }
            });

            if (checklist.size > 0) {
                $('[check-count]').text(checklist.size + 'x');
                $('.card-header > .row:last-child').removeClass('d-none');
                $('.card-header > .row:first-child').addClass('d-none');
            } else {
                $('[check-count]').text('');
                $('.card-header > .row:last-child').addClass('d-none');
                $('.card-header > .row:first-child').removeClass('d-none');
            }
        }
        $('[name="check_all"]').on('change', function () {
            if ($(this).prop('checked')) {
                $(document).find('[name="order_id[]"]:not([disabled])').each(function () {
                    checklist.add($(this).val());
                });
            } else {
                $(document).find('[name="order_id[]"]:not([disabled])').each(function () {
                    checklist.delete($(this).val());
                });
            }
            $('[name="order_id[]"]:not([disabled])').prop('checked', $(this).prop('checked'));
            updateBulkMenu();
        });

        // Wait for DataTable to be available before initializing
        var table; // Make table accessible globally for this page
        function initializeDataTable() {
            // Guard against multiple init calls that can trigger duplicate Ajax requests
            if (window.__ordersTableInitStarted) {
                return;
            }
            window.__ordersTableInitStarted = true;

            if (typeof $.fn.DataTable === 'undefined') {
                // DataTable not loaded yet, wait and retry
                setTimeout(initializeDataTable, 100);
                return;
            }

            // Check if DataTable is already initialized on this element
            if ($.fn.dataTable.isDataTable('.datatable')) {
                // Already initialized, get the instance and refresh
                table = $('.datatable').DataTable();
                table.ajax.reload();
                return;
            }

            table = $('.datatable').DataTable({
            responsive: false,
            scrollX: true,
            scrollCollapse: true,
            autoWidth: false,
            search: [
                {
                    bRegex: true,
                    bSmart: false,
                },
            ],
            dom: 'lBftip',
            buttons: [
@foreach(config('app.orders', []) as $status)
                {
                    text: '{{ $status }}',
                    className: "px-1 py-1 {{ request('status') == $status ? 'btn-secondary' : '' }}",
                    action: function ( e, dt, node, config ) {
                        window.location = '{!! request()->fullUrlWithQuery(['status' => $status]) !!}';
                    }
                },
@endforeach
                {
                    text: 'All',
                    className: "px-1 py-1 {{ request('status') == '' ? 'btn-secondary' : '' }}",
                    action: function ( e, dt, node, config ) {
                        window.location = '{!! request()->fullUrlWithQuery(['status' => '']) !!}';
                    }
                },
            ],
            processing: true,
            serverSide: true,
            ajax: "{!! route('api.orders', $parameters) !!}",
            columns: [
                @if($bulk)
                { data: 'checkbox', name: 'checkbox', sortable: false, searchable: false},
                @endif
                { data: 'id', name: 'id' },
                @if(isOninda() || isReseller())
                { data: 'source_id', name: 'source_id', sortable: true, searchable: true },
                @endif
                { data: 'customer', name: 'customer', sortable: false },
                { data: 'products', name: 'products', sortable: false },
                { data: 'amount', name: 'amount', sortable: false },
                { data: 'status', name: 'status', sortable: false },
                { data: 'courier', name: 'courier', sortable: false },
                { data: 'staff', name: 'admin.name', sortable: false },
                { data: 'created_at', name: 'created_at' },
                @if(auth()->user()->is('admin'))
                { data: 'actions', searchable: false, orderable: false },
                @endif
            ],
            initComplete: function (settings, json) {
                window.ordersTotal = json.recordsTotal;
                var tr = $(this.api().table().header()).children('tr').clone();
                tr.find('th').each(function (i, item) {
                    $(this).removeClass('sorting').addClass('p-1');
                });
                tr.appendTo($(this.api().table().header()));
                this.api().columns().every(function (i) {
                    var th = $(this.header()).parents('thead').find('tr').eq(1).find('th').eq(i);
                    $(th).empty();

                    var forbidden = [0];
                    @if(isOninda()||isReseller())
                        forbidden.push(5);
                        var dateTimeColumn = 9;
                        @if(auth()->user()->is('admin'))
                            forbidden.push(10);
                        @endif
                    @else
                        forbidden.push(4);
                        var dateTimeColumn = 8;
                        @if(auth()->user()->is('admin'))
                            forbidden.push(9);
                        @endif
                    @endif

                    if ($.inArray(i, forbidden) === -1) {
                        var column = this;
                        var input = document.createElement("input");
                        input.classList.add('form-control', 'border-primary');
                        if (i === dateTimeColumn) {
                            $(input).appendTo($(th)).on('apply.daterangepicker', function (ev, picker) {
                                column.search(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD')).draw();
                            }).daterangepicker({
                                startDate: window._start,
                                endDate: window._end,
                                ranges: {
                                    'Today': [moment(), moment()],
                                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                },
                            });

                            // clear the input when _start and _end are empty
                            if (!window._start && !window._end) {
                                $(input).val('');
                            }
                        } else {
                            $(input).appendTo($(th))
                                .on('change', function () {
                                    if (i) {
                                        column.search($(this).val(), false, false, true).draw();
                                    } else {
                                        column.search('^'+ (this.value.length ? this.value : '.*') +'$', true, false).draw();
                                    }
                                });
                        }
                    }
                });
            },
            drawCallback: function () {
                updateBulkMenu();
                $(document).on('change', '[name="order_id[]"]', function () {
                    if ($(this).prop('checked')) {
                        checklist.add($(this).val());
                    } else {
                        checklist.delete($(this).val());
                    }
                    updateBulkMenu();
                });
            },
            order: [
                // [1, 'desc']
            ],
            pageLength: 50,
            lengthMenu: [[10, 25, 50, 100, 250, 500], [10, 25, 50, 100, 250, 500]],
        });
        }

        // Start initialization - wrap in jQuery ready to ensure DOM is ready
        $(document).ready(function() {
            initializeDataTable();
        });

        $(document).on('change', '.status-column', changeStatus);

        function changeStatus() {
            $('[name="status"]').prop('disabled', true);

            var order_id = Array.from(checklist);
            var status = $('[name="status"]').val();
            if ($(this).data('id')) {
                order_id = [$(this).data('id')];
                status = $(this).val();
            }

            $.post({
                url: '{{ route('admin.orders.status') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    order_id: order_id,
                    status: status,
                },
                success: function (response) {
                    checklist.clear();
                    updateBulkMenu();
                    table.draw();

                    $.notify('Status updated successfully', 'success');
                },
                complete: function () {
                    $('[name="status"]').prop('disabled', false);
                    $('[name="status"]').val('');
                }
            });
        }

        $(document).on('change', '.courier-column', changeCourier);

        function changeCourier() {
            $('[name="courier"]').prop('disabled', true);

            var order_id = Array.from(checklist);
            var courier = $('[name="courier"]').val();
            if ($(this).data('id')) {
                order_id = [$(this).data('id')];
                courier = $(this).val();
            }

            $.post({
                url: '{{ route('admin.orders.courier') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    order_id: order_id,
                    courier: courier,
                },
                success: function (response) {
                    // checklist.clear();
                    // updateBulkMenu();
                    table.draw();

                    $.notify('Courier updated successfully', 'success');
                },
                complete: function () {
                    $('[name="courier"]').prop('disabled', false);
                    $('[name="courier"]').val('');
                }
            });
        }

        $(document).on('change', '.staff-column', changeStaff);

        function changeStaff() {
            $('[name="staff"]').prop('disabled', true);

            var order_id = Array.from(checklist);
            var staff = $('[name="staff"]').val();
            if ($(this).data('id')) {
                order_id = [$(this).data('id')];
                staff = $(this).val();
            }

            $.post({
                url: '{{ route('admin.orders.staff') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    order_id: order_id,
                    admin_id: staff,
                },
                success: function (response) {
                    checklist.clear();
                    updateBulkMenu();
                    table.draw();

                    $.notify('Staff updated successfully', 'success');
                },
                complete: function () {
                    $('[name="staff"]').prop('disabled', false);
                    $('[name="staff"]').val('');
                },
                error: function (response) {
                    $.notify(response?.responseJSON?.message || 'Staff update failed.', {type: 'danger'});
                },
            });
        }

        // Single interval guard to avoid duplicate refresh timers
        if (!window.__ordersTableRefreshInterval) {
            window.__ordersTableRefreshInterval = setInterval(function () {
                if (typeof $.fn.DataTable !== 'undefined' && $.fn.dataTable.isDataTable('.datatable') && table) {
                    table.ajax.reload(function (res) {
                        if (res.recordsTotal > window.ordersTotal) {
                            window.ordersTotal = res.recordsTotal;
                            $.notify('New orders found', 'success');
                        }
                    }, false);
                }
            }, 60*1000);
        }

        function printInvoice() {
            window.open('{{ route('admin.orders.invoices') }}?order_id=' + $('[name="order_id[]"]:checked').map(function () {
                return $(this).val();
            }).get().join(','), '_blank');
        }
        function printSticker() {
            window.open('{{ route('admin.orders.stickers') }}?order_id=' + $('[name="order_id[]"]:checked').map(function () {
                return $(this).val();
            }).get().join(','), '_blank');
        }
        function courier() {
            window.open('{{ route('admin.orders.booking') }}?order_id=' + $('[name="order_id[]"]:checked').map(function () {
                return $(this).val();
            }).get().join(','), '_self');
        }

        function forwardToOninda() {
            if (checklist.size === 0) {
                $.notify('Please select at least one order', 'warning');
                return;
            }

            $.post({
                url: '{{ route('admin.orders.forward-to-oninda') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    order_id: Array.from(checklist),
                },
                success: function (response) {
                    checklist.clear();
                    updateBulkMenu();
                    table.draw();
                    $.notify('Orders are being forwarded to the the Wholesaler', 'success');
                },
                error: function (response) {
                    $.notify(response?.responseJSON?.message || 'Failed to forward orders to the Wholesaler', 'danger');
                }
            });
        }

        // Fraud Check Functionality
        $(document).on('click', '.check-fraud-btn', function() {
            const phone = $(this).data('phone');
            const orderId = $(this).data('order-id');
            
            // Show modal with loading state
            $('#fraudCheckModal').modal('show');
            $('#fraudCheckContent').html(`
                <div class="text-center py-5">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p>Checking fraud history for ${phone}...</p>
                </div>
            `);
            
            // Make AJAX request
            $.post({
                url: '{{ route('admin.orders.check-fraud') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    phone: phone
                },
                success: function(response) {
                    if (response.success && response.data) {
                        displayFraudResults(response.data, phone);
                    } else {
                        showFraudError('No data received from server');
                    }
                },
                error: function(xhr) {
                    const message = xhr.responseJSON?.error || 'Failed to check fraud history';
                    showFraudError(message);
                }
            });
        });

        function displayFraudResults(data, phone) {
            const successRate = data.success_rate || 0;
            const riskLevel = data.risk_level || 'medium';
            
            // BDCourier naming variants (Total)
            let totalParcels = 0;
            let totalDelivered = 0;
            let totalCancel = 0;

            if (data.summary) {
                totalParcels = data.summary.total_parcel || data.summary.total_parcels || 0;
                totalDelivered = data.summary.success_parcel || data.summary.total_delivered || 0;
                totalCancel = data.summary.cancelled_parcel || data.summary.total_cancel || 0;
            } else {
                totalParcels = data.total_parcels || data.total_parcel || data.total_orders || data.total || 0;
                totalDelivered = data.total_delivered || data.total_delivered_parcels || data.delivered || data.success || data.total_success || 0;
                totalCancel = data.total_cancel || data.total_cancelled || data.total_cancelled_parcels || data.cancelled || data.failed || data.cancel || 0;
            }
            
            // Risk level config
            const riskConfig = {
                low: { icon: 'fa-check-circle', text: 'Low Risk Profile', color: '#10b981', desc: 'Secure history found.' },
                medium: { icon: 'fa-exclamation-triangle', text: 'Medium Risk Profile', color: '#f59e0b', desc: 'Caution advised.' },
                high: { icon: 'fa-times-circle', text: 'High Risk Profile', color: '#ef4444', desc: 'High cancellations!' }
            };
            const risk = riskConfig[riskLevel] || riskConfig.medium;
            
            // Build the Modal HTML
            let html = `
                <div class="risk-badge-container">
                    <i class="fa ${risk.icon} risk-icon-large" style="color: ${risk.color}"></i>
                    <h3 class="font-weight-bold mb-1" style="color: #1e293b">${risk.text}</h3>
                    <p class="text-muted small mb-0">${risk.desc}</p>
                </div>

                <div class="premium-stat-grid">
                    <div class="p-stat-item">
                        <span class="p-stat-label">Total</span>
                        <span class="p-stat-value">${totalParcels}</span>
                    </div>
                    <div class="p-stat-item">
                        <span class="p-stat-label">Pass</span>
                        <span class="p-stat-value" style="color: #10b981">${totalDelivered}</span>
                    </div>
                    <div class="p-stat-item">
                        <span class="p-stat-label">Fail</span>
                        <span class="p-stat-value" style="color: #ef4444">${totalCancel}</span>
                    </div>
                </div>

                <div class="chart-box">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="font-weight-bold text-dark" style="font-size: 0.9rem">Overall Success Rate</span>
                        <span class="success-tag">${successRate}%</span>
                    </div>
                    <div class="progress" style="height: 10px; border-radius: 5px; background: #f1f5f9;">
                        <div class="progress-bar" style="width: ${successRate}%; background: ${risk.color}; border-radius: 5px;"></div>
                    </div>
                </div>

                <div class="courier-card-list">
                    <h6 class="mb-3 font-weight-bold text-muted text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.05em; padding-left: 2px;">Delivery Breakdown</h6>
            `;

            // Courier breakdown loop
            const courierEntries = Object.entries(data).filter(([key, value]) => {
                return value && typeof value === 'object' && value.name && !['summary', 'normalized_phone', 'raw_response', 'reports'].includes(key);
            });

            if (courierEntries.length > 0) {
                courierEntries.forEach(([key, stats]) => {
                    const cTotal = stats.total_parcel || stats.total_parcels || 0;
                    const cSuccess = stats.success_parcel || stats.total_delivered_parcels || 0;
                    const cCancel = stats.cancelled_parcel || stats.total_cancelled_parcels || 0;
                    const cRate = stats.success_ratio || stats.success_rate || 0;

                    html += `
                        <div class="courier-card">
                            <div class="c-logo-box">
                                <img src="${stats.logo}" alt="${stats.name}" onerror="this.src='https://api.bdcourier.com/c-logo/default.png'">
                            </div>
                            <div class="c-details">
                                <div class="c-name">${stats.name}</div>
                                <div class="c-mini-stats">
                                    <span class="c-m-val">Total: <b>${cTotal}</b></span>
                                    <span class="c-m-val">Delivered: <b style="color: #16a34a">${cSuccess}</b></span>
                                    <span class="c-m-val">Canceled: <b style="color: #dc2626">${cCancel}</b></span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="success-tag" style="background: #f8fafc; color: #334155; border: 1px solid #e2e8f0;">${cRate}%</span>
                            </div>
                        </div>
                    `;
                });
            } else {
                html += `<div class="py-4 text-center text-muted border rounded bg-light" style="border-radius: 12px !important;">No courier records found.</div>`;
            }

            html += `
                </div>
                <div class="px-4 py-3 bg-light border-top d-flex justify-content-between align-items-center">
                    <span class="text-secondary small font-italic"><i class="fa fa-phone mr-1"></i> ${data.normalized_phone || phone}</span>
                    <button type="button" class="btn btn-dark btn-sm font-weight-bold px-4" style="border-radius: 8px" data-dismiss="modal">Close Report</button>
                </div>
            `;
            
            $('#fraudCheckContent').html(html);
        }

        function showFraudError(message) {
            $('#fraudCheckContent').html(`
                <div class="alert alert-danger">
                    <h5><i class="fa fa-exclamation-triangle"></i> Error</h5>
                    <p class="mb-0">${message}</p>
                </div>
            `);
        }
    </script>

    <script src="{{ asset('assets/js/datepicker/daterange-picker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/daterange-picker/daterangepicker.js') }}"></script>
@endpush

