@extends('layouts.web.web-default')
@section('content')
    @include('layouts.web.parts.web-header')

    @include('layouts.web.parts.web-hero')
    @include('layouts.web.parts.web-about')
    {{--    @include('layouts.web.parts.web-resume')--}}
    {{--    @include('layouts.web.parts.web-services')--}}
    @include('layouts.web.parts.web-portfolio')
    @include('layouts.web.parts.web-contact')

    @include('layouts.web.parts.web-footer')
@endsection



