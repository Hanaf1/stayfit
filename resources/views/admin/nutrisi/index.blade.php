@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Setting Nutrisi Recommendation</h2>
    </div>

    <div class="container">
        <div class="row" id="nutritionCards">
            <div class="col-md-4 mb-4">
                <a href="nutrisi/1" style="text-decoration: none; color: inherit;">
                    <div class="card">
                        <img src="https://source.unsplash.com/1200x1200?indoor" class="card-img-top" alt="Nutrition 1" style="cursor: pointer;">
                        <div class="card-body">
                            <h5 class="card-title">Aktivitas Dalam Ruangan</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="nutrisi/2" style="text-decoration: none; color: inherit;">
                    <div class="card">
                        <img src="https://source.unsplash.com/1200x1200?outdoor" class="card-img-top" alt="Nutrition 2" style="cursor: pointer;">
                        <div class="card-body">
                            <h5 class="card-title">Aktivitas Luar Ruangan</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
