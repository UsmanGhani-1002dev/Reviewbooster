<!-- create.blade.php -->
@extends('layouts.app')
@section('content')
<form method="POST" action="{{ route('admin.subscription-plans.store') }}">
    @csrf
    @include('admin.subscription_plans.form')
</form>
@endsection
