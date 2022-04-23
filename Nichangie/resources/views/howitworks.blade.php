@extends('layouts.app')

@section('page-styles')
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>How Nachangia Works</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="{{ route('home') }}"><span class="fa fa-home"></span></a></li>
                <li>How Nachangia Works</li>
            </ul>
        </div>
    </div>
</section>

<section class="history-section">
    <div class="auto-container">
        <div class="description">
            <div class="row">
                <h1>Nachangia</h1>
                <div class="col-lg-12 text">
                    <h4>Nachangia is a Tanzania donation-type crowdfunding service. Anyone in Tanzania can quickly and easily create campaign to raise funds within Tanzania and around the world for their beloved ones, for themselves, for the community and for charity.</h4>
                </div>
                <div class="col-lg-12 cause-details">
                    <ol>
                        <li>
                            Start your Campaign
                            <ul class="list">
                                <li><span class="flaticon-next"></span>Register for free through Nachangia website or mobile application.</li>
                                <li><span class="flaticon-next"></span>Write details about the campaign you want to raise.</li>
                                <li><span class="flaticon-next"></span>Add pictures.</li>
                            </ul>
                        </li>
                        <li>
                            <h5>Spread the words</h5>
                            <ul class="list">
                                <li><span class="flaticon-next"></span>Share your campaign to friends, family and other people within and outside the country to increase donations.</li>
                                <li><span class="flaticon-next"></span>Use social media platform such as Facebook, Twitter, Instagram and LinkedIn to spread words about your campaign.</li>
                                <li><span class="flaticon-next"></span>Use your campaign website link to share your campaign through email, whatsapp, text message and other platforms available.</li>
                            </ul>
                        </li>
                        <li>
                            <h5>Update & Monitor your Campaign</h5>
                            <ul class="list">
                                <li><span class="flaticon-next"></span>Check the progress of your campaign through My Campaign Dashboard.</li>
                                <li><span class="flaticon-next"></span>Send appreciation note to all donors of your campaign.</li>
                                <li><span class="flaticon-next"></span>Update your campaign in case there is any change and progress, include pictures if available.</li>
                            </ul>
                        </li>
                        <li>
                            <h5>Collect Fund</h5>
                            <ul class="list">
                                <li><span class="flaticon-next"></span>Request the collected fund even if your campaign has not ended.</li>
                                <li><span class="flaticon-next"></span>Choose the means you want to receive the fund collected.</li>
                                <li><span class="flaticon-next"></span>Receive all your collected fund after the fees have been deducted.</li>
                                <li><span class="flaticon-next"></span>It usually takes not more than 72 working hours from the time the funds was requested.</li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <h1>How to write a successful story?</h1>
                <div class="col-lg-12 text">
                    <h4>To write a good story to be able make your project more appealing is an important key to success in crowdfunding. Don’t forget to follow these tips to write a good crowdfunding story!</h4>
                </div>
                <div class="col-lg-12 cause-details">
                    <ol>
                        <li>
                            Write an attractive title
                            <ul class="list">
                                <li><span class="flaticon-next"></span>Make your tittle simple but describe your campaign.</li>
                                <li><span class="flaticon-next"></span>Make it understandable and brief.</li>
                            </ul>
                        </li>
                        <li>
                            <h5>Pictures are very important</h5>
                            <ul class="list">
                                <li><span class="flaticon-next"></span>Picture will help you to describe your campaign.</li>
                                <li><span class="flaticon-next"></span>Your picture selection should consider quality and size.</li>
                                <li><span class="flaticon-next"></span>Keep your best picture as a cover.</li>
                                <li><span class="flaticon-next"></span>Upload link of the video if available.</li>
                            </ul>
                        </li>
                        <li>
                            <h5>Answer key question in your story</h5>
                            <ul class="list">
                                <li><span class="flaticon-next"></span>WHO are you?</li>
                                <li><span class="flaticon-next"></span>WHERE do you live?</li>
                                <li><span class="flaticon-next"></span>WHAT problem you want to solve?</li>
                                <li><span class="flaticon-next"></span>WHY do you need that amount of funds?</li>
                                <li><span class="flaticon-next"></span>WHEN do you need the funds?</li>
                                <li><span class="flaticon-next"></span>HOW are you going to use the collected funds?</li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
@section('page-scripts')
@endsection
@endsection