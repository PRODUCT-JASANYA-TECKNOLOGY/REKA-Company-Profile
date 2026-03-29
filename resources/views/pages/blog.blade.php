@extends('layouts.app')

@section('title', 'Blog — REKA')
@section('description', 'Insights, panduan praktis, dan perspektif dari tim REKA tentang pengembangan software dan transformasi digital bisnis.')

@section('content')
    @include('sections.blog.hero')
    @include('sections.blog.featured')
    @include('sections.blog.grid')
@endsection
