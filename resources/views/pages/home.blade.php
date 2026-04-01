@extends('layouts.app')

@section('title', 'REKA — Solusi Digital Jasanya.id')
@section('description', 'Mulai dari website, aplikasi, hingga sistem kompleks — REKA membantu bisnis Anda tumbuh dengan solusi digital yang scalable dan terpercaya.')

@section('content')
    @include('sections.home.hero')
    @include('sections.home.trust-bar')
    @include('sections.home.layanan-preview')
    @include('sections.home.kenapa-reka')
    @include('sections.home.proses-preview')
    @include('sections.home.testimoni')
    @include('sections.home.klient')
    @include('sections.home.faq')
    @include('sections.home.cta')
@endsection
