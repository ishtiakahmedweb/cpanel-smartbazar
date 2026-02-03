@push('styles')
<style>
    @if(!(setting('show_option')->category_dropdown ?? false))
    .block-slideshow--layout--with-departments .block-slideshow__body {
        margin-left: 0;
    }
    @endif

    /* Base styles for images */
    .block-slideshow__slide-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Desktop View */
    .block-slideshow__slide-image--mobile {
        display: none;
    }
    .block-slideshow__slide-image--desktop {
        display: block;
    }

    @media (max-width: 767px) {
        .block-slideshow__slide-image--desktop {
            display: none !important;
        }

        .block-slideshow__slide-image--mobile {
            display: block !important;
            height: 180px !important; /* Fixed height for mobile stability */
            width: 100% !important;
        }
        
        /* Force container to respect mobile banner height */
        
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
                            // Desktop: 840x395 typical
                            $desktopImageUrl = cdn(asset($slide->desktop_src), 840, 395);
                            // Mobile: 480w is sufficient for high-DPI mobile screens
                            $mobileImageUrl = cdn(asset($slide->mobile_src), 480);
                            $isFirst = $loop->first;
                        @endphp
                        <a class="block-slideshow__slide" href="{{ $slide->btn_href ?? '#' }}">
                            {{-- Desktop Image --}}
                            <img class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                 src="{{ $desktopImageUrl }}"
                                 alt="{{ $slide->title ?? 'Slide ' . ($index + 1) }}"
                                 width="840"
                                 height="395"
                                 style="object-fit: cover; width: 100%; height: 100%;"
                                 @if($isFirst) fetchpriority="high" @else loading="lazy" @endif>

                            {{-- Mobile Image --}}
                            <img class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                 src="{{ $mobileImageUrl }}"
                                 alt="{{ $slide->title ?? 'Slide ' . ($index + 1) }}"
                                 width="480"
                                 height="180"
                                 style="object-fit: cover; width: 100%; height: 100%;"
                                 @if($isFirst) fetchpriority="high" @else loading="lazy" @endif>

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
