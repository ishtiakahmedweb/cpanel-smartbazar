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

    <div class="mt-3 border-top pt-3">
        <p class="text-muted small">
            নোটিফিকেশন পেতে হলে আপনার বটটিকে প্রথমে স্টার্ট (Start) করতে হবে।
        </p>
    </div>
</div>
