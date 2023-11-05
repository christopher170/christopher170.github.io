<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PT Presisi Utama Mandiri </title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('depan') }}/css/styles.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Spartan&display=swap' rel="stylesheet">
        <style type ="text/css">
            i {color:greenyellow;font-size: 40px}
        </style>
          
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">{{ $about->judul }}</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ asset('foto') . '/' . get_meta_value('_foto') }}" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#product">Product</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#machine">Machine</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#location">Location</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contacts">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('form')}}">payment</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        {!! set_about_nama($about->judul) !!}
                    </h1>
                    <div class="subheading mb-5">
                        {{ get_meta_value('_kota') }} · {{ get_meta_value('_provinsi') }} · {{ get_meta_value('_nohp') }} ·
                    <a href="{{ get_meta_value('_email') }}">{{ get_meta_value('_email') }}</a>
                    <div class="lead mb-5">{!! $about->isi !!}</div>
                    <div class="social-icons">
                        <a class="social-icon" href="https://linkedin.com"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="https://github.com"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- product-->
            <section class="resume-section" id="product">
                <div class="resume-section-content">
                    <h2 class="mb-5">Product</h2>
                    @foreach ($product as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="cardinfo">
                            <h3 class="mb-0">{{ $item->judul }}</h3>
                            <div class="subheading mb-3">{{ $item->info1 }}</div>
                            {!! $item->isi !!}
                        </div>
                        <div class="cardinfo">
                            {{-- <div class="flex-shrink-0"><span class="text-primary">{{ $item->tgl_mulai_indo }} -
                                {{ $item->tgl_akhir_indo }}</span></div> --}}
                            <div class="mb-0"> 
                                <a href="{{asset('storage/' .  $item->foto)}}">
                                <div class="image"> <img height ="150" width="150" src="{{asset('storage/' .  $item->foto)}}" alt="..." /></div>
                                </a>
                             </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <hr class="m-0" />
            <!-- machine-->
            <section class="resume-section" id="machine">
                <div class="resume-section-content">
                    <h2 class="mb-5">Machine</h2>
                    @foreach ($machine as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb">
                        <div class="cardinfo">
                            <h3 class="mb-0">{{ $item->judul }}</h3>
                            <div class="subheading mb-3">{{ $item->info1 }}</div>
                            <div>{{ $item->info2 }}</div>
                            <p>{{ $item->info3 }}</p>
                        </div>
                        <div class="cardinfo">
                            {{-- <div class="flex-shrink-0"><span class="text-primary">{{ $item->tgl_mulai_indo }} -
                                {{ $item->tgl_akhir_indo }}</span></div> --}}
                            <div class="mb-0"> 
                                {{-- <span class="d-none d-lg-block"> --}}
                                    <a href="{{asset('storage/' .  $item->foto)}}">
                                    <div class="image"> <img height ="150" width="150" src="{{asset('storage/' .  $item->foto)}}" alt="..." /></div>
                                    
                                    {{-- <div class="overlay"id="{{ $item->info1 }}<">
                                        <img src="{{asset('storage/' .  $item->foto)}}" alt="...">
                                    </div> --}}
                                </a>
                             </div>
                             {{-- <div class="popup-image">
                                <span>&times;</span>
                                <img src="{{asset('storage/' .  $item->foto)}}" alt="...">
                             </div> --}}
                        </div>      
                    </div>
                @endforeach
                </div>
            </section>
            <hr class="m-0" />
            <!-- Skills-->
            <section class="resume-section" id="location">
                <div class="resume-section-content">
                    {{-- <h2 class="mb-5">Skills</h2>
                    <div class="subheading mb-3">Programming Languages & Tools</div> --}}
                    <h3>Location </h3>
                    <div class="embed-responsive embed responsive-16by9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.049733109187
                        !2d107.17317611471678!3d-6.257179195470894!2m3!1f0!2f0!3f0
                        !3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699aee85555555%3A0x50f9501278c4565e!2sPT.%20
                        Presisi%20Utama%20Mandiri!5e0!3m2!1sid!2sid!4v1670836974114!5m2!1sid!2sid" 
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    {{-- <h2>Request Order</h2>
                    <div>

                    </div> --}}

                    {{-- <ul class="list-inline dev-icons">
                        @foreach (explode(', ', get_meta_value('_language')) as $item)
                        <li class="list-inline-item"><i class="devicon-{{ strtolower($item) }}-plain"></i></li>
                        @endforeach
                    </ul>
                    <div class="subheading mb-3">Workflow</div>
                    <ul class="fa-ul mb-0">
                        {!! set_list_workflow(get_meta_value('_workflow')) !!}
                    </ul>
                </div> --}}
            </section>
            <hr class="m-0" />
            <!-- Interests-->
            <section class="resume-section" id="contacts">
                <section class="text-gray-600 body-font">
                    <form action="https://formspree.io/f/mzbqbknz" method="POST">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="flex flex-col text-center w-full mb-12">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact form</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Thank you for visiting our website. let me know if you have something to say</p>
                      </div>
                      <div class="lg:w-3/3 w-full sm:flex-row flex-col mx-auto px-8">
                        <div class="relative flex-grow w-full">
                          <label for="full-name" class="leading-7 text-sm text-gray-600">Full Name</label>
                          <input type="text" id="full-name" name="full-name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative flex-grow w-full">
                          <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                          <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative flex-grow w-full">
                            <label for="subject" class="leading-7 text-sm text-gray-600">Subject</label>
                            <input type="text" id="subject" name="subject" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                          <div class="relative flex-grow w-full">
                            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                            <textarea type="text" id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                          </div>
                        <button class="text-black bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">Submit</button>
                      </div>
                    </form>
                    </div>
                  </section>
                  <div class="whatsapp_float">
                    {{-- <a class="fa-brands fa-whatsapp" href="https://api.whatsapp.com/send?phone=6282185359039"><i class="fab fa-Whatsapp-in"></i></a> --}}
                    {{-- <a class="social-icon" href="https://api.whatsapp.com/send?phone=6281808013382"><i class="fab fa-Whatsapp-in"></i></a> --}}
                    <a href="https://api.whatsapp.com/send?phone=6281808013382" ><i class="fa-10x fa-brands fa-whatsapp"   ></i></a>
                </div>
                {{-- <div class="resume-section-content">
                    <h2 class="mb-5">{{ $interest->judul }}</h2>
                    {!! set_list_award($interest->isi) !!}

                </div> --}}
            </section>
            <hr class="m-0" />
            <!-- Awards-->
            {{-- <section class="resume-section" id="payment">
                <div class = "qris">
                    <h3>Payment </h3>
                    <h2>bca : 5271766638 </h2>
                    <img class="img-fluid mx-auto mb-2" 
                    src="{{ URL::to('/fotomesin/392214.jpg') }}"
                   
                    width="300" height="300">
                </div> --}}
                {{-- <div class="resume-section-content">
                    <h2 class="mb-5">{{ $award->judul }}</h2>
                    {!! set_list_award($award->isi) !!}
                </div>        --}}
            </section>
            <hr class="m-0" />
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('depan') }}/js/scripts.js"></script>
        <script src="https://kit.fontawesome.com/5deda57cb7.js" crossorigin="anonymous"></script>

        <script>
            document.querySelectorAll('.resume-section-content img') .foreach(image => {
                image.onclick = () =>{
                    document.querySelector('.popup-image').style.display = 'block';
                    document.querySelector('.popup-image img ').src = image.getAttribute('src');
                }
            }); 
            document.querySelector('.popup-image span').onclick=()=>{
                document.querySelector('.popup-image').style.display = 'none';
            };

        </script>
    </body>
</html>
