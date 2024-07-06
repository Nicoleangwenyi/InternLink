<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/homepage.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/about.css') }}" rel="stylesheet">

    <!---box icons link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!--AOS css-->

    <link rel="stylesheet" href= "https://unpkg.com/aos@next/dist/aos.css" />

    <title>About Us</title>
</head>
<body>
@include('layouts.header')


<section class="about">
    <div class="about-img" data-aos="zoom-in" data-aos-duration="1400">
        <img src="{{ URL('images/about1.png') }}" alt="About Image">
    </div>
    <div class="about-text">
        <h1 data-aos="fade-left" data-aos-duration="1400">About Us</h1>
        <p class="text" data-aos="fade-left" data-aos-duration="1400" data-aos-delay="200">
            Welcome to InternLink, your ultimate gateway to valuable internship opportunities. Our mission is to bridge the gap between ambitious students and dynamic organizations. At InternLink, we understand the crucial role internships play in shaping the careers of young professionals and the fresh perspectives interns bring to businesses.
        </p>

        <p class="text" data-aos="fade-left" data-aos-duration="1400" data-aos-delay="250">
            Founded with a vision to create seamless connections, InternLink offers a comprehensive platform where students can discover internships that align with their career goals and academic backgrounds. We partner with a wide range of companies, from innovative startups to established enterprises, ensuring a diverse array of opportunities across various fields.
        </p>

        <p class="text" data-aos="fade-left" data-aos-duration="1400" data-aos-delay="300">
            Our platform is designed to be user-friendly, allowing students to easily search for internships, apply directly, and receive guidance throughout their application process. For employers, InternLink provides an efficient way to post internship listings, review applications, and find the perfect candidates who can contribute to their projects and organizational growth.
        </p>

        <p class="text" data-aos="fade-left" data-aos-duration="1400" data-aos-delay="350">
            We believe in the power of internships to build skills, gain practical experience, and open doors to future career paths. Join us at InternLink and take the first step towards a successful and fulfilling career. Together, let's build a future where opportunities and talent connect seamlessly.
        </p>

        <div class="skills" data-aos="fade-left" data-aos-duration="1400" data-aos-delay="1100">
            <span>Connecting Students</span>
            <span>Empowering Careers</span>
            <span>Building Futures</span>
        </div>
    </div>
</section>

<script src="{{asset('js/homepage.js')}}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
AOS.init({
    offset: 1,
});
</script>
</body>
</html>
