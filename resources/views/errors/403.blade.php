@extends('errors::layout')

@section('title', __('Forbidden'))

{{-- @section('code', '403') --}}
@section('message', "You are unauthorised to submit the request.")
