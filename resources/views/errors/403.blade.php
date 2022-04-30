{{-- @extends('errors.minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}

@extends('errors.style')

@section('title','Forbidden')
@section('error-title','403 Forbidden')
@section('img','images/samples/error-403.png')
@section('text','You are unauthorized to see this page.')
