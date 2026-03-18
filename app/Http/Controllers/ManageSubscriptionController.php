<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class ManageSubscriptionController extends Controller
{
    public function index()
    {
        $query = Subscription::with('user', 'plan')->latest();

        if ($search = request('search')) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('company_name', 'like', "%{$search}%");
            })
                ->orWhereHas('plan', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $subscriptions = $query->paginate(10)->withQueryString();

        return view('admin.manage_subscription.index', compact('subscriptions'));
    }


    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        $user = $subscription->user;

        $latestSubscription = $user->subscriptions()->orderBy('id', 'desc')->first();
        $isLatest = $subscription->id === optional($latestSubscription)->id;

        $hasAnotherActive = $user->subscriptions()
            ->where('id', '!=', $subscription->id)
            ->where('status', 'active')
            ->exists();

        return view('admin.manage_subscription.edit', [
            'subscription' => $subscription,
            'disableForm' => !$isLatest, 
            'preventStatusChange' => $subscription->status === 'expired' && $hasAnotherActive,
        ]);
    }

    public function update(Request $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $user = $subscription->user;

        $latestSubscription = $user->subscriptions()->orderBy('id', 'desc')->first();
        $isLatest = $subscription->id === optional($latestSubscription)->id;

        $hasAnotherActive = $user->subscriptions()
            ->where('id', '!=', $subscription->id)
            ->where('status', 'active')
            ->exists();

        if (!$isLatest) {
            return redirect()->route('admin.manage-subscription.index')
                ->with('error', 'You can only update the latest subscription.');
        }

        if ($subscription->status === 'expired' && $hasAnotherActive) {
            $request->merge(['status' => $subscription->status]);
        }

        $request->validate([
            'status' => 'required|in:active,expired,cancelled',
            'started_at' => 'required|date',
            'ends_at' => 'required|date|after_or_equal:started_at',
        ]);

        $subscription->status = $request->status;
        $subscription->started_at = $request->started_at;

        if (in_array($request->status, ['expired', 'cancelled'])) {
            $subscription->ends_at = now();
        } elseif ($request->status === 'active') {
            $plan = $subscription->plan;
        
            if ($plan && $plan->duration_days) {
                // Cast duration_days to int to avoid Carbon error
                $durationDays = (int) $plan->duration_days;
        
                $subscription->ends_at = \Carbon\Carbon::parse($subscription->started_at)
                                        ->addDays($durationDays);
            } else {
                $subscription->ends_at = $request->ends_at;
            }
        } else {
            $subscription->ends_at = $request->ends_at;
        }


        $subscription->save();

        return redirect()->route('admin.manage-subscription.index')
            ->with('success', 'Subscription updated successfully.');
    }

    public function destroy($id)
    {
        // Logic to handle deleting a subscription
        return redirect()->route('subscription.index')->with('success', 'Subscription deleted successfully.');
    }
}
