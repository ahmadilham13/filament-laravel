<div class="sidebar">
    <div class="sidebar-widget">
        <div class="widget-title">
            <h5>Categories</h5>
        </div>
        <div class="widget-content widget-categories">
            <ul class="nav nav-category">
                @foreach ($categories as $category)
                    <li class="nav-item border-bottom w-100">
                        <a class="nav-link active" aria-current="page" href="{{ $category->getPermalink() }}">{{ $category->name }} <i class='bx bx-chevron-right'></i></a>
                    </li>
                @endforeach
            </ul>                  
        </div>
    </div>
    <div class="sidebar-widget mt-4">
        <div class="widget-title">
            <h5>Price Range</h5>
        </div>
        <div class="widget-content shop-by-price">
            <form method="GET" action="?">
                <div class="price-filter">
                    <div class="price-filter-inner">
                        <div id="slider-range"></div>
                        <div class="price_slider_amount">
                            <div class="label-input d-lg-flex justify-content-between">
                                <input type="hidden" id="min_price" value="1"/>
                                <input type="hidden" id="max_price" value="10"/>
                                <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                <button type="submit" class="btn-first-sm">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>