@extends('layouts.app')

@section('content')
<chat-app :user = "{{ auth()->user() }}"></chat-app>

@endsection
