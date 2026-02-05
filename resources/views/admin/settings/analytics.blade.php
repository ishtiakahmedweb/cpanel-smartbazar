<div class="tab-pane active" id="item-analytics" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="gtm_code">GTM / Analytics (Head Section)</label>
                <x-textarea name="gtm_code" id="gtm_code" rows="5" placeholder="<script>...</script>">{{$gtm_code ?? null}}</x-textarea>
                <x-error field="gtm_code" />
                <small class="text-muted">Paste your Google Tag Manager script or any other tracking code that belongs in the &lt;head&gt;.</small>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="gtm_noscript">GTM (Body Section)</label>
                <x-textarea name="gtm_noscript" id="gtm_noscript" rows="5" placeholder="<noscript>...</noscript>">{{$gtm_noscript ?? null}}</x-textarea>
                <x-error field="gtm_noscript" />
                <small class="text-muted">Paste the &lt;noscript&gt; part of your GTM code here. It will be placed immediately after the &lt;body&gt; tag.</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="pixel_ids">Domain Verification / Meta Tags</label>
                <x-textarea name="pixel_ids" id="pixel_ids" rows="3" placeholder="<meta name='facebook-domain-verification' ... />">{{$pixel_ids ?? null}}</x-textarea>
                <x-error field="pixel_ids" />
                <small class="text-muted">Add any domain verification meta tags here (Google, Facebook, etc).</small>
            </div>
        </div>
    </div>

    <!-- Data Layer Shield Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="p-3 mb-4 shadow-sm border-left-primary card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1 font-weight-bold text-primary">🛡️ 24-Hour Strict Accuracy Shield</h6>
                        <p class="mb-0 text-muted small">When enabled, key tracking events (ViewItem, Checkout, etc.) will only fire once per user every 24 hours to prevent duplicate data from reloads.</p>
                    </div>
                    <div class="custom-control custom-switch custom-switch-lg">
                        <input type="hidden" name="data_layer_shield" value="0">
                        <input type="checkbox" class="custom-control-input" id="data_layer_shield" name="data_layer_shield" value="1" {{ ($data_layer_shield ?? false) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="data_layer_shield"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Catalog Feeds Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="mt-4 shadow-sm card">
                <div class="text-white card-header bg-primary d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Catalog Feeds (Live Status)</h5>
                    @php
                        $lastProductUpdate = \App\Models\Product::max('updated_at');
                    @endphp
                    @if($lastProductUpdate)
                        <span class="badge badge-light" style="font-size: 11px;">
                            <i class="fa fa-refresh mr-1"></i> Catalog Last Updated: {{ \Illuminate\Support\Carbon::parse($lastProductUpdate)->diffForHumans() }}
                        </span>
                    @endif
                </div>
                <div class="card-body">
                    <div class="mb-3 alert alert-info">
                        <i class="mr-2 fa fa-info-circle"></i>
                        <strong>Real-time Tracking:</strong> The "Last Accessed" column shows when Facebook/Google last scanned your feed.
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Feed Type</th>
                                    <th>Last Accessed</th>
                                    <th>IP / Platform</th>
                                    <th width="150">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $feeds = [
                                        'facebook-xml' => ['name' => 'Facebook XML (RSS)', 'url' => url('/feed/facebook-xml')],
                                        'catalog-csv' => ['name' => 'Standard CSV', 'url' => url('/feed/catalog')],
                                        'catalog-simple-csv' => ['name' => 'Simple CSV', 'url' => url('/feed/catalog-simple')],
                                    ];
                                @endphp

                                @foreach ($feeds as $key => $feed)
                                    @php
                                        $hit = cacheMemo()->get("feed_hit:{$key}");
                                    @endphp
                                    <tr>
                                        <td>
                                            <strong>{{ $feed['name'] }}</strong>
                                            <br><small class="text-muted">{{ $feed['url'] }}</small>
                                        </td>
                                        <td>
                                            @if($hit)
                                                <span class="badge badge-success">{{ \Illuminate\Support\Carbon::parse($hit['time'])->diffForHumans() }}</span>
                                                <br><small>{{ $hit['time'] }}</small>
                                            @else
                                                <span class="badge badge-light">Never accessed</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($hit)
                                                <code>{{ $hit['ip'] }}</code>
                                                <br><small class="text-truncate d-inline-block" style="max-width: 200px;">{{ $hit['ua'] }}</small>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-xs btn-outline-primary copy-link" data-link="{{ $feed['url'] }}">Copy</button>
                                            <a href="{{ $feed['url'] }}" target="_blank" class="btn btn-xs btn-outline-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    runWhenJQueryReady(function($) {
        $('.copy-link').on('click', function() {
            const link = $(this).data('link');
            const $btn = $(this);
            
            navigator.clipboard.writeText(link).then(function() {
                const originalText = $btn.text();
                $btn.text('Copied!');
                $btn.addClass('btn-success').removeClass('btn-outline-primary');
                
                setTimeout(function() {
                    $btn.text(originalText);
                    $btn.addClass('btn-outline-primary').removeClass('btn-success');
                }, 2000);
            });
        });
    });
</script>
