<!-- resources/views/components/carousel-component.blade.php -->
<div id="carouselExample" class="h-screen carousel slide" data-ride="carousel" data-interval="2500" data-pause="false"
    style="transition: opacity 1s ease-in-out">
    <div class="carousel-inner">
        @foreach ($items as $item)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}"
                style="background-image: url('{{ asset('storage/asset/' . $item['image']) }}');">
                <div class="bg-center bg-cover d-flex h-100 align-items-center justify-content-center">
                    <div class="text-center text-white">
                        <h1 class="mb-4 text-5xl font-bold">{{ $item['title'] }}</h1>
                        <p class="mb-8 text-lg">{{ $item['description'] }}</p>
                        <button
                            class="p-2 font-bold text-white transition-all duration-300 rounded-full hover:bg-black-300 hover:scale-110 hover:text-stone-50">Get
                            Started</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
