    @if(isset($category))
        <div class="main-slider">
            <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false" data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4" data-swiper-breakpoints="true" data-swiper-loop="true" >
                <div class="swiper-wrapper">
                    @foreach($category as $key => $value)
                        <div class="swiper-slide">
                            <a class="slider-category" href="{{ url('category/'.strtolower($value->name))}}">
                                <div class="blog-image"><img src="{{ $value->image }}" alt="Blog Image"></div>

                                <div class="category">
                                    <div class="display-table center-text">
                                        <div class="display-table-cell">
                                            <h3><b>{{ strtoupper($value->name) }}</b></h3>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div><!-- swiper-slide -->                    
                    @endForeach
                </div>
            </div>

        </div>                
    @endIf