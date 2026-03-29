@extends('layouts.app')

@section('title', 'Kontak — REKA')
@section('description', 'Ceritakan kebutuhan Anda. Konsultasi awal gratis dan tanpa komitmen.')

@section('content')
    @include('sections.kontak.hero')
    @include('sections.kontak.content')
@endsection
