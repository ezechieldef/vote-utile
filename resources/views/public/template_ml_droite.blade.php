@extends('public.template_katen')


@section('main-content')
    <section class="main-content">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    @yield('content')


                </div>
                <div class="col-lg-4">

                    <!-- sidebar -->
                    <div class="sidebar">

                        <!-- widget categories -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Catégories</h3>
                                <img src="{{ asset('katen/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <ul class="list">
                                    @foreach (\App\Models\Categorie::all() as $categ)
                                        <li><a
                                                href="/categorie/{{ $categ->titre }}">{{ $categ->titre }}</a><span>({{ $categ->articles()->count() }})</span>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                        </div>




                        <!-- widget tags -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Tags / Mots clés</h3>
                                <img src="{{ asset('katen/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                @foreach (\App\Models\Article::tagList() as $tag)
                                    <a href="#" class="tag">{{ $tag }}</a>
                                @endforeach

                            </div>
                        </div>



                        <!-- widget popular posts -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Article Populaires</h3>
                                <img src="{{ asset('katen/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <!-- post -->
                                @php
                                    $i = 0;
                                @endphp
                                @foreach (\App\Models\Article::populaire4() as $art)
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <span class="number">{{ ++$i }}</span>
                                            <a href="/articles/{{ $art->code }}">
                                                <div class="inner">
                                                    <img src="{{ asset(Storage::url($art->url_image)) }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a
                                                    href="/articles/{{ $art->code }}">{{ $art->titre }}</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ date('d M Y', strtotime($art->date)) }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- widget about -->
                        <div class="widget rounded">
                            <div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png">
                                <img src="{{ asset('katen/images/logo.png') }}" alt="logo" class="mb-4" />

                                <p class="mb-4">
                                    Vous cherchez du nouveau ? vous êtes au bon endroit. A votre service,
                                    Notre mission est de tout faire pour mettre la lumière sur les sujets politiques
                                    principalement à l’endroit des
                                    élections.
                                    Ceci vous permettra de d’exercer votre de droit de citoyenneté avec les idées claires.
                                <ul class="social-icons list-unstyled list-inline mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>


                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
