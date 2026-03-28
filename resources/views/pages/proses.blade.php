@extends('layouts.app')

@section('title', 'Proses — REKA')
@section('description', 'Proses yang transparan, terstruktur, dan terukur — memastikan setiap proyek berjalan sesuai ekspektasi dan menghasilkan dampak nyata.')

@section('content')
    @include('sections.proses.hero')
    @include('sections.proses.steps')
    @include('sections.proses.details')
    @include('sections.proses.cta')
@endsection
