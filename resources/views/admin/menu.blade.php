<section class="menu-section py-5">
    <div class="container">

        <!-- Title -->
        <h2 class="menu-title text-center mb-4">Menu</h2>

        <!-- Filter Tabs -->
        <div class="menu-filter mb-4 text-center">
            <button class="filter-btn active" data-filter="all">🍱 Nasi Box</button>
            <button class="filter-btn" data-filter="prasmanan">🍽️ Prasmanan</button>
            <button class="filter-btn" data-filter="aqiqah">🐐 Tumpeng</button>
        </div>

        <!-- Menu Grid -->
        <div class="row g-4" id="menuContainer">
            @foreach($all_product as $product)
            <div class="col-md-4 menu-item"
                 data-category="all">
                <div class="menu-card">
                    <img src="{{ route('menu.image', ['id' => $product->id_menu]) }}" alt="{{ $product->nama_menu }}" class="cart-product-img">
                    <div class="menu-card-body">
                        <h5>{{ $product->nama_menu }}</h5>
                        <p class="desc">{{ Str::limit($product->desc_menu, 70) }}</p>

                        <div class="menu-footer">
                            <span class="price">
                                Rp {{ number_format($product->harga_menu, 0, ',', '.') }}
                            </span>

                            <a href="{{ route('menu.detail', $product->id_menu) }}"
                               class="btn-menu">
                                View Menu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>