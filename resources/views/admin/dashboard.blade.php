@extends('layouts.app')

@section('content')
    <div class="admin-dashboard">
        <div class="container">
            <h1>لوحة التحكم</h1>

            {{-- Summary Cards --}}
            <div class="dashboard-cards">
                <div class="card card-stat">
                    <div class="card-icon whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                    </div>
                    <div class="card-content">
                        <div class="card-label">واتساب اليوم</div>
                        <div class="card-value">{{ $whatsappToday }}</div>
                    </div>
                </div>

                <div class="card card-stat">
                    <div class="card-icon call-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                    </div>
                    <div class="card-content">
                        <div class="card-label">اتصال اليوم</div>
                        <div class="card-value">{{ $callToday }}</div>
                    </div>
                </div>

                <div class="card card-stat">
                    <div class="card-icon whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                    </div>
                    <div class="card-content">
                        <div class="card-label">واتساب (7 أيام)</div>
                        <div class="card-value">{{ $whatsappWeek }}</div>
                    </div>
                </div>

                <div class="card card-stat">
                    <div class="card-icon call-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                    </div>
                    <div class="card-content">
                        <div class="card-label">اتصال (7 أيام)</div>
                        <div class="card-value">{{ $callWeek }}</div>
                    </div>
                </div>
            </div>

            {{-- Filters --}}
            <div class="dashboard-filters">
                <form method="GET" action="{{ route('admin.dashboard') }}" class="filter-form">
                    <div class="filter-group">
                        <label for="type">النوع:</label>
                        <select name="type" id="type">
                            <option value="">الكل</option>
                            <option value="whatsapp" {{ $typeFilter === 'whatsapp' ? 'selected' : '' }}>واتساب</option>
                            <option value="call" {{ $typeFilter === 'call' ? 'selected' : '' }}>اتصال</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="date_from">من تاريخ:</label>
                        <input type="date" name="date_from" id="date_from" value="{{ $dateFrom }}">
                    </div>
                    <div class="filter-group">
                        <label for="date_to">إلى تاريخ:</label>
                        <input type="date" name="date_to" id="date_to" value="{{ $dateTo }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">تصفية</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-ghost btn-sm">مسح</a>
                </form>
            </div>

            {{-- Recent Clicks Table --}}
            <div class="dashboard-table">
                <h2>آخر النقرات</h2>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>الوقت</th>
                                <th>النوع</th>
                                <th>الصفحة</th>
                                <th>المصدر</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentClicks as $click)
                                <tr>
                                    <td>{{ $click->created_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <span class="badge badge-{{ $click->type }}">{{ $click->type_arabic }}</span>
                                    </td>
                                    <td>{{ \Illuminate\Support\Str::limit($click->page, 50) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($click->referrer ?? '-', 50) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">لا توجد نقرات حتى الآن</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        .admin-dashboard {
            padding: 2rem 0;
            background: #f5f5f5;
            min-height: 100vh;
        }

        .admin-dashboard h1 {
            margin-bottom: 2rem;
            color: #333;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .card-stat {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .whatsapp-icon {
            background: #25d366;
        }

        .call-icon {
            background: #0b6e4f;
        }

        .card-label {
            font-size: 0.875rem;
            color: #666;
            margin-bottom: 0.25rem;
        }

        .card-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: #333;
        }

        .dashboard-filters {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .filter-form {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            gap: 1rem;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-group label {
            font-size: 0.875rem;
            color: #666;
        }

        .filter-group select,
        .filter-group input {
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }

        .dashboard-table {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .dashboard-table h2 {
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .dashboard-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .dashboard-table th,
        .dashboard-table td {
            padding: 0.75rem 1rem;
            text-align: right;
            border-bottom: 1px solid #eee;
        }

        .dashboard-table th {
            background: #f9f9f9;
            font-weight: 600;
        }

        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .badge-whatsapp {
            background: #dcf8c6;
            color: #075e54;
        }

        .badge-call {
            background: #e3f2fd;
            color: #1565c0;
        }

        .text-center {
            text-align: center;
        }
    </style>
@endsection
