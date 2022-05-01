@extends('layouts.app')

@section('content')




        
<!--Intro-->
<section id="home" class="intro-section">
    <div class="container">
      <div class="row align-items-center text-white">
        <!-- START THE CONTENT FOR THE INTRO  -->
        <div class="col-md-4 col-md-4 col-xs-12 col-sm-12 intros text-start">
          <h1 class="display-2">
            <span class="display-2--intro">Richiedi adesso <br>il tuo preventivo</span>
            <span class="display-2--description lh-base">
              Rispondi a delle semplici domande e realizzeremo il preventivo perfetto per te!
            </span>
          </h1>
          <a href="/sections" style="text-decoration:none;"><button type="button" class="rounded-pill btn-rounded">Rispondi adesso
            <span><i class="fas fa-arrow-right"></i></span>
          </button>
          </a>
        </div>

        <div class="col-md-8 col-lg-8  col-xs-12 col-sm-12intros text-start">
            <img class="img-fluid" src="{{ URL::asset('homeAssets/assets/img/homebanner.svg') }}"></img>
  
        </div>
      </div>
    </div>

    
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#ffffff" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,208C384,192,480,128,576,133.3C672,139,768,213,864,202.7C960,192,1056,96,1152,74.7C1248,53,1344,107,1392,133.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
  </section>


  <div class="container" style="margin-top: -18vw;margin-bottom: 5vw;">
    <div class="row">
      
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div class="row" style="margin-top:20px;">
                <div class="col-lg-12 col-xs-12 col-sm-12 premium">
                    <div class="card top-line bottom-line" style="width: 100%;">          
                        <div class="card-body">
                          <div class="container">
                            <div class="row" style="margin-top: 3vw;">
                              <div class="col-lg-12" style="text-align:center;">
                                <h1>I Nostri Partner </h1>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 3vw;margin-bottom:3vw;">
                              <div class="col-lg-2"><img src="{{ URL::asset('homeAssets/assets/img/homebanner.svg') }}" alt="" class="img-fluid"></div>
                              <div class="col-lg-2"><img src="{{ URL::asset('homeAssets/assets/img/homebanner.svg') }}" alt="" class="img-fluid"></div>
                              <div class="col-lg-2"><img src="{{ URL::asset('homeAssets/assets/img/homebanner.svg') }}" alt="" class="img-fluid"></div>
                              <div class="col-lg-2"><img src="{{ URL::asset('homeAssets/assets/img/homebanner.svg') }}" alt="" class="img-fluid"></div>
                              <div class="col-lg-2"><img src="{{ URL::asset('homeAssets/assets/img/homebanner.svg') }}" alt="" class="img-fluid"></div>
                              <div class="col-lg-2"><img src="{{ URL::asset('homeAssets/assets/img/homebanner.svg') }}" alt="" class="img-fluid"></div>
  
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div> 
</div>

<!--Features-->
<section class="clean-block features">
    <div class="container">
        <div class="block-heading">
            <h2>Features</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                <h4>Bootstrap 5</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
            </div>
            <div class="col-md-5 feature-box"><i class="icon-pencil icon"></i>
                <h4>Customizable</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
            </div>
            <div class="col-md-5 feature-box"><i class="icon-screen-smartphone icon"></i>
                <h4>Responsive</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
            </div>
            <div class="col-md-5 feature-box"><i class="icon-refresh icon"></i>
                <h4>All Browser Compatibility</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
            </div>
        </div>
    </div>

    <section id="diagonal" class="container" style="max-width:100%;">
        <div id="diagonal-text">
            <div class="container py-4 py-xl-5">
                <div class="text-center text-primary bg-white border rounded border-0 p-3">
                    <br><h2 style="color: #212529 !important;">I Nostri Numeri </h2><br>
                    <div class="row row-cols-2 row-cols-md-4">
                        <div class="col">
                            <div class="p-3">
                                <h4 class="display-5 fw-bold text-primary mb-0">123+</h4>
                                <p class="mb-0" style="color: black!important;">Clienti soddisfatti</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <h4 class="display-5 fw-bold text-primary mb-0">45+</h4>
                                <p class="mb-0" style="color: black!important;">Preventivi richiesti</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <h4 class="display-5 fw-bold text-primary mb-0">67+</h4>
                                <p class="mb-0" style="color: black!important;">Dipendenti attivi</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <h4 class="display-5 fw-bold text-primary mb-0">89</h4>
                                <p class="mb-0" style="color: black!important;">Offerte disponibili</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <section class="position-relative py-4 py-xl-5">
                <div class="position-relative px-2 px-xl-5 py-5">
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-md-12 col-xl-12 col-xxl-12">
                                <div>
                                    <form class="border rounded shadow p-3 p-md-4 p-lg-5" method="post" style="background: var(--bs-body-bg);">
                                        <h3 class="text-center mb-3">Contact us</h3>
                                        <div class="mb-3"><input class="form-control" type="text" name="name" placeholder="Nome"></div>
                                        <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                                        <div class="mb-3"><textarea class="form-control" name="message" placeholder="Messaggio" rows="6"></textarea></div>
                                        <div class="mb-3">
                                            <button type="button" class="rounded-pill btn-rounded" type="submit">Invia
                                                <span><i class="fas fa-arrow-right"></i></span>
                                               </button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>



@endsection
