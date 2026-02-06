<div class="tab-pane active" id="item-telegram" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info py-2">
                <i class="fa fa-info-circle mr-2"></i>
                অর্ডার নোটিফিকেশন পাওয়ার জন্য নিচের তথ্যগুলো দিন। টোকেন পেতে <strong>@BotFather</strong> এবং চ্যাট আইডি পেতে <strong>@userinfobot</strong> ব্যবহার করুন।
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Telegram[token]">Telegram Bot Token</label>
                <x-input name="Telegram[token]" :value="$Telegram->token ?? ''" placeholder="E.g. 123456789:ABCDefgh..." />
                <x-error field="Telegram[token]" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Telegram[chat_id]">Telegram Chat ID</label>
                <x-input name="Telegram[chat_id]" :value="$Telegram->chat_id ?? ''" placeholder="E.g. 5727039778" />
                <x-error field="Telegram[chat_id]" />
            </div>
        </div>
    </div>

    <div class="mt-3 border-top pt-3 d-flex justify-content-between align-items-center">
        <p class="text-muted small mb-0">
            নোটিফিকেশন পেতে হলে আপনার বটটিকে প্রথমে স্টার্ট (Start) করতে হবে।
        </p>
        <button type="button" id="telegram-test-btn" class="btn btn-info btn-sm shadow">
            <i class="fas fa-paper-plane mr-1"></i> Send Test Message
        </button>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('telegram-test-btn')?.addEventListener('click', function() {
    if (!confirm('Send a test message to Telegram?')) return;
    
    const btn = this;
    const originalText = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Sending...';
    
    fetch('{{ route('admin.telegram-test') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        btn.disabled = false;
        btn.innerHTML = originalText;
        
        if (data.success || data.message?.includes('successfully')) {
            alert('✅ ' + (data.message || 'Test message sent successfully!'));
        } else {
            alert('❌ ' + (data.message || data.error || 'Failed to send message.'));
        }
    })
    .catch(error => {
        btn.disabled = false;
        btn.innerHTML = originalText;
        alert('❌ Error: ' + error.message);
    });
});
</script>
@endpush
