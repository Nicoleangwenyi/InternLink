<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/homepage.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/contact.css') }}" rel="stylesheet">

    <link rel="stylesheet" href= "https://unpkg.com/aos@next/dist/aos.css" />

    <!---box icons link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Contact Us</title>
</head>
<body>
@include('layouts.header')

<div class="contact-container">
    <form action="https://api.web3forms.com/submit" method="POST" class="contact-left">
        <div class="contact-left-title">
            <h2 data-aos="zoom-in-right" data-aos-duration="1400" >Get in touch</h2>
            <hr data-aos="zoom-in-left" data-aos-duration="1400">
        </div>
        <input type="hidden" name="access_key" value="63be9d7d-84e6-44da-865a-b91d6bf449cf">
        <input type="text" name="name" placeholder="Your Name" class="contact-inputs" data-aos="zoom-in-left" data-aos-duration="1400" data-aos-delay="200" required>
        <input type="email" name="email" placeholder="Your Email" class="contact-inputs" data-aos="zoom-in-left" data-aos-duration="1400" data-aos-delay="200" required>
        <textarea name="message" placeholder="Your Message" class="contact-inputs" data-aos="zoom-in-left" data-aos-duration="1400" data-aos-delay="200" required></textarea>
        <button type="submit" data-aos="flip-down" data-aos-duration="1400" data-aos-delay="400">Submit</button>
    </form>
    <div class="contact-right" data-aos="zoom-in" data-aos-duration="1400">
        <img src="{{ URL('images/contact3.png') }}" alt="">
    </div>
</div>



<script src="{{asset('js/homepage.js')}}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init({
        offset:1,
    });
    </script>
</body>
</html>
