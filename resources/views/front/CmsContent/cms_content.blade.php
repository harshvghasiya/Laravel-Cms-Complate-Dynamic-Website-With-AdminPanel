@php
$author_desc=\App\setting::find(1); 
@endphp
@extends('front.layout')
@section('title',$cms_content->name)
@section('container')
  <main id="main" class="search_append">
    <section class="breadcrumbs">
      <div class="container">
    
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>{{$cms_content->name}}</li>
        </ol>
        <h2>{{$cms_content->secondary_title}}</h2>

      </div>
    </section>

    <section  class="inner-page">
      <div class="container" data-aos="fade-up">
       @php echo $cms_content->long_description; @endphp
      </div>
    </section>
  </main>
@endsection
