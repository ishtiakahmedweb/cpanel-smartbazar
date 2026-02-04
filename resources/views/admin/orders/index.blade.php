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

        /* BDCourier Clone Styles */
        #fraudCheckModal .modal-content {
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
        }
        .fraud-header {
            background: #fff !important;
            border-bottom: 1px solid #edf2f7 !important;
            padding: 1rem 1.5rem !important;
        }
        .fraud-header h5 { color: #2d3748 !important; font-weight: 700 !important; margin: 0 !important; }
        .fraud-header .close { color: #a0aec0 !important; }

        .bd-card-grid {
            display: grid !important;
            grid-template-columns: repeat(4, 1fr) !important;
            gap: 15px !important;
            padding: 20px !important;
            background: #f8fafc !important;
        }
        .bd-stat-card {
            background: #fff !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 8px !important;
            padding: 15px 10px !important;
            text-align: center !important;
        }
        .bd-card-label { font-size: 11px !important; color: #718096 !important; font-weight: 600 !important; margin-bottom: 5px !important; display: block !important; }
        .bd-card-value { font-size: 20px !important; font-weight: 800 !important; color: #2d3748 !important; display: block !important; }
        .bd-card-sub { font-size: 10px !important; color: #a0aec0 !important; }

        .bd-main-content {
            display: flex !important;
            padding: 20px !important;
            gap: 20px !important;
        }
        .bd-table-col { flex: 1.2 !important; }
        .bd-chart-col { flex: 0.8 !important; border-left: 1px solid #edf2f7 !important; padding-left: 20px !important; }

        .bd-table { width: 100% !important; border-collapse: collapse !important; }
        .bd-table thead { background: #3182ce !important; color: #fff !important; }
        .bd-table th { padding: 8px 12px !important; font-size: 11px !important; text-transform: uppercase !important; text-align: left !important; }
        .bd-table td { padding: 10px 12px !important; border-bottom: 1px solid #edf2f7 !important; font-size: 13px !important; color: #4a5568 !important; }
        .bd-table img { height: 25px !important; width: auto !important; max-width: 100px !important; object-fit: contain !important; display: block !important; }
        .bd-table-total-row { background: #f7fafc !important; font-weight: 700 !important; }

        /* CSS Donut Chart */
        .donut-container {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            height: 100% !important;
            position: relative !important;
        }
        .donut {
            width: 150px !important;
            height: 150px !important;
            border-radius: 50% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            position: relative !important;
        }
        .donut-center {
            width: 110px !important;
            height: 110px !important;
            background: #fff !important;
            border-radius: 50% !important;
            position: absolute !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 18px !important;
            font-weight: 700 !important;
            color: #48bb78 !important;
        }

        .bd-footer-banner {
            margin: 0 20px 20px 20px !important;
            padding: 12px 20px !important;
            border-radius: 8px !important;
            display: flex !important;
            align-items: center !important;
            gap: 15px !important;
            border: 1px solid #c6f6d5 !important;
            background: #f0fff4 !important;
            color: #276749 !important;
        }
        .bd-footer-banner.high-risk { border-color: #fed7d7 !important; background: #fff5f5 !important; color: #9b2c2c !important; }
        .bd-footer-icon { font-size: 20px !important; }
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

            // Calculations for CSS Donut chart
            const passPercent = (totalParcels > 0) ? (totalDelivered / totalParcels) * 100 : 0;
            const failPercent = 100 - passPercent;
            
            // Risk level config
            const isHighRisk = riskLevel === 'high';
            const riskMsg = isHighRisk ? 'High cancellation rate detected. Proceed with caution!' : 'This customer appears safe based on previous records.';

            // 1. Top Cards
            let html = `
                <div class="bd-card-grid">
                    <div class="bd-stat-card" style="background: #ebf8ff; border-color: #bee3f8;">
                        <span class="bd-card-label" style="color: #2b6cb0;">Total Orders</span>
                        <span class="bd-card-value">${totalParcels}</span>
                        <span class="bd-card-sub">All time</span>
                    </div>
                    <div class="bd-stat-card" style="background: #f0fff4; border-color: #c6f6d5;">
                        <span class="bd-card-label" style="color: #2f855a;">Successful</span>
                        <span class="bd-card-value" style="color: #38a169;">${totalDelivered}</span>
                        <span class="bd-card-sub">Delivered</span>
                    </div>
                    <div class="bd-stat-card" style="background: #fff5f5; border-color: #fed7d7;">
                        <span class="bd-card-label" style="color: #c53030;">Cancelled</span>
                        <span class="bd-card-value" style="color: #e53e3e;">${totalCancel}</span>
                        <span class="bd-card-sub">Failed</span>
                    </div>
                    <div class="bd-stat-card" style="background: #faf5ff; border-color: #e9d8fd;">
                        <span class="bd-card-label" style="color: #6b46c1;">Success Rate</span>
                        <span class="bd-card-value" style="color: #805ad5;">${successRate}%</span>
                        <div class="mt-2" style="background: #edf2f7; height: 4px; border-radius: 2px; overflow: hidden;">
                            <div style="width: ${successRate}%; background: #805ad5; height: 100%;"></div>
                        </div>
                    </div>
                </div>

                <div class="bd-main-content">
                    <div class="bd-table-col">
                        <table class="bd-table">
                            <thead>
                                <tr>
                                    <th>Courier</th>
                                    <th style="text-align: center">Total</th>
                                    <th style="text-align: center">Success</th>
                                    <th style="text-align: center">Cancel</th>
                                </tr>
                            </thead>
                            <tbody>
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

                    html += `
                        <tr>
                            <td><img src="${stats.logo}" alt="${stats.name}" onerror="this.src='https://api.bdcourier.com/c-logo/default.png'"></td>
                            <td style="text-align: center">${cTotal}</td>
                            <td style="text-align: center; color: #38a169;">${cSuccess}</td>
                            <td style="text-align: center; color: #e53e3e;">${cCancel}</td>
                        </tr>
                    `;
                });
            }

            html += `
                        <tr class="bd-table-total-row">
                            <td>Total</td>
                            <td style="text-align: center">${totalParcels}</td>
                            <td style="text-align: center; color: #38a169;">${totalDelivered}</td>
                            <td style="text-align: center; color: #e53e3e;">${totalCancel}</td>
                        </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bd-chart-col">
                        <h6 style="color: #4a5568; font-weight: 700; margin-bottom: 20px; font-size: 14px;">Delivery Status</h6>
                        <div class="donut-container">
                            <div class="donut" style="background: conic-gradient(#48bb78 0% ${passPercent}%, #f56565 ${passPercent}% 100%);">
                                <div class="donut-center">
                                    <span style="color: #48bb78">${totalDelivered}</span>
                                    <span style="color: #f56565; font-size: 12px; border-top: 1px solid #edf2f7; width: 40px; text-align: center;">${totalCancel}</span>
                                </div>
                            </div>
                            <div class="mt-4" style="display: flex; gap: 15px; font-size: 11px; font-weight: 600;">
                                <span style="display: flex; align-items: center; gap: 5px;"><i class="fa fa-square" style="color: #48bb78;"></i> Successful</span>
                                <span style="display: flex; align-items: center; gap: 5px;"><i class="fa fa-square" style="color: #f56565;"></i> Cancelled</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bd-footer-banner ${isHighRisk ? 'high-risk' : ''}">
                    <div class="bd-footer-icon"><i class="fa ${isHighRisk ? 'fa-exclamation-circle' : 'fa-check-circle'}"></i></div>
                    <div>
                        <div style="font-weight: 700; font-size: 14px;">${isHighRisk ? 'Low Success Rate' : 'High Success Rate'}: ${successRate}%</div>
                        <div style="font-size: 11px; opacity: 0.8;">${riskMsg}</div>
                    </div>
                </div>
                
                <div class="px-4 py-3 border-top d-flex justify-content-between align-items-center">
                    <span class="text-secondary small font-italic"><i class="fa fa-phone mr-1"></i> ${data.normalized_phone || phone}</span>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close Report</button>
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

