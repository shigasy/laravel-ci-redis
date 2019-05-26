<?php

namespace App\Repositories\Ranking;

interface RankingRepositoryInterface
{
    public function storeViewCount(string $id);

    public function getRankingDay();

    public function getRankingWeek();
}
