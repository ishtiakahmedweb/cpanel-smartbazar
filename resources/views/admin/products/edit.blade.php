@extends('layouts.light.master')
@section('title', 'Edit Product')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}">
@endpush

@section('breadcrumb-title')
<h3>Edit Product</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    <a href="{{ route('admin.products.index') }}">Products</a>
</li>
<li class="breadcrumb-item">Edit Product</li>
@endsection


@push('styles')
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<style>
    .nav-tabs {
        border: 2px solid #ddd;
    }
    .nav-tabs li:hover a,
    .nav-tabs li a.active {
        border-radius: 0;
        border-bottom-color: #ddd !important;
    }
    .nav-tabs li a.active {
        background-color: #f0f0f0 !important;
    }
    .nav-tabs li a:hover {
        border-bottom: 1px solid #ddd;
        background-color: #f7f7f7;
    }

    .is-invalid + .SumoSelect + .invalid-feedback {
        display: block;
    }
</style>
<style>
    .dropzone {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .previewer {
        display: inline-block;
        position: relative;
        margin-left: 3px;
        margin-right: 7px;
    }
    .previewer i {
        position: absolute;
        top: 0;
        color: red;
        right: 0;
        background: #ddd;
        padding: 2px;
        border-radius: 3px;
        cursor: pointer;
    }
    .dataTables_scrollHeadInner {
        width: 100% !important;
    }
    th,
    td {
        vertical-align: middle !important;
    }
    table.dataTable tbody td.select-checkbox:before,
    table.dataTable tbody td.select-checkbox:after,
    table.dataTable tbody th.select-checkbox:before,
    table.dataTable tbody th.select-checkbox:after {
        top: 50%;
    }
    .select2 {
        width: 100% !important;
    }
    .select2-selection.select2-selection--multiple {
        display: flex;
        align-items: center;
    }
    .select2-container .select2-selection--single {
        border-color: #ced4da !important;
    }
</style>
@endpush

@section('content')
@php
    $colorOptions = $product->variations->flatMap(function ($variation) {
        return $variation->options->filter(function ($option) {
            return strtolower($option->attribute->name) === 'color';
        });
    })->unique('id')->values();
@endphp
<div class="mb-5 row">
    @if($errors->any())
    <div class="col-12">
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="@if ($product->parent_id) col-md-12 @else col-md-8 @endif">
        <div class="shadow-sm card rounded-0">
            <div class="p-3 card-header">Edit <strong>Product</strong></div>
            <div class="p-3 card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col">
                                <x-form action="{{ route('admin.products.update', $product) }}" method="patch">
                                    @include('admin.products.form')
                                </x-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @unless ($product->parent_id)
    <div class="col-md-4">
        <div class="shadow-sm card rounded-0">
            <div class="px-3 py-2 card-header">
                <strong>Attributes</strong>
            </div>
            <div class="p-2 card-body">
                <x-form method="POST" action="{{ route('admin.products.variations.store', $product) }}">
                    <div id="attributes">
                        @php $options = $product->variations->pluck('options')->flatten()->unique('id')->pluck('id'); @endphp
                        @foreach ($attributes as $attribute)
                        <div class="mb-3 shadow-sm card rounded-0">
                            <div class="px-3 py-2 card-header d-flex justify-content-between align-items-center">
                                <a class="card-link" data-toggle="collapse" href="#collapse-{{$attribute->id}}">
                                    {{ $attribute->name }}
                                </a>
                                <button type="button" class="btn btn-sm btn-primary add-option-btn py-0" data-attribute-id="{{ $attribute->id }}" data-attribute-name="{{ $attribute->name }}">+</button>
                            </div>
                            <div id="collapse-{{$attribute->id}}" class="collapse" data-parent="#attributes">
                                <div class="px-3 py-2 card-body">
                                    <div class="flex-wrap d-flex" style="column-gap: 3rem;">
                                        @foreach ($attribute->options as $option)
                                            <div class="checkbox checkbox-secondary d-flex align-items-center mb-1" id="option-wrapper-{{ $option->id }}">
                                                <div class="d-flex align-items-center flex-grow-1">
                                                    <x-checkbox :id="'opt-' . $option->id" name="attributes[{{$attribute->id}}][]" value="{{ $option->id }}" :checked="$options->contains($option->id)" />
                                                    <x-label :for="'opt-' . $option->id" class="mb-0 ml-1" :style="strtolower($attribute->name) == 'color' ? 'border-left: 10px solid '.$option->value.'; padding-left: 5px;' : ''">
                                                        {{ $option->name }}
                                                    </x-label>
                                                </div>
                                                <button type="button" class="btn btn-xs btn-outline-danger delete-option-btn ml-2" 
                                                    data-option-id="{{ $option->id }}" 
                                                    data-attribute-id="{{ $attribute->id }}"
                                                    title="Delete this option permanently">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-block btn-success">Generate Variations</button>
                </x-form>
            </div>
        </div>

        @if($colorOptions->isNotEmpty())
        <div class="shadow-sm card rounded-0">
            <div class="px-3 py-2 card-header">
                <strong>Color Images</strong>
                <small class="text-muted d-block">Select one image per color. It will be applied to all variations with that color.</small>
            </div>
            <div class="p-3 card-body">
                <div class="row">
                    @foreach ($colorOptions as $colorOption)
                    <div class="mb-3 col-md-6">
                        <div class="p-2 rounded border">
                            <label class="mb-2 d-block">
                                <strong>{{ $colorOption->name }}</strong>
                                <button type="button" class="px-2 btn btn-sm btn-light" data-toggle="modal" data-target="#color-image-picker-{{$colorOption->id}}" style="background: transparent; margin-left: 5px;">
                                    <i class="mr-1 fa fa-image text-secondary"></i>
                                    <span>Browse</span>
                                </button>
                            </label>
                            <div id="color-preview-{{$colorOption->id}}" class="color-image-preview" style="min-height: 100px;">
                                @php
                                    // Find any variation with this color to get its current image
                                    $variationWithColor = $product->variations->first(function($v) use ($colorOption) {
                                        return $v->options->contains('id', $colorOption->id);
                                    });
                                    $currentImage = $variationWithColor?->base_image;
                                @endphp
                                @if($currentImage)
                                <img src="{{ asset($currentImage->src) }}" alt="{{ $colorOption->name }}" data-toggle="modal" data-target="#color-image-picker-{{$colorOption->id}}" class="img-thumbnail" style="max-width: 100px; cursor: pointer;">
                                @else
                                <p class="text-muted no-image-text">No image selected</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <div class="shadow-sm card rounded-0">
            <div class="px-3 py-2 card-header">
                <strong>Variations</strong>
            </div>
            <div class="p-2 card-body">
                <x-form method="PATCH" action="{{ route('admin.products.variations.bulk-update', $product) }}" id="variations-bulk-form">
                    @foreach ($colorOptions as $colorOption)
                    @php
                        $variationWithColor = $product->variations->first(function($v) use ($colorOption) {
                            return $v->options->contains('id', $colorOption->id);
                        });
                        $currentImage = $variationWithColor?->base_image;
                    @endphp
                    <input type="hidden" name="color_images[{{$colorOption->id}}]" value="{{ $currentImage?->id ?? '' }}" class="color-image-input-{{$colorOption->id}}">
                    @endforeach
                    <div id="variations">
                        @foreach ($product->variations as $variation)
                        <div class="mb-3 shadow-sm card rounded-0">
                            <div class="px-3 py-2 card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapse-{{$variation->id}}">
                                    [#{{$variation->id}}] {{ $variation->name }}
                                </a>
                            </div>
                            <div id="collapse-{{$variation->id}}" class="collapse" data-parent="#variations">
                                <div class="px-3 py-2 card-body">
                                    <div class="flex-wrap d-flex" style="column-gap: 3rem;">
                                        <div class="tab-pane active" id="var-price-{{$variation->id}}" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4><small class="mb-1 border-bottom">Price</small></h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="price-{{$variation->id}}">Price <span class="text-danger">*</span></label>
                                                        <input type="hidden" name="variations[{{$loop->index}}][id]" value="{{$variation->id}}">
                                                        <x-input id="price-{{$variation->id}}" name="variations[{{$loop->index}}][price]" :value="$variation->price" />
                                                        <x-error field="variations.{{$loop->index}}.price" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="selling-price-{{$variation->id}}">Selling Price <span class="text-danger">*</span></label>
                                                        <x-input id="selling-price-{{$variation->id}}" name="variations[{{$loop->index}}][selling_price]" :value="$variation->selling_price" />
                                                        <x-error field="variations.{{$loop->index}}.selling_price" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="purchase-price-{{$variation->id}}">Average Purchase Price</label>
                                                        <x-input id="purchase-price-{{$variation->id}}" name="variations[{{$loop->index}}][purchase_price]" :value="$variation->purchase_price" />
                                                        <x-error field="variations.{{$loop->index}}.purchase_price" />
                                                    </div>
                                                </div>
                                                @if(isOninda() && config('app.resell'))
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="suggested-price-{{$variation->id}}">Suggested Retail Price</label>
                                                        <x-input id="suggested-price-{{$variation->id}}" name="variations[{{$loop->index}}][suggested_price]" :value="$variation->suggested_price" />
                                                        <x-error field="variations.{{$loop->index}}.suggested_price" />
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="shadow-sm card rounded-0">
                                                <div class="p-1 card-header">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <strong>Wholesale (Quantity|Price)</strong>
                                                        <button type="button" class="btn btn-primary btn-sm add-wholesale">+</button>
                                                    </div>
                                                </div>
                                                <div class="p-1 card-body">
                                                    @foreach (old('wholesale.price', $variation->wholesale['price'] ?? []) as $price)
                                                        <div class="mb-1 form-group">
                                                            <div class="input-group">
                                                                <x-input name="variations[{{$loop->parent->index}}][wholesale][quantity][]" placeholder="Quantity" value="{{old('wholesale.quantity', $variation->wholesale['quantity'] ?? [])[$loop->index]}}" />
                                                                <x-input name="variations[{{$loop->parent->index}}][wholesale][price][]" placeholder="Price" value="{{$price}}" />
                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn btn-danger btn-sm remove-wholesale">x</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <ul>
                                                        @foreach ([$errors->first('variations.'.$loop->index.'.wholesale.price.*'), $errors->first('variations.'.$loop->index.'.wholesale.quantity.*')] as $error)
                                                            <li class="text-danger">{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane active" id="var-invent-{{$variation->id}}" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4><small class="mb-1 border-bottom">Inventory</small></h4>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="hidden" name="variations[{{$loop->index}}][should_track]" value="0" />
                                                            <x-checkbox id="should-track-{{$variation->id}}" name="variations[{{$loop->index}}][should_track]" value="1" :checked="$variation->should_track" class="should_track custom-control-input" />
                                                            <label for="should-track-{{$variation->id}}" class="custom-control-label">Should Track</label>
                                                            <x-error field="variations.{{$loop->index}}.should_track" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sku-{{$variation->id}}">Product Code</label><span class="text-danger">*</span>
                                                        <x-input id="sku-{{$variation->id}}" name="variations[{{$loop->index}}][sku]" :value="$variation->sku" />
                                                        <x-error field="variations.{{$loop->index}}.sku" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group stock-count" @if(!old('should_track', $variation->should_track)) style="display: none;" @endif>
                                                        <label for="stock-count-{{$variation->id}}">Stock Count <span class="text-danger">*</span></label>
                                                        <x-input id="stock-count-{{$variation->id}}" name="variations[{{$loop->index}}][stock_count]" :value="$variation->stock_count" />
                                                        <x-error field="variations.{{$loop->index}}.stock_count" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-3 text-center">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Save All Variations
                        </button>
                    </div>
                </x-form>
            </div>
        </div>

        <div class="shadow-sm card rounded-0">
            <div class="px-3 py-2 card-header">
                <strong>SEO Settings</strong>
            </div>
            <div class="p-2 card-body">
                <small class="text-muted d-block mb-3">These fields are optional. If left empty, the system will use default values based on the product name and description.</small>
                <x-form method="PATCH" action="{{ route('admin.products.seo.update', $product) }}">
                    @if ($message = Session::get('success'))
                        <div class="py-2 alert alert-info"><strong>{{ $message }}</strong></div>
                    @endif
                    <div class="form-group">
                        <label for="seo_title">SEO Title</label>
                        <x-input name="seo[title]" :value="old('seo.title', $product->seo?->title)" placeholder="Leave empty to use product name" />
                        <x-error field="seo.title" />
                        <small class="form-text text-muted">Recommended: 50-60 characters. If empty, product name will be used.</small>
                    </div>
                    <div class="form-group">
                        <label for="seo_description">SEO Description</label>
                        <x-textarea name="seo[description]" cols="30" rows="3" placeholder="Leave empty to use short description or product description">{{ old('seo.description', $product->seo?->description) }}</x-textarea>
                        <x-error field="seo.description" />
                        <small class="form-text text-muted">Recommended: 150-160 characters. If empty, short description or description will be used.</small>
                    </div>
                    <div class="form-group">
                        <label for="seo_image">SEO Image (Open Graph)</label>
                        <x-input name="seo[image]" :value="old('seo.image', $product->seo?->image)" placeholder="Full URL to image" />
                        <x-error field="seo.image" />
                        <small class="form-text text-muted">Optional: Full URL to an image for social media sharing. Recommended: 1200x630px. If empty, product base image will be used.</small>
                    </div>
                    <button type="submit" class="btn btn-block btn-success">
                        <i class="fas fa-save"></i> Save SEO Settings
                    </button>
                </x-form>
            </div>
        </div>
    </div>
    @endunless
</div>

@include('admin.images.single-picker', ['selected' => old('base_image', optional($product->base_image)->id)])
@include('admin.images.multi-picker', ['selected' => old('additional_images', $product->additional_images->pluck('id')->toArray())])

@foreach ($colorOptions as $colorOption)
    @php
        $variationWithColor = $product->variations->first(function($v) use ($colorOption) {
            return $v->options->contains('id', $colorOption->id);
        });
        $currentImage = $variationWithColor?->base_image;
    @endphp
    @include('admin.images.color-image-picker', [
        'colorOptionId' => $colorOption->id,
        'colorOptionName' => $colorOption->name,
        'selected' => $currentImage?->id ?? 0
    ])
@endforeach

<!-- Quick Add Option Modal -->
<div class="modal fade" id="quickAddOptionModal" tabindex="-1" role="dialog" aria-labelledby="quickAddOptionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quickAddOptionModalLabel">Add New Option</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="quick-add-attribute-id">
                <div class="form-group">
                    <label for="quick-add-option-name" id="quick-add-option-label">Option Name</label>
                    <input type="text" class="form-control" id="quick-add-option-name" placeholder="Enter option name (e.g. XL, Red)">
                </div>
                <div class="form-group" id="quick-add-color-group" style="display: none;">
                    <label for="quick-add-option-color">Color Code (Hex)</label>
                    <div class="input-group">
                        <input type="color" class="form-control p-1" id="quick-add-option-color-picker" style="max-width: 50px; height: 38px;">
                        <input type="text" class="form-control" id="quick-add-option-color" placeholder="#000000">
                    </div>
                    <small class="text-muted">Pick a color or enter hex code.</small>
                </div>
                <div class="invalid-feedback d-block" id="quick-add-error"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-quick-option">Save Option</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('js/tinymce.js') }}" defer></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}" defer></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}" defer></script>
@endpush

@push('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script>
    $(document).ready(function () {
        $('.add-wholesale').click(function (e) {
            e.preventDefault();

            $(this).closest('.card').find('.card-body').append(`
                <div class="mb-1 form-group">
                    <div class="input-group">
                        <x-input name="wholesale[quantity][]" placeholder="Quantity" />
                        <x-input name="wholesale[price][]" placeholder="Price" />
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger btn-sm remove-wholesale">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `);
        });
        $(document).on('click', '.remove-wholesale', function (e) {
            e.preventDefault();

            $(this).closest('.form-group').remove();
        });
        $('.additional_images-previews').sortable();
        // $('[name="name"]').keyup(function () {
        //     $($(this).data('target')).val(slugify($(this).val()));
        // });

        $('.should_track').change(function() {
            if($(this).is(':checked')) {
                $(this).closest('.row').find('.stock-count').show();
            } else {
                $(this).closest('.row').find('.stock-count').hide();
            }
        });

        $('[selector]').select2({
            // tags: true,
        });

        // Quick Add Option Logic
        $('.add-option-btn').click(function(e) {
            e.preventDefault();
            e.stopPropagation(); // Prevent collapsing the card
            let attrId = $(this).data('attribute-id');
            let attrName = $(this).data('attribute-name').toLowerCase();
            
            $('#quick-add-attribute-id').val(attrId);
            $('#quick-add-option-label').text('New Option for ' + $(this).data('attribute-name'));
            $('#quick-add-option-name').val('');
            $('#quick-add-option-color').val('');
            $('#quick-add-error').text('').hide();

            if (attrName.includes('color')) {
                $('#quick-add-color-group').show();
            } else {
                $('#quick-add-color-group').hide();
            }

            $('#quickAddOptionModal').modal('show');
            setTimeout(() => $('#quick-add-option-name').focus(), 500);
        });

        // Sync color picker with text input
        $('#quick-add-option-color-picker').on('input', function() {
            $('#quick-add-option-color').val($(this).val().toUpperCase());
        });
        $('#quick-add-option-color').on('input', function() {
            let val = $(this).val();
            if (val.match(/^#[0-9A-F]{6}$/i)) {
                $('#quick-add-option-color-picker').val(val);
            }
        });

        $('#save-quick-option').click(function() {
            let btn = $(this);
            let attrId = $('#quick-add-attribute-id').val();
            let name = $('#quick-add-option-name').val();
            let value = $('#quick-add-option-color').val() || name;
            
            if (!name) {
                $('#quick-add-error').text('Please enter a name').show();
                return;
            }

            btn.prop('disabled', true).text('Saving...');

            $.ajax({
                url: '/admin/attributes/' + attrId + '/options',
                method: 'POST',
                headers: {
                    'Accept': 'application/json'
                },
                data: {
                    name: name,
                    value: value,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        $('#quickAddOptionModal').modal('hide');
                        let container = $('#collapse-' + attrId + ' .card-body .d-flex');
                        let isColor = $('#quick-add-color-group').is(':visible');
                        
                        let newOptionHtml = `
                            <div class="checkbox checkbox-secondary d-flex align-items-center mb-1" id="option-wrapper-${response.option.id}">
                                <div class="d-flex align-items-center flex-grow-1">
                                    <div class="checkbox checkbox-secondary">
                                        <input type="checkbox" id="opt-${response.option.id}" name="attributes[${attrId}][]" value="${response.option.id}" checked>
                                        <label for="opt-${response.option.id}" class="mb-0 ml-1" style="${isColor ? 'border-left: 10px solid '+response.option.value+'; padding-left: 5px;' : ''}">
                                            ${response.option.name}
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-xs btn-outline-danger delete-option-btn ml-2" 
                                    data-option-id="${response.option.id}" 
                                    data-attribute-id="${attrId}"
                                    title="Delete this option permanently">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        `;
                        container.append(newOptionHtml);
                        $('#collapse-' + attrId).collapse('show');
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = 'Error occurred';
                    if (errors) {
                        errorMessage = Object.values(errors).flat()[0];
                    }
                    $('#quick-add-error').text(errorMessage).show();
                },
                complete: function() {
                    btn.prop('disabled', false).text('Save Option');
                }
            });
        });

        // Delete Option Logic
        $(document).on('click', '.delete-option-btn', function(e) {
            e.preventDefault();
            let btn = $(this);
            let optionId = btn.data('option-id');
            let attrId = btn.data('attribute-id');
            
            if (!confirm('Are you sure you want to delete this option permanently? This cannot be undone.')) {
                return;
            }

            btn.prop('disabled', true).find('i').removeClass('fa-trash').addClass('fa-spinner fa-spin');

            $.ajax({
                url: `/admin/attributes/${attrId}/options/${optionId}`,
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json'
                },
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        $(`#option-wrapper-${optionId}`).fadeOut(300, function() {
                            $(this).remove();
                        });
                    }
                },
                error: function(xhr) {
                    alert('Error deleting option. It might be in use.');
                    btn.prop('disabled', false).find('i').removeClass('fa-spinner fa-spin').addClass('fa-trash');
                }
            });
        });

        // Trigger save on Enter key in modal
        $('#quick-add-option-name, #quick-add-option-color').keypress(function(e) {
            if(e.which == 13) {
                $('#save-quick-option').click();
                return false;
            }
        });

    });
</script>
@endpush
