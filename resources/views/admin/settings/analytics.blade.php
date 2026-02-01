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
</div>
