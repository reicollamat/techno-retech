@extends('layouts.master_layout')
@section('content')
    {{-- session flash notification --}}
    <x-notification-alert>
        @if (session('notification-livewire'))
            {{ session('notification-livewire') }}
        @else
            {{ session('notification') }}
        @endif
    </x-notification-alert>

    <!-- Breadcrumb Start -->
    <x-shop.breadcrumb>
        <a class="breadcrumb-item" href="#">Home</a>
        <a class="breadcrumb-item" href="#">Shop</a>
        <span class="breadcrumb-item active">Product Detail</span>
    </x-shop.breadcrumb>
    <!-- Breadcrumb End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="row border border-dark rounded">
                        <div class="col-lg-10">
                            <div class="carousel-inner p-5">
                                @foreach ($categoryproduct->product->product_images as $key => $image)
                                    @if ($key == 0)
                                        <div class="carousel-item active">
                                            <img src="{{ asset($image->image_paths) }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <img src="{{ asset($image->image_paths) }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex align-items-center p-0">
                            <div class="carousel-indicators position-relative d-block">
                                @foreach ($categoryproduct->product->product_images as $key => $image)
                                    @if ($key == 0)
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="{{ $key }}" class="active" aria-current="true"
                                            aria-label="Slide {{ $key }}" style="width: 50px">
                                            <img src="{{ asset($image->image_paths) }}" class="d-block w-100"
                                                alt="...">
                                        </button>
                                    @else
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="{{ $key }}" aria-current="true"
                                            aria-label="Slide {{ $key }}" style="width: 50px">
                                            <img src="{{ asset($image->image_paths) }}" class="d-block w-100"
                                                alt="...">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30 text-dark">
                <div class="h-100">
                    <div class="d-flex items-center align-middle justify-content-between">
                        <div class="d-flex justify-content-start">
                            <h3>{{ $categoryproduct->product->title }}</h3>
                            @if ($categoryproduct->product->stock == 0)
                                <small class="text-red-600 bg-gray-200 font-bold mb-4 ml-4 p-2 rounded">NOT AVAILABLE</small>
                            @endif
                        </div>
                        <div class="bg-primary-subtle rounded">
                            <livewire:addtowishlist.add-to-wishlist-in-details :product_id="$categoryproduct->product->id" />
                        </div>
                    </div>

                    <div class="d-flex pb-2">
                        <div class="text-warning mr-2">

                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i > $categoryproduct->product->rating)
                                    @for ($i = $categoryproduct->product->rating; $i < 5; $i++)
                                        <small class="bi bi-star"></small>
                                    @endfor
                                @else
                                    <small class="bi bi-star-fill"></small>
                                @endif
                            @endfor

                        </div>
                        <small class="pb-1">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                                {{ $categoryproduct->product->rating }}
                            </span>
                                ({{$categoryproduct->product->comments->count()}} Reviews)
                        </small>
                    </div>

                    <div class="d-flex">
                        <h5 class="italic">
                            <i class="bi bi-shop"></i> {{ $categoryproduct->product->seller->shop_name }}
                        </h5>
                    </div>

                    <div class="d-flex">
                        <h6 class="italic">
                            <i class="bi bi-telephone-fill"></i> {{ $categoryproduct->product->seller->shop_phone_number }}
                        </h6>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="nav nav-underline nav-fill bg-secondary-subtle">
                                <a class="nav-item nav-link text-dark active" data-toggle="tab"
                                    href="#tab-pane-1">Description</a>
                                <a class="nav-item nav-link text-dark" data-toggle="tab"
                                    href="#tab-pane-2">Specifications</a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade pt-2 px-2 show active" id="tab-pane-1">
                                <p class="">{{ $categoryproduct->product->description }}</p>
                                <p>Upgrade your computing experience with the High-Performance Computer Part - Model HPX500.
                                    This cutting-edge component is designed to enhance your system's capabilities, offering
                                    superior performance and reliability for all your computing needs.</p>
                            </div>
                            <div class="tab-pane fade pt-2 px-2" id="tab-pane-2">
                                @includeWhen(
                                    $category === 'computer_case',
                                    'pages.product_details.computer_case')
                                @includeWhen($category === 'case_fan', 'pages.product_details.case_fan')
                                @includeWhen($category === 'cpu', 'pages.product_details.cpu')
                                @includeWhen($category === 'cpu_cooler', 'pages.product_details.cpu_cooler')
                                @includeWhen($category === 'ext_storage', 'pages.product_details.ext_storage')
                                @includeWhen($category === 'int_storage', 'pages.product_details.int_storage')
                                @includeWhen($category === 'headphone', 'pages.product_details.headphone')
                                @includeWhen($category === 'keyboard', 'pages.product_details.keyboard')
                                @includeWhen($category === 'memory', 'pages.product_details.memory')
                                @includeWhen($category === 'monitor', 'pages.product_details.monitor')
                                @includeWhen($category === 'motherboard', 'pages.product_details.motherboard')
                                @includeWhen($category === 'mouse', 'pages.product_details.mouse')
                                @includeWhen($category === 'psu', 'pages.product_details.psu')
                                @includeWhen($category === 'speaker', 'pages.product_details.speaker')
                                @includeWhen($category === 'video_card', 'pages.product_details.video_card')
                                @includeWhen($category === 'webcam', 'pages.product_details.webcam')
                            </div>
                        </div>
                    </div>

                    <h1 class="mb-4">₱ {{ $categoryproduct->product->price }}</h1>
                    <livewire:addtocart.add-to-cart-in-details :product_id="$categoryproduct->product->id" />
                </div>
            </div>
        </div>

        <br class="mb-4">

        <div class="row px-xl-5">
            <div class="col-md-12">
                {{-- @dd($categoryproduct->product->comments->count()) --}}
                <h4 class="mb-4">{{$categoryproduct->product->comments->count()}} reviews for "{{ $categoryproduct->product->title }}"</h4>
                <!-- dummy customer reviews -->

                <div class="overflow-auto bg-secondary-subtle p-2 border border-2 rounded" style="max-height: 600px">
                    @foreach ($categoryproduct->product->comments->sortByDesc('id') as $comment)
                        <x-shop.cus_review>
                            <x-slot:img_path>img/user{{fake()->numberBetween(1, 3)}}.png</x-slot:img_path>
                            @if ($comment->user)
                            <x-slot:cus_name>{{$comment->user->first_name}} {{$comment->user->last_name}}</x-slot:cus_name>
                            @else
                            <x-slot:cus_name>{{fake('fil_PH')->firstName()}} {{fake('fil_PH')->lastName()}}</x-slot:cus_name>
                            @endif
                            <x-slot:cus_date>{{date('d M Y', strtotime($comment->created_at))}}</x-slot:cus_date>
                            <x-slot:cus_star>
                                @for ($i = 0; $i < intval($comment->rating); $i++)
                                        <small class="bi bi-star-fill"></small>
                                @endfor
                                <small class="pb-1">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                                        {{ $comment->rating }}
                                    </span>
                                </small>
                            </x-slot:cus_star>
                            <p>{{$comment->text}}</p>
                        </x-shop.cus_review>
                    @endforeach
                </div>
                
            </div>
            {{-- <div class="col-md-4">
                <h4 class="mb-4">Leave a review</h4>
                <small>Your email address will not be published. Required fields are marked *</small>
                <div class="d-flex my-3">
                    <p class="mb-0 mr-2">Your Rating * :</p>
                    <div class="text-primary">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <form>
                    <div class="form-group">
                        <label for="message">Your Review *</label>
                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Your Name *</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email *</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group mb-0">
                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                    </div>
                </form>
            </div> --}}
        </div>

        {{-- <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab"
                           href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (3)</a>
                    </div>
                    <div class="tab-content text-dark">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>Upgrade your computing experience with the High-Performance Computer Part - Model HPX500.
                                This cutting-edge component is designed to enhance your system's capabilities, offering
                                superior performance and reliability for all your computing needs.</p>
                            <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor
                                consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita
                                clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit
                                rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna
                                et.</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>Upgrade your computer's performance and unlock its full potential with the
                                High-Performance Computer Part - Model HPX500. Whether you're a gamer, creative
                                professional, or casual user, this computer part will elevate your computing experience
                                to new heights.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Versatile Compatibility: The Model HPX500 is designed for universal
                                            compatibility, making it a seamless fit with a wide range of computer
                                            systems and configurations.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Reliable Build: Built to last, the Model HPX500 boasts a durable
                                            construction, providing years of reliable performance.
                                        </li>
                                        <li class="list-group-item px-0">
                                            User-Friendly Installation: The Model HPX500 features a user-friendly
                                            installation process, making it easy for both tech enthusiasts and beginners
                                            to upgrade their systems.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Next-Gen Performance: The Model HPX500 is powered by state-of-the-art
                                            technology, delivering next-generation performance for seamless
                                            multitasking, gaming, and content creation.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <h4 class="mb-4">3 reviews for "{{$product->name}}"</h4>
                            <!-- dummy customer reviews -->

                            <x-shop.cus_review>
                                <x-slot:img_path>img/user1.png</x-slot:img_path>
                                <x-slot:cus_name>Leaz Goe Gauys</x-slot:cus_name>
                                <x-slot:cus_date>09 Feb 2021</x-slot:cus_date>
                                <x-slot:cus_star>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </x-slot:cus_star>
                                <p>Fully protected ang item. Super ganda at mabilis lang dumating. And thank you sa nag deliver napakabait..  Diko pa na testing pero the best sa packaging Godbless.</p>
                            </x-shop.cus_review>

                            <x-shop.cus_review>
                                <x-slot:img_path>img/user2.png</x-slot:img_path>
                                <x-slot:cus_name>Eyho Waht</x-slot:cus_name>
                                <x-slot:cus_date>24 May 2019</x-slot:cus_date>
                                <x-slot:cus_star>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </x-slot:cus_star>
                                <p>Ayos naman kompleto ang mga items na inorder ko. So far di ko pa na natest kasi wala pa processor. Dismaya lang  ako kasi bubble wrap lang ginamit at di ito nilagay sa malaking box  knowing almost 20K ang amount ng order ko kasi merong monitor na baka mabasag at matupi ang motherboard.</p>
                            </x-shop.cus_review>

                            <x-shop.cus_review>
                                <x-slot:img_path>img/user3.png</x-slot:img_path>
                                <x-slot:cus_name>Nhoe Caph Foereal</x-slot:cus_name>
                                <x-slot:cus_date>14 Mar 2019</x-slot:cus_date>
                                <x-slot:cus_star>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </x-slot:cus_star>
                                <p>Item was shipped immediately, well packaged, connector for mic is not working, maybe its compatible with the OS installed in computer but the connector foe headphone is functioning well.</p>
                            </x-shop.cus_review>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4 text-dark">1 review for "{{$product->name}}"</h4>

                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- Shop Detail End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="pr-3">You May Also
                Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    {{-- @dd($random_models) --}}
                    @foreach ($random_models as $value)
                        <x-home.product_showcase>
                            {{-- @dd($value) --}}
                            <a class="h6 text-decoration-none" style="font-size: 0.9rem"
                                href="{{ route('product_detail', ['product_id' => $value->product->id, 'category' => $value->product->category]) }}">
                                {{ $value->product->title }}
                            </a>
                            <x-slot:image>{{ $value->product->product_images[0]->image_paths }}</x-slot:image>
                            <x-slot:price>{{ $value->product->price }}</x-slot:price>
                            <x-slot:purchasecount>{{ $value->purchase_count }}</x-slot:purchasecount>
                        </x-home.product_showcase>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
