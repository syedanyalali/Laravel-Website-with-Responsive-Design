@extends('layout')

@section('title', 'Contact Page')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="container">

    <!-- Section 1: Contact Info and Form -->
    <div class="section">
        <!-- Column 1: Contact Info -->
        <div class="column contact-info">
            <h2>Contact Information</h2>
            <div class="info-item">
                <img src="{{ asset('images/location.svg') }}" alt="Store of Gems">
                <span>123 Jewelry St., Gem City, Country</span>
            </div>
            <div class="info-item">
                <img src="{{ asset('images/phone.svg') }}" alt="Store of Gems">
                <span>+1 (234) 567-890</span>
            </div>
            <div class="info-item">
                <img src="{{ asset('images/mail.svg') }}" alt="Store of Gems">
                <span>info@storeofgems.com</span>
            </div>
        </div>

        <!-- Column 2: Contact Form -->
        <div class="column contact-form">
            <h2>Get in Touch</h2>
            <form action="#" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>

    <!-- Section 2: Map -->
    <div class="section map-section">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093746!2d144.95373631531792!3d-37.81627927975179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f1fba0b5%3A0x2a6f1f5fae2040e5!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1602906075394!5m2!1sen!2sau"
            allowfullscreen=""
            aria-hidden="false"
            tabindex="0"></iframe>
    </div>

</div>
@endsection