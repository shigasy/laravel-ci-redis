<?php

namespace App\Repositories\Ranking;

use Illuminate\Support\Facades\Redis;

class RankingRepository implements RankingRepositoryInterface
{

    public function storeViewCount(string $id)
    {
        return array(
            $this->storeDayViewCount($id),
            $this->storeWeekViewCount($id)
        );
    }

    public function getRankingDay()
    {
        $key_name = 'ranking/day/id:*';
        return $this->fetchRankingData($key_name);
    }

    public function getRankingWeek()
    {
        $key_name = 'ranking/week/id:*';
        return $this->fetchRankingData($key_name);
    }

    public function fetchRankingData(string $key_name)
    {
        $keys = Redis::keys($key_name);
        $results = Array();

        if (empty($keys) != true) {
            foreach ($keys as $key) {
                $key = str_replace('laravel_database_', '', $key);
                $results[$key] = Redis::get($key);
            }
            arsort($results, SORT_NUMERIC);
        }
        return $results;

    }

    public function storeDayViewCount(string $id)
    {
        $key = "ranking/day/id:" . $id;

        $value = Redis::get($key);
        if (empty($value)) {
            Redis::set($key, "1");
            Redis::expire($key, 60 * 60 * 60);
        } else {
            Redis::set($key, $value + 1);
        }
        return Redis::get($key);
    }

    public function storeWeekViewCount(string $id)
    {
        $key = "ranking/week/id:" . $id;

        $value = Redis::get($key);
        if (empty($value)) {
            Redis::set($key, "1");
            Redis::expire($key, 60 * 60 * 60 * 7);
        } else {
            Redis::set($key, $value + 1);
        }
        return Redis::get($key);
    }
}
