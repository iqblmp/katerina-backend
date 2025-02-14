<?php

namespace App\Filament\Resources\CateringSubscriptionResource\Widgets;

use App\Models\CateringSubscription;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CateringSubscriptionStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalTransactions = CateringSubscription::count();
        $approvedTransactions = CateringSubscription::where('is_paid', true)->count();
        $totalRevenue = CateringSubscription::where('is_paid', true)->sum('total_amount');

        return [
            Stat::make('Total Transactions', $totalTransactions)
                ->description('All transactions')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('primary'),

            Stat::make('Approved Transactions', $approvedTransactions)
                ->description('Approved transactions')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Total Revenue', 'IDR ' . number_format($totalRevenue))
                ->description('Revenue from approved transactions')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
