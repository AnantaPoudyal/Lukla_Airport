@extends('Master_Layout.masterPage')
@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start">
    <!-- Image Slider on the Left -->
    <div class="w-100 mb-4 mb-md-0">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($imageSliderData as $tempImage)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{$tempImage}}" class="d-block w-100" style="height: 600px;" alt="...">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Employee Cards on the Right -->
    <div class="w-100 w-md-50">
        @foreach ($empDetails as $emp)
            <div class="widget widget-person mb-4" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                <h3 class="person-title">{{ ucfirst($emp['empTitles']) }}</h3>
                <div class="person-detail d-flex align-items-center">
                    <!-- Image Section (Left) -->
                    <div class="me-3">
                        <img src="{{ $emp['empImage'] }}" alt="Employee Image" width="100" height="100">
                    </div>

                    <!-- Text Section (Right) -->
                    <div>
                        <p><strong>{{ ucfirst($emp['empName']) }}</strong></p>
                        <p><strong>{{ ucfirst($emp['empTitles']) }}</strong></p>
                        <p>&nbsp;</p>
                        <ul></ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    {{-- <pre>{{print_r((array)$flight_data)}} --}}
<div>
    @for ($i=0;$i<15;$i++)
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores harum exercitationem fugit consequuntur ullam sapiente molestias magnam doloribus quam natus nesciunt fuga in, possimus cumque reiciendis quae accusamus dignissimos mollitia!
    @endfor
</div>




@endsection
