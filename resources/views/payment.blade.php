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
                <h6><i>Welcome to ZuriCash</i></h6>
                <h6>Complete payment to continue</h6>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7 p-0" style="background-color: #f6f6f6;">
              <div class="">
                <div class="card-header">
                  @if($country == 'ke')
                  <h4>KENYA</h4><br/>
                  @elseif($country == 'ug')
                  <h4>UGANDA</h4><br/>
                  @elseif($country == 'tz')
                  <h4>TANZANIA</h4><br/>
                  @endif
                  <h4>ZURICASH AGENCY PAYMENT</h4>
                </div>
                <div class="card-body">
                  <h5 class="font-15">KUJIUNGA KWA KUNUNUA BIDHAA ZETU ZA VIRUTUBISHO (SUPPLEMENTS) LIPA TZS 48000/=</h5>
                  <h5 class="font-15">KUJIUNGA BILA KUNUNUA BIDHAA LIPA TZS 12000/= </h5>
                  <ul class="list-unstyled mt-4">
                    <li class="media row">
                      <!-- <img class="mr-1 img-fluid col-lg-3 col-md-9 col-sm-9 col-9" src="{{ asset('assets/img/Tanzania-Mpesa-logo.jpeg')}}" alt="Generic placeholder image"> -->
                      <div class="media-body col-lg-9 col-md-12 col-sm-12 col-12">
                        <h5 class="mt-0 mb-1">Jinsi Ya Kulipia(VODACOM)</h5>
                        <ol>
                          <li>BONYEZA *150*00#</li>
                          <li>LIPA KWA M-PESA</li>
                          <li>LIPA KWA SIMU</li>
                          <li>INGIZA LIPA NAMBA</li>
                          <li>WEKA LIPA NAMBA 5436869 JINA (DELASKA MANAGEMENT)</li>
                          <li>WEKA KIASI</li>
                          <li>WEKA NAMBA YA SIRI KUTHIBITISHA</li>
                        </ol>
                      </div>
                    </li>
                    <li class="media row my-4">
                      <!-- <img class="mr-3 img-fluid col-lg-3 col-md-9 col-sm-9 col-9" src="{{ asset('assets/img/airtel-money.png')}}" alt="Generic placeholder image"> -->
                      <div class="media-body col-lg-9 col-md-12 col-sm-12 col-12">
                        <h5 class="mt-0 mb-1">Jinsi Ya Kulipia(AIRTEL MONEY TANZANIA)</h5>
                        <ol>
                          <li>BONYEZA *150*60#</li>
                          <li>LIPA BILL</li>
                          <li>LIPA KWA SIMU (MITANDAO YOTE)</li>
                          <li>LIPA KWA TIGOPESA</li>
                          <li>INGIZA KIASI CHA PESA</li>
                          <li>INGIZA NAMBA YA KUMBUKUMBU 5436869 JINA (DELASKA MANAGEMENT)</li>
                          <li>INGIZA NAMBA YA SIRI KUTHIBITISHA</li>
                        </ol>
                      </div>
                    </li>
                    <li class="media row">
                      <!-- <img class="mr-3 img-fluid col-lg-3 col-md-9 col-sm-9 col-9" src="{{ asset('assets/img/tigo-pesa.png')}}" alt="Generic placeholder image"> -->
                      <div class="media-body col-lg-9 col-md-12 col-sm-12 col-12">
                        <h5 class="mt-0 mb-1">Jinsi Ya Kulipia(TIGO)</h5>
                        <ol>
                          <li>BONYEZA *150*01#</li>
                          <li>LIPA KWA SIMU</li>
                          <li>KWENDA TIGOPESA</li>
                          <li>INGIZA LIPA NAMBA</li>
                          <li>WEKA 5436869 JINA (DELASKA MANAGEMENT)</li>
                          <li>WEKA KIASI</li>
                          <li>WEKA NAMBA YA SIRI KUTHIBITISHA</li>
                        </ol>
                        <p class="mb-0">KISHA TUMA SCREENSHOT YA MALIPO,NAMBARI UMESAJILI smarthela, USERNAME na MAJINA YAKO KAMILI ULIVYOSAJILI LAINI yako KWENYE HII NUMBER KUTUMIA WHATSAPP activation team(+254746375622).</p>
                        <p>Hakikisha umetuma majina yako yote ulivyosajili laini yako unapotuma screenshot ya malipo.</p>
                      </div>
                    </li>
                    <li class="media row">
                      <!-- <img class="mr-3 img-fluid col-lg-3 col-md-9 col-sm-9 col-9" src="{{ asset('assets/img/halopesa.png')}}" alt="Generic placeholder image"> -->
                      <div class="media-body col-lg-9 col-md-12 col-sm-12 col-12">
                        <h5 class="mt-0 mb-1">Jinsi Ya Kulipia(Halotel)</h5>
                        <ol>
                          <li>BONYEZA *150*88#</li>
                          <li>LIPIA BIDHAA</li>
                          <li>TIGO PESA LIPA HAPA</li>
                          <li>WEKA NAMBA 5436869 JINA (DELASKA MANAGEMENT)</li>
                          <li>WEKA KIASI</li>
                          <li>WEKA NAMBA YA SIRI KUTHIBITISHA</li>
                        </ol>
                      </div>
                    </li>
                  </ul>
                  <p class="mt-4 mb-0">KWA DHARURA FANYA MALIPO KWENDA NAMBA 0713814109 JINA ADELA RICHARD MUGUSSI.</p>
                  <p><strong>BAADA YA KUFANYA MALIPO TUMA TAARIFA ZAKO YAANI SCREENSHOT YA MUAMALA ULIOFANYA,USERNAME, NAMBA ULIYOJISAJILIA NA MAJINA KAMILI YA LAINI ULIYOFANYIA MALIPO KWENDA DELASKA MANAGEMENT.
                      KISHA TUMA TAARIFA HIZO KWA NAMBA YETU YA WHATSAPP HUDUMA KWA WATEJA KUFANYIWA ACTIVATION KWA ACCOUNT YAKO.
                      0752312850(WhatsApp).</strong></p>
                  <p>NA KWA MAWASILIANO ZAIDI PIGA 0759514851 AU 0786390106.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection