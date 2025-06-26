<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\Tariff;
use App\Models\SubscriptionLog;
use App\Notifications\SubscriptionCreated;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tariff_id' => 'required|exists:tariffs,id',
        ]);

        $tariff = Tariff::findOrFail($request->tariff_id);

        $subscription = Subscription::create([
            'user_id' => Auth::id(),
            'tariff_id' => $tariff->id,
            'start_date' => now(),
            'end_date' => now()->addDays($tariff->duration_days),
            'status' => 'active',
        ]);

        SubscriptionLog::create([
            'user_id' => Auth::id(),
            'subscription_id' => $subscription->id,
            'action' => 'created',
        ]);

        // Отправляем уведомление с названием тарифа
        $user = Auth::user();
        $tariffName = $tariff->name ?? 'тариф';
        $user->notify(new SubscriptionCreated($tariffName));

        return redirect()->back()->with('success', 'Подписка успешно добавлена.');
    }

    public function destroy(Subscription $subscription)
    {
        if ($subscription->user_id !== Auth::id()) {
            abort(403); // Защита от чужих удалений
        }

        SubscriptionLog::create([
            'user_id' => Auth::id(),
            'subscription_id' => $subscription->id,
            'action' => 'cancelled',
        ]);

        $subscription->delete();

        return redirect()->back()->with('success', 'Подписка отменена.');
    }
}
