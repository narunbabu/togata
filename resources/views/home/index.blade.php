@php
use App\Models\Product;
$getProducts = Product::get();
@endphp
@extends('layouts.master')
@section('content')
    @include('layouts.front_layout.slider')
    @include('layouts.front_layout.container')
    @include('layouts.front_layout.trending')
    

    @if (!empty($getProducts))
    @include('layouts.front_layout.brand')
        
    @endif
@endsection
