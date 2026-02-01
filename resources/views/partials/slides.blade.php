@push('links')
    @if($isFirstSlide = (isset($index) && $index === 0))
        @php
            $slide = slides()->first();
            $lcpImageUrl = cdn(asset($slide->desktop_src), 840, 395);
        @endphp
        <link rel="preload" as="image" href="{{ $lcpImageUrl }}" fetchpriority="high">
    @endif
@endpush

@push('styles')
<style>
    @if(!(setting('show_option')->category_dropdown ?? false))
    .block-slideshow--layout--with-departments .block-slideshow__body {
        margin-left: 0;
    }
    @endif

    .block-slideshow__slide-image--mobile {
        display: none;
        width: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    @media (max-width: 767px) {
        .block-slideshow__slide-image--desktop {
            display: none !important;
        }

        .block-slideshow__slide-image--mobile {
            display: block !important;
            height: 180px !important;
            min-height: 180px !important;
            background-color: #f0f0f0; /* Fallback if image doesn't load */
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            position: relative;
            z-index: 1;
        }
        
        /* Force container to respect mobile banner height */
        .block-slideshow__slide {
            height: auto !important;
            min-height: 180px !important;
        }
        
        /* Collapse other containers but not the slide itself */
        .block-slideshow__body, 
        .owl-carousel, 
        .owl-stage-outer, 
        .owl-stage, 
        .owl-item {
            height: auto !important;
            min-height: 0 !important;
        }
    }

    .block-slideshow__body .owl-carousel .owl-nav {
        /* position: absolute; */
        height: 100%;
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        font-size: 40px;
        top: 0;
    }
    .block-slideshow__body .owl-carousel .owl-nav button {
        position: absolute;
        top: 35%;
        height: 60px;
        color: white;
        background: rgba(0, 0, 0, 0.1);
        padding-left: 5px !important;
        padding-right: 5px !important;
    }
    .owl-prev {
        left: 0;
    }
    .owl-next {
        right: 0;
    }
    .block-slideshow__body .owl-carousel .owl-nav button:focus {
        outline: none;
    }
    @media (max-width: 749px) {
        .block-slideshow {
            margin-bottom: 40px;
        }
        #slideshow-container {
            padding-left: 5px;
            padding-right: 5px;
        }
        #slideshow-container > div {
            margin-left: -5px;
            margin-right: -5px;
        }
        #slideshow-container > div > div {
            padding-left: 5px;
            padding-right: 5px;
        }
        .block-slideshow__body {
            margin-top: 5px !important;
        }
    }
    /* Ensure img-based slides maintain proper dimensions if used */
    .block-slideshow__slide-image img {
        display: block;
    }
</style>
@endpush
<div class="block block-slideshow block-slideshow--layout--with-departments">
    <div id="slideshow-container" class="container">
        <div class="row">
            <div class="col-12">
                <div class="block-slideshow__body">
                    <div class="owl-carousel">
                        @foreach(slides() as $index => $slide)
                        @php
                            $desktopImageUrl = cdn(asset($slide->desktop_src), 840, 395);
                            $mobileImageUrl = cdn(asset($slide->mobile_src), 480);
                        @endphp
                        <a class="block-slideshow__slide" href="{{ $slide->btn_href ?? '#' }}">
                            <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                style="background-image: url('{{ $desktopImageUrl }}')"></div>
                            <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                style="background-image: url('{{ $mobileImageUrl }}')"></div>
                            <div class="block-slideshow__slide-content">
                                <div class="block-slideshow__slide-title">{!! $slide->title !!}</div>
                                <div class="block-slideshow__slide-text">{!! $slide->text !!}</div>
                                @if($slide->btn_href && $slide->btn_name)
                                <div class="block-slideshow__slide-button">
                                    <span class="btn btn-primary btn-lg">{{ $slide->btn_name }}</span>
                                </div>
                                @endif
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
