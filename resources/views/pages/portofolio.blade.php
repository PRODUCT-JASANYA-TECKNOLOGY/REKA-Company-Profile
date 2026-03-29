@extends('layouts.app')

@section('title', 'Portofolio — REKA')
@section('description', 'Setiap proyek adalah cerita tentang masalah yang diselesaikan dan bisnis yang bertumbuh.')

@section('content')
    @include('sections.portofolio.hero')
    @include('sections.portofolio.projects')
    @include('sections.portofolio.cta')
@endsection
