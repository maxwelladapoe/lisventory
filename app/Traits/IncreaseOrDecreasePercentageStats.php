<?php
namespace App\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

trait IncreaseOrDecreasePercentageStats
{
    public static function checkPercentageCountIncreaseOrDecrease($model)
    {

        $dateFrom = Carbon::now()->subMonth()->format('Y-m-d') . " 00:00:00";
        $dateTo = Carbon::now()->format('Y-m-d') . " 23:59:59";

        $userId = auth()->user()->id;
        $teamId = auth()->user()->current_team_id;

        $monthly =
            $model::where('team_id', $teamId)
                ->whereBetween('created_at', [$dateFrom, $dateTo])
                ->orWhere('user_id', $userId)
                ->whereBetween('created_at', [$dateFrom, $dateTo])
                ->get()->count();


        $previousDateFrom = Carbon::now()->subMonths(2)->format('Y-m-d') . " 00:00:00";
        $previousDateTo = Carbon::now()->subMonth()->format('Y-m-d') . " 23:59:59";

        $previousMonthly =
            $model::where('team_id', $teamId)
                ->whereBetween('created_at', [$previousDateFrom, $previousDateTo])
                ->orWhere('user_id', $userId)
                ->whereBetween('created_at', [$previousDateFrom, $previousDateTo])
                ->get()->count();

        if ($previousMonthly < $monthly) {
            if ($previousMonthly > 0) {
                $percent_from = $monthly - $previousMonthly;
                $percent = ($percent_from / $previousMonthly) * 100; //increase percent
            } else {
                $percent = 100; //increase percent
            }
            return "$percent% more than last month";
        } else {

            if ($previousMonthly > 0) {
                $percent_from = $previousMonthly - $monthly;
                $percent = ($percent_from / $previousMonthly) * 100; //decrease percent
                return "$percent% less than last month";
            }
            return "0% more than last month";
        }
    }
}
