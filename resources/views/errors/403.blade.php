@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('code-title', 'Proibido')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
