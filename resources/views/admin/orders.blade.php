@extends('layouts.admin')

@push('styles')
<style>
    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .order-title {
        font-size: 28px;
        font-weight: 700;
        color: #1b5e20;
    }

    .order-filters button {
        border-radius: 12px;
        padding: 6px 16px;
        font-weight: 500;
        margin-right: 8px;
    }

    .order-date {
        font-size: 14px;
        color: #555;
    }

    .order-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 20px;
    }

    .order-card {
        border: 1px solid #cfe3d4;
        border-radius: 18px;
        padding: 16px;
        background: #fff;
    }

    .order-card-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
    }

    .order-user {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .order-user img {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        object-fit: cover;
    }

    .order-status {
        font-size: 12px;
        padding: 4px 12px;
        border-radius: 20px;
        font-weight: 600;
        height: fit-content;
    }

    .status-done {
        background: #c6f6d5;
        color: #1b5e20;
    }

    .status-process {
        background: #fde68a;
        color: #92400e;
    }

    .order-items {
        font-size: 13px;
        color: #444;
        margin-bottom: 10px;
    }

    .order-items ul {
        padding-left: 18px;
        margin-bottom: 8px;
    }

    .order-items li {
        margin-bottom: 4px;
    }

    .order-divider {
        border-top: 1px dashed #cfd8dc;
        margin: 10px 0;
    }

    .order-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 12px;
    }

    .order-footer button {
        border-radius: 20px;
        font-size: 12px;
        padding: 6px 14px;
    }
</style>
@endpush

@section('content')

{{-- HEADER --}}
<div class="order-header">
    <div>
        <div class="order-date">Selasa, 13 Januari 2026</div>
        <div class="order-title">Orderan</div>
    </div>

    <div class="order-filters">
        <button class="btn btn-warning">All</button>
        <button class="btn btn-outline-success">Dalam proses</button>
        <button class="btn btn-outline-success">Selesai</button>
    </div>
</div>

{{-- GRID --}}
<div class="order-grid">

@foreach(range(1,6) as $i)
<div class="order-card">

    {{-- HEADER CARD --}}
    <div class="order-card-header">
        <div class="order-user">
            <img src="https://i.pravatar.cc/100?img={{ $i }}">
            <div>
                <strong>Andi Pratama</strong><br>
                <small>Order #12 · Delivery</small>
            </div>
        </div>

        <span class="order-status {{ $i % 2 == 0 ? 'status-process' : 'status-done' }}">
            {{ $i % 2 == 0 ? 'Proses' : 'Done' }}
        </span>
    </div>

    {{-- DETAIL PESANAN --}}
    <div class="order-items">
        <small>Selasa, 13 Januari 2026</small>

        <ul>
            <li>Nasi Box Ayam Bakar <strong>x2</strong></li>
            <li>Nasi Box Rendang <strong>x1</strong></li>
            <li>Air Mineral <strong>x3</strong></li>
        </ul>

        <div class="order-divider"></div>

        <div>
            <strong>Total Pesanan:</strong> Rp 1.200.000<br>
            <small>Alamat: Jl. Raya Ketjeh No.12</small>
        </div>
    </div>

    {{-- FOOTER --}}
    <div class="order-footer">
        <button class="btn btn-outline-secondary">Edit Pemesanan</button>
        <button class="btn btn-warning">Cek Pembayaran</button>
    </div>

</div>
@endforeach

</div>

@endsection
