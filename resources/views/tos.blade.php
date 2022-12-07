@extends('master')

@section('title', 'Travelku - Book Flight')

@section('custom-css')

    @include('components/navbar/css')
    @include('content_body.why_css')
    @include('content_body.promo_css')
    <style type="text/css">
   element.style {
}

.bg-light {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-light-rgb),var(--bs-bg-opacity))!important;
}

.py-5 {
  padding-top: 3rem!important;
  padding-bottom: 3rem!important;
}

body {
  margin: 0;
  font-family: var(--bs-body-font-family);
  font-size: var(--bs-body-font-size);
  font-weight: var(--bs-body-font-weight);
  line-height: var(--bs-body-line-height);
  color: var(--bs-body-color);
  text-align: var(--bs-body-text-align);
  background-color: var(--bs-body-bg);
  -webkit-text-size-adjust: 100%;
  -webkit-tap-highlight-color: transparent;
}

:root {
  --bs-blue: #0d6efd;
  --bs-indigo: #6610f2;
  --bs-purple: #6f42c1;
  --bs-pink: #d63384;
  --bs-red: #dc3545;
  --bs-orange: #fd7e14;
  --bs-yellow: #ffc107;
  --bs-green: #198754;
  --bs-teal: #20c997;
  --bs-cyan: #0dcaf0;
  --bs-black: #000;
  --bs-white: #fff;
  --bs-gray: #6c757d;
  --bs-gray-dark: #343a40;
  --bs-gray-100: #f8f9fa;
  --bs-gray-200: #e9ecef;
  --bs-gray-300: #dee2e6;
  --bs-gray-400: #ced4da;
  --bs-gray-500: #adb5bd;
  --bs-gray-600: #6c757d;
  --bs-gray-700: #495057;
  --bs-gray-800: #343a40;
  --bs-gray-900: #212529;
  --bs-primary: #0d6efd;
  --bs-secondary: #6c757d;
  --bs-success: #198754;
  --bs-info: #0dcaf0;
  --bs-warning: #ffc107;
  --bs-danger: #dc3545;
  --bs-light: #f8f9fa;
  --bs-dark: #212529;
  --bs-primary-rgb: 13,110,253;
  --bs-secondary-rgb: 108,117,125;
  --bs-success-rgb: 25,135,84;
  --bs-info-rgb: 13,202,240;
  --bs-warning-rgb: 255,193,7;
  --bs-danger-rgb: 220,53,69;
  --bs-light-rgb: 248,249,250;
  --bs-dark-rgb: 33,37,41;
  --bs-white-rgb: 255,255,255;
  --bs-black-rgb: 0,0,0;
  --bs-body-color-rgb: 33,37,41;
  --bs-body-bg-rgb: 255,255,255;
  --bs-font-sans-serif: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  --bs-font-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
  --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
  --bs-body-font-family: var(--bs-font-sans-serif);
  --bs-body-font-size: 1rem;
  --bs-body-font-weight: 400;
  --bs-body-line-height: 1.5;
  --bs-body-color: #212529;
  --bs-body-bg: #fff;
  --bs-border-width: 1px;
  --bs-border-style: solid;
  --bs-border-color: #dee2e6;
  --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
  --bs-border-radius: 0.375rem;
  --bs-border-radius-sm: 0.25rem;
  --bs-border-radius-lg: 0.5rem;
  --bs-border-radius-xl: 1rem;
  --bs-border-radius-2xl: 2rem;
  --bs-border-radius-pill: 50rem;
  --bs-link-color: #0d6efd;
  --bs-link-hover-color: #0a58ca;
  --bs-code-color: #d63384;
  --bs-highlight-bg: #fff3cd;
}



            ul.headerIcon {
                /* margin-left: -20px; */
                display: flex !important;
                flex-direction: row;
                flex-wrap: nowrap;
                overflow: auto;
                white-space: nowrap;

            }
        }
    </style>

@endsection

@section('content')
    <div class="row m-0">
        <div class="col-12 p-0">
            @include('components/navbar/navbar')
            <section class="py-5 bg-light">
    <h1 class="text-center text-success" style="padding-top: 15px;padding-bottom: 15px;color: #1b6ce5!important;">FAQ</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div id="faqlist" class="accordion accordion-flush">
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-1">What is Lorem Ipsum?</button></h2>
                        <div id="content-accordion-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-2">What is Lorem Ipsum?</button></h2>
                        <div id="content-accordion-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-3">What is Lorem Ipsum?</button></h2>
                        <div id="content-accordion-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-4">What is Lorem Ipsum?</button></h2>
                        <div id="content-accordion-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-5">What is Lorem Ipsum?</button></h2>
                        <div id="content-accordion-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')