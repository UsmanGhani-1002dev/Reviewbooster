<!-- edit.blade.php -->
@extends('layouts.app')
@section('content')
<form method="POST" action="{{ route('admin.subscription-plans.update', $subscriptionPlan) }}">
    @csrf
    @method('PUT')
    @include('admin.subscription_plans.form', ['plan' => $subscriptionPlan])
</form>
@endsection
