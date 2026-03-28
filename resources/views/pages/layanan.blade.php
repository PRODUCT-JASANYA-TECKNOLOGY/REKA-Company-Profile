@extends('layouts.app')

@section('title', 'Layanan — REKA')
@section('description', 'Dari pengembangan software hingga infrastruktur cloud — kami menyediakan layanan end-to-end yang sesuai dengan skala dan kebutuhan bisnis Anda.')

@section('content')
    @include('sections.layanan.hero')
    @include('sections.layanan.cards')
    @include('sections.layanan.cta')
@endsection
