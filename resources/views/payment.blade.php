@extends('layouts.app')

@section('content')
<section class="section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
        <div class="card card-warning">
          <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-5 p-0">
              <div class="card-body text-center">
                <img alt="image" src="{{ asset('assets/img/logo4.jpeg')}}" width="300" class="header-logo mx-auto" />
                <h5><i>Welcome to ZuriCash</i></h5>
                <h6>Complete payment to continue</h6>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7 p-0" style="background-color: #f6f6f6;">
              @if($country == 'ke')
              <div class="">
                <div class="card-header">
                  <h4>KENYA</h4><br />
                  <h4>ZURICASH AGENCY PAYMENT</h4>
                </div>
                <div class="card-body">
                  <h5 class="font-15">CONGRATULATIONS YOU HAVE SUCCESSFULLY REGISTERED YOUR ZURICASH ACCOUNT. MAKE  PAYMENTS OF 600/=KES TO ACTIVATE YOUR ACCOUNT.</h5>
                  <ul class="list-unstyled mt-4">
                    <li class="media row">
                      <!-- <img class="mr-1 img-fluid col-lg-3 col-md-9 col-sm-9 col-9" src="{{ asset('assets/img/Tanzania-Mpesa-logo.jpeg')}}" alt="Generic placeholder image"> -->
                      <div class="media-body col-lg-9 col-md-12 col-sm-12 col-12">
                        <h5 class="mt-0 mb-1">(ZURICASH) How to PAY IN KENYA</h5>
                        <ol>
                          <li>Dowload the MPESA  application</li>
                          <li>INSTALL YOUR SAFARICOM NUMBER TO WORK ON THE APPLICATION</li>
                          <li>Click <strong>send money</strong> </li>
                          <li>Click <strong>global</strong></li>
                          <li>Send money to Tanzania</li>
                          <li>Enter number (KAZIMOTO MATHIAS THOMAS ) 255759514851</li>
                        </ol>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              @elseif($country == 'ug')
              <div class="">
                <div class="card-header">
                  <h4>UGANDA</h4><br />
                  <h4>ZURICASH AGENCY PAYMENT</h4>
                </div>
                <div class="card-body">
                  <h5 class="font-15">CONGRATULATIONS YOU HAVE SUCCESSFULLY REGISTERED YOUR ZURICASH ACCOUNT. PAY 19000/=UGX TO ACTIVATE IT.</h5>
                  <ul class="list-unstyled mt-4">
                    <li class="media row">
                      <!-- <img class="mr-1 img-fluid col-lg-3 col-md-9 col-sm-9 col-9" src="{{ asset('assets/img/Tanzania-Mpesa-logo.jpeg')}}" alt="Generic placeholder image"> -->
                      <div class="media-body col-lg-9 col-md-12 col-sm-12 col-12">
                        <h5 class="mt-0 mb-1">MOBILE MONEY PAYMENT PROCEDURE FOR MTN USERS</h5>
                        <ol>
                          <li>Dial *165#</li>
                          <li>Select option 1 send money</li>
                          <li>Select 2 East Africa</li>
                          <li>Select MPESA TANZANIA</li>
                          <li>Enter Mpesa number 255759514851 KAZIMOTO MATHIAS THOMAS</li>
                          <li>Enter Amount in UGX (19000)</li>
                          <li>Select 1(Yes to Confirm)</li>
                        </ol>
                      </div>
                    </li>
                    <li class="media row my-4">
                      <!-- <img class="mr-3 img-fluid col-lg-3 col-md-9 col-sm-9 col-9" src="{{ asset('assets/img/airtel-money.png')}}" alt="Generic placeholder image"> -->
                      <div class="media-body col-lg-9 col-md-12 col-sm-12 col-12">
                        <h5 class="mt-0 mb-1">MOBILE MONEY PAYMENT PROCEDURE FOR AIRTEL</h5>
                        <ol>
                          <li>Dial *185#</li>
                          <li>Select option 1 send money</li>
                          <li>Select 4 International transfer</li>
                          <li>Select Tanzania</li>
                          <li>Select MPESA Tanzania</li>
                          <li>Enter Mpesa number 255759514851 KAZIMOTO MATHIAS THOMAS</li>
                          <li>Enter Amount in UGX (19000)</li>
                          <li>Enter PIN to confirm</li>
                        </ol>
                      </div>
                    </li>
                  </ul>
                  <p><strong>AFTER PAYMENT SEND YOUR TRANSACTION SCREENSHOOT, MOBILE NUMBER REGISTERED NAMES AND USERNAME OR EMAIL TO 255628334168</strong></p>
                </div>
              </div>
              @elseif($country == 'tz')
              <div class="">
                <div class="card-header">
                  <h4>TANZANIA</h4><br />
                  <h4>ZURICASH AGENCY PAYMENT</h4>
                </div>
                <div class="card-body">
                  <h5 class="font-15">HONGERA SANA KWA KUFANIKIWA KUFANYA USAJILI WA ACCOUNT YAKO SASA FANYA MALIPO ILI KUWEZESHA ACCOUNT YAKO IPATE HUDUMA ZINAZOTOLEWA NA ZURICASH. </h5>
                  <h5 class="font-15">KULIPIA ACTIVATION PEKEE 12000/=TZS </h5>
                  <ul class="list-unstyled mt-4">
                    <li class="media row">
                      <!-- <img class="mr-1 img-fluid col-lg-3 col-md-9 col-sm-9 col-9" src="{{ asset('assets/img/Tanzania-Mpesa-logo.jpeg')}}" alt="Generic placeholder image"> -->
                      <div class="media-body col-lg-12 col-md-12 col-sm-12 col-12">
                        <h5 class="mt-0 mb-1">KWA MITANDAO YA HALOTEL,VODACOM,AIRTEL NA TIGO.</h5>
                        <ol>
                          <li>👉Piga *150*50*1#</li>
                          <li>👉Ingiza pay namba, weka (60781812)</li>
                          <li>👉Ingiza kiasi cha kulipia (12000/=TZS)</li>
                          <li>👉Jina linakuja DELASKA ENTERPRISES hakiki kwa kuingiza namba 1</li>
                          <li>👉Gusa Ok kusubiri sehemu ya kuweka namba yako ya siri</strong></li>
                          <li>👉Tuma</li>
                        </ol>
                      </div>
                    </li>
                  </ul>
                  <p class="mt-4 mb-0">KWA DHARURA FANYA MALIPO KWENDA NAMBA <a href="tel:+255713814109">0713814109</a> JINA ADELA RICHARD MUGUSSI.</p>
                  <p><strong>BAADA YA KUFANYA MALIPO TUMA TAARIFA ZAKO YAANI SCREENSHOT YA MUAMALA WAKO, USERNAME, NAMBA ULIYOJISAJILIA NA MAJINA YA LAINI ULIYOFANYIA MALIPO KWENDA DELASKA ENTERPRISES. KISHA TUMA  TAARIFA HIZO KWA NAMBA YETU YA WHATSAPP HUDUMA KWA WATEJA KUFANYIWA ACTIVATION KWA ACCOUNT YAKO.. <a href="tel:+255742602267">0742602267</a>(WhatsApp)</strong></p>
                  <p>NA KWA MAWASILIANO ZAIDI PIGA  <a href="tel:+255786390106">0786390106</a>.</p>
                </div>
              </div>
              @elseif($country == 'rw')
              <div class="">
                <div class="card-header">
                  <h4>RWANDA</h4><br />
                  <h4>ZURICASH AGENCY PAYMENT</h4>
                </div>
                <di v class="card-body">
                  <h5 class="font-15">CONGRATULATIONS YOU HAVE SUCCESSFULLY REGISTERED YOUR ZURICASH ACCOUNT. PAY 5700 RWF FOR ACTIVATION.</h5>
                  <ul class="list-unstyled mt-4">
                    <li class="media row">
                      <div class="media-body col-lg-9 col-md-12 col-sm-12 col-12">
                        <h5 class="mt-0 mb-1">MOBILE MONEY PAYMENT PROCEDURE FOR RWANDA MTN USERS</h5>
                          <p>Dial *182# then Follow the Procedures Number to send to is <strong>255759514851</strong> KAZIMOTO MATHIAS THOMAS Amount 5700 RWF.</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              @else
              <div class="">
                <div class="card-header">
                  <h4>ZURICASH INTERNATIONAL PAYMENTS💸(CRYPTOS) </h4>
                </div>
                <div class="card-body">
                  <h5 class="font-15">CONGRATULATIONS YOU HAVE SUCCESSFULLY REGISTERED YOUR ZURICASH ACCOUNT.</h5>
                  <ul class="list-unstyled mt-4">
                    <li class="media row">
                      <!-- <img class="mr-1 img-fluid col-lg-3 col-md-9 col-sm-9 col-9" src="{{ asset('assets/img/Tanzania-Mpesa-logo.jpeg')}}" alt="Generic placeholder image"> -->
                      <div class="media-body col-lg-9 col-md-12 col-sm-12 col-12">
                        <h5 class="mt-0 mb-1">HOW TO MAKE PAYMENT</h5>
                        <ol>
                          <li>Go to your wallet or any crypto exchange. </li>
                          <li>Then simply look for COIN by the name (BUSD) which have a (BEP20) Network.</li>
                          <li>Then send 6$ of BUSD coin.</li>
                        </ol>
                      </div>
                    </li>
                  </ul>
                  <p>If you don't have the coin simply register yourself with BINANCE EXCHANGE where you will be able to buy them safely using P2P payments with your local Mobile money zen send the COINS To this Address 👇</p>
                  <p><strong>0xB8E0c7B0CB6FeA84DFaf3Cc3786201EE43299383</strong></p>
                  <p>After all procedures send payments screenshots ZURICASH MANAGEMENT WhatsApp number. <a href="tel:+255628334168">+255628334168</a></p>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection