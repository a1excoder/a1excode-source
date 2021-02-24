@extends('layouts.example')

@section('title') {{ $categoryName }} @endsection

@section('body-container')

    <br>

    <div class="img-thumbnail font-italic">
        <p class="h2">
            {{ $categoryName }}
        </p>
    </div>

    <div class="row">


        @foreach($query as $post)


            <div class="col-md-6">
                <div class="container my-5 py-5 z-depth-1">
                    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="view overlay z-depth-1-half">
                                    <img src="{{ asset('storage').'/'.$post->general_image }}" class="img-fluid" alt="">
                                    <a href="#">
                                        <div class="mask rgba-white-light"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h3 class="font-weight-bold">{{ $post->title }}</h3>
                                <p class="text-muted">{!! mb_substr(strip_tags($post->post_query), 0, 170) !!}</p>
                                <a class="btn btn-success" href="{{ route('post-page', $post->id) }}" role="button">Читать</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        @endforeach

    </div>

            <div class="container">
                {{ $query->appends(['id' => Illuminate\Support\Facades\Request::input('id')])->links() }}<hr>
            </div>


@endsection
