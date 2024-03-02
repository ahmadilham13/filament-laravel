@extends('themes.indotoko.layouts.app')

@section('content')

{{-- Content Start --}}

<section class="breadcrumb-section pb-4 pb-md-4 pt-4 pt-md-4">
    <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
      </nav>
    </div>
</section>

<section class="main-content">
    <div class="container">
        <div class="row">
            <aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
                @include('themes.indotoko.product.sidebar', ['categories' => $categories])
            </aside>
    
            <section class="col-lg-9 col-md-12 products">
                <div class="card mb-4 bg-light border-0 section-header">
                    <div class="card-body p-5">
                        <h2 class="mb-0">Products</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-lg-0">
                            &nbsp;
                        </div>
                        <div class="d-flex mt-2 mt-lg-0">
                            <div class="me-2 flex-grow-1">
                                &nbsp;
                            </div>
                        </div>
                        @include('themes.indotoko.product.partials.filter-form', [
                            'search' => $search,
                            'sortChoices' => $sortChoices,
                            'sortBy' => $sortBy,
                        ])
                    </div>
                </div>
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-lg-3 col-6">
                            <div class="card card-product card-body p-lg-4 p3">
                                <a href="#"><img src="https://placehold.co/600x800" alt="" class="img-fluid"></a>
                                <h3 class="product-name mt-3">{{ $product->name }}</h3>
                                <div class="rating">
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                </div>
                                <div class="detail d-flex justify-content-between align-items-center mt-4">
                                    <p class="price">IDR {{ $product->price }}</p>
                                    <a href="product.html" class="btn-cart"><i class="bx bx-cart-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Product Empty</p>
                    @endforelse
                </div>
            </section>
        </div>
    </div>
</section>

{{-- Content End --}}

@endsection