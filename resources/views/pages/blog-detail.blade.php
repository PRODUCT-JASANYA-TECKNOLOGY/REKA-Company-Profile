@extends('layouts.app')

@section('title')
    {{ $article['judul'] }} — REKA Blog
@endsection
@section('description')
    {{ $article['excerpt'] }}
@endsection

@section('content')
    @include('sections.blog.detail-hero')
    @include('sections.blog.detail-content')
@endsection
