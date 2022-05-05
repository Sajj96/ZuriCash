@extends('layouts.app')

@section('page-styles')
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>{{ __('Privacy Policy')}}</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="{{ route('home') }}"><span class="fa fa-home"></span></a></li>
                <li>{{ __('Privacy Policy')}}</li>
            </ul>
        </div>
    </div>
</section>

<section class="history-section">
    <div class="auto-container">
        <div class="description">
            <div class="row cause-details">
                <div class="sec-title">
                    <h1><strong>INTRODUCTION</strong></h1>
                    <div class="text">Nachangia platform is dedicated to protecting your privacy and safeguarding your personally identifiable information. This Privacy Policy describes how we collect, use and share information about you that we obtain through your use of Nachangia platform in both Web based and mobile Application.</div>
                    <div class="text">By using our Services, you are accepting and consenting to the practices described in this Privacy Policy (including as changed from time to time). If, for any reason, you do not agree to the terms of this Privacy Policy, please stop using our Products & Services immediately.</div>
                </div>
            </div>
            <div class="row cause-details">
                <h3><strong>INFORMATION WE COLLECT</strong></h3>
                <div class="col-lg-12">
                    <ol>
                        <li>
                            <h5><strong>Summary of Information We Collect, Where It Comes From, Why We Collect It, and Who We Share It With</strong></h5>
                            <div class="text">
                                We collect certain information to help us operate and provide our Services. If you do not wish to provide us with the following information, please delete your account or send us an email to info@nachangia.co.tz and do not use our Products & Services in any way. Below is a summary of the categories of personal information we collect, where we get it from, why we collect it, and with whom we may share it.
                            </div>
                        </li>
                        <li>
                            <h5 style="margin-top:20px"><strong>Information provided by the user</strong></h5>
                            <ul class="list">
                                <li><span class="flaticon-next"></span>Name</li>
                                <li><span class="flaticon-next"></span>Email address</li>
                                <li><span class="flaticon-next"></span>Copy of ID such as National Identification Card, National Passport, Driving License, Voters ID and any other ID recognized by United Republic of Tanzania</li>
                                <li><span class="flaticon-next"></span>National Identification Card number</li>
                                <li><span class="flaticon-next"></span>Photo</li>
                                <li><span class="flaticon-next"></span>Address</li>
                                <li><span class="flaticon-next"></span>Telephone number</li>
                                <li><span class="flaticon-next"></span>Information about all the actions users perform in the context of the Service, as well as the number of such actions, scores, etc</li>
                                <li><span class="flaticon-next"></span>Any other information inputted by the user in a form created by Nachangia</li>
                            </ul>
                        </li>
                        <li>
                            <h5><strong>Information collected from the user from the use of the Service by the user.</strong></h5>
                            <div class="text">Nachangia platform may collect information related to the user's access status to the Service and how the user uses this service. This includes the following.</div>
                            <ul class="list">
                                <li>
                                    <span class="flaticon-next"></span>Device information
                                    <div class="text">The platform may also collect individual identification of the device, etc. This information will be used in order to provide a better service, and to prevent malicious activities that hinder the proper delivery of the Service. Furthermore, this information does not include information that identifies specific users.</div>
                                </li>
                                <li>
                                    <span class="flaticon-next"></span>Log information
                                    <div class="text">Nachangia platform will collect information such as the user's IP address, type of mobile phone, the language of the mobile terminal, etc., automatically when the user visits the Service. This information will be used in order to allow analysis of the user environment, provide a better service and, further, to prevent malicious activities that hinder the proper delivery of the Service. Search records are saved and managed in such a form that individual users cannot be identified, and are used for the purposes of information reporting, etc.</div>
                                </li>
                                <li>
                                    <span class="flaticon-next"></span>Cookies and anonymous IDs
                                    <div class="text">Cookies are used to improve the quality of the Service as they allow better understanding of the number of visits to the Service, the type of those visits, and also the scope of users who use the Service; they also improve convenience to the user by allowing the preservation of settings, etc., and security through the maintenance and preservation of a session. While the user may turn cookies on or off, if cookies are refused there may be instances where services that require login, or parts of the Service, cannot be used.</div>
                                </li>
                                <li>
                                    <span class="flaticon-next"></span>Location information
                                    <div class="text">A part of the Service uses location information sent from mobile phones, etc. If the user uses such a service, such information will be used within the scope necessary for the service. Further, if the provision of location information is turned off on the user's device, then location information will not be sent.</div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h5><strong>Purpose of the Use of Information Collected</strong></h5>
                            <ul class="list">
                                <li>
                                    <span class="flaticon-next"></span>In order to provide the Service.
                                </li>
                                <li>
                                    <span class="flaticon-next"></span>In order to simplify the required information to be entered when a user registers for the Service.
                                </li>
                                <li>
                                    <span class="flaticon-next"></span>In order to send emails and text messages confirming the email address provided and phone number upon registration for the Service.
                                </li>
                                <li>
                                    <span class="flaticon-next"></span>In order to improve satisfaction in the contents of the Service and for the development of new services.
                                </li>
                                <li>
                                    <span class="flaticon-next"></span>In order to customize the contents of the Service to the user.
                                </li>
                                <li>
                                    <span class="flaticon-next"></span>In order to be able to publish the results of investigations with respect to information that has been processed statistically.
                                </li>
                                <li>
                                    <span class="flaticon-next"></span>In order to respond to questions, etc., regarding the service and to provide guidance as to the Service.
                                </li>
                                <li>
                                    <span class="flaticon-next"></span>In order to solve problems encountered in the running of the Service.
                                </li>
                                <li>
                                    <span class="flaticon-next"></span>In order to deal with activities that violate the Policy or the rules of the Company with respect to the Service.
                                </li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row cause-details">
                <h3><strong>SECURITY</strong></h3>
                <div class="text">We take precautions, but cannot provide guarantees. We do our best to secure your data through the programming of our services and the use of security measures that we deem appropriate for the type of data provided. However, we cannot completely guarantee that no part of our system or site will ever fail or be compromised. If you ever suspect that our site or services has contributed to your personal information being compromised, please contact us at <a href="mailto:info@nachangia.co.tz">info@nachangia.co.tz</a> immediately so that we can investigate and try to resolve the matter.</div>
            </div>
            <div class="row cause-details" style="padding-top:20px">
                <h3><strong>CHILDREN PRIVACY</strong></h3>
                <div class="text">Our Website and mobile application is not directed to individuals under the age of 18, and we request that individuals under 18 not provide personal data to the Platform. We do not knowingly collect personal information from persons under the age of eighteen (18) without verifiable parental consent. If we learn that a child under the age of eighteen (18) has submitted personally identifiable information online without parental consent, we will take all reasonable measures to delete such information from our databases and to not use such information for any purpose (except where necessary to protect the safety of the child or others as required or allowed by law). If you become aware of any personally identifiable information we have collected from children under eighteen (18), please contact us at <a href="mailto:info@nachangia.co.tz">info@nachangia.co.tz</a> . If you are a member or contact of one of our customers, you should review their privacy policy to determine their privacy practices with respect to children’s data.</div>
            </div>
            <div class="row cause-details" style="padding-top:20px">
                <h3><strong>EXTERNAL LINKS</strong></h3>
                <ul class="list">
                    <li>
                        <span class="flaticon-next"></span>Nachangia platform will not be responsible for the protection of any information collected by any website operated by another company or individual that is hyperlinked to on the Service.
                    </li>
                    <li>
                        <span class="flaticon-next"></span>The user is requested to browse and use the Service only after confirming the details of the Service carefully.
                    </li>
                    <li>
                        <span class="flaticon-next"></span>The platform will not be responsible for any damage caused to the user or a third party by illegitimate activities such as by a hacker.
                    </li>
                    <li>
                        <span class="flaticon-next"></span>The user is asked to strictly manage and protect their personal identification information so that they are not misplaced, lost, or become known to a third party.
                    </li>
                </ul>
            </div>
            <div class="row cause-details">
                <h3><strong>POLICY AMENDEMENT</strong></h3>
                <div class="text">The Platform will occasionally update this Privacy Policy to reflect company and customer feedback. The Company encourages you to periodically review this Statement to be informed of how the platform is protecting your information.</div>
            </div>
            <div class="row cause-details" style="padding-top:20px">
                <h3><strong>CONTACT US</strong></h3>
                <div class="text">If any of the items above are unclear or you have further questions, or if you would like to request a copy of this Privacy Policy in a different format, please contact us at <a href="mailto:info@nachangia.co.tz">info@nachangia.co.tz</a>.</div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
@section('page-scripts')
@endsection
@endsection