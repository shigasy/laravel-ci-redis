<?php

namespace App\Http\Controllers;

use App\Repositories\Ranking\RankingRepositoryInterface as Ranking;

class TopController extends Controller
{
    protected $ranking;

    public function __construct(Ranking $ranking)
    {
        $this->ranking = $ranking;
    }

    function getRankingDay()
    {
        return $this->ranking->getRankingDay();
    }

    function getRankingWeek()
    {
        return $this->ranking->getRankingWeek();
    }
}
