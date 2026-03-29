@extends('layouts.app')

@section('title', 'Produk — REKA')
@section('description', 'Produk siap pakai dari REKA. Selain layanan custom, kami menyediakan produk digital siap pakai yang bisa langsung digunakan untuk bisnis Anda.')

@section('content')
    @include('sections.produk.hero')
    @include('sections.produk.list')
    @include('sections.produk.cta')
@endsection
