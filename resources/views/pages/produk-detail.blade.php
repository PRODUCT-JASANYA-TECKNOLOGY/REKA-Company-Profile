@extends('layouts.app')

@section('title')
    {{ $product['nama'] }} — REKA
@endsection
@section('description')
    {{ $product['tagline'] }}
@endsection

@section('content')
    @include('sections.produk.detail-hero')
    @include('sections.produk.detail-content')
@endsection
