@extends('welcome')

@section('title')
    {{ __('messages.indicateurs') }}
@endsection

@section('css')
    <style>
        .indicators-container {
            padding: 100px 0;

        }

        .indicators-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .indicators-header h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 15px;
        }

        .indicators-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            padding: 20px 0;
        }

        .indicator-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .indicator-card:hover {
            transform: translateY(-5px);
        }

        .indicator-value {
            font-size: 32px;
            font-weight: bold;
            color: #333;
        }

        .indicator-percent {
            color: #0DA853;
            font-size: 24px;
        }

        .indicator-icon {
            font-size: 25px;
            color: #007bff;
        }

        .indicator-title {
            margin-top: 15px;
            font-size: 18px;
            font-weight: 600;
            color: #444;
        }
    </style>
@endsection

@section('content')
    <div class="indicators-container">
        <div class="container">
            <div class="indicators-header">
                <h1>Les indicateurs clés</h1>
                <p>Découvrez tous nos indicateurs de performance et statistiques clés</p>
            </div>

            <div class="indicators-grid">
                @foreach ($indicators as $indicator)
                    @if ($indicator->is_published)
                        <div class="indicator-card">
                            <div class="d-flex" style="justify-content: center;align-items: center;gap: 20px;">
                                <div class="d-flex justify-content-center align-items-center" style="gap: 2px">
                                    <div class="indicator-value">{{ $indicator->value }}</div>
                                    <div class="indicator-percent">%</div>
                                </div>
                                <i class="indicator-icon fa {{ $indicator->icon }}"></i>
                            </div>
                            <div class="indicator-title text-center">{{ $indicator->title }}</div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
