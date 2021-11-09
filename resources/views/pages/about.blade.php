@extends('layouts.app')

@section('main')
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="mt-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="https://avatars.githubusercontent.com/u/31835484?s=400&u=eac855ef7e3f300fe11317369b112b1baa5a3e77&v=4"
                                            class="img-fluid rounded mx-auto d-block" alt="avatar">
                                    </div>
                                    <div class="col-md-6">
                                        <h1>Hi, Sembara Here</h1>
                                        <p>I am a software engineer based in Surabaya, Indonesia. With the greatest passion
                                            for web technologies like Laravel, Node, and React
                                            frameworks. Currently studied on bachelor’s degree in Technology Information on
                                            Information System at Dinamika University formerly
                                            STIKOM Surabaya. I am a hard worker and have a high curiosity about science,
                                            especially about programming. I have a big dream to
                                            become the best software engineer in the universe.</p>
                                        <p>Get in touch via email at <a href="mailto:sembara9090@gmail.com">sembara9090@gmail.com</a></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <ul>
                                <li>Email : sembara9090@gmail.com</li>
                                <li>github : @ssembara</li>
                                <li>instagram : @ssembara</li>
                                <li>twitter: @ssembara99</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection