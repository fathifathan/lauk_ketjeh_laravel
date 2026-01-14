@extends('layouts.admin')

@push('styles')
<style>
    .member-header h2 {
        font-weight: 700;
        color: #1b5e20;
    }

    .member-actions .btn {
        border-radius: 10px;
        padding: 8px 14px;
        font-size: 14px;
    }

    .member-table {
        background: #fff;
        border-radius: 16px;
        padding: 20px;
        border: 1px solid #e5e5e5;
    }

    .member-table img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
    }

    .status-active {
        background: #c6f6d5;
        color: #1b5e20;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-inactive {
        background: #fed7d7;
        color: #9b2c2c;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .action-icon i {
        cursor: pointer;
        margin: 0 6px;
    }
</style>
@endpush

@section('content')

<div class="member-header d-flex justify-content-between align-items-center mb-4">
    <h2>Members</h2>

    <div class="member-actions">
        <button class="btn btn-warning">Add new</button>
        <button class="btn btn-outline-success">Import Members</button>
        <button class="btn btn-outline-danger">Delete All</button>
    </div>
</div>

<div class="member-table">
    <table class="table align-middle">
        <thead class="text-muted">
            <tr>
                <th>Photo</th>
                <th>Nama Member</th>
                <th>No. Telephone</th>
                <th>Email</th>
                <th>Status</th>
                <th class="text-center">Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach(range(1,9) as $i)
            <tr>
                <td>
                    <img src="https://i.pravatar.cc/40?img={{ $i }}">
                </td>
                <td>Member {{ $i }}</td>
                <td>0812345678{{ $i }}</td>
                <td>member{{ $i }}@gmail.com</td>
                <td>
                    @if($i % 3 == 0)
                        <span class="status-inactive">Tidak aktif</span>
                    @else
                        <span class="status-active">Aktif</span>
                    @endif
                </td>
                <td class="text-center action-icon">
                    <i class="fa-solid fa-pen text-warning"></i>
                    <i class="fa-solid fa-trash text-danger"></i>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection