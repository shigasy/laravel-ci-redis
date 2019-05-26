<?php

namespace Tests\Unit\Repositories;

use App\Repositories\Ranking\RankingRepository;
use App\Repositories\Ranking\RankingRepositoryInterface;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RankingRepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetRankingDayEqualsArray()
    {
        $ranking = new RankingRepository();
        $response = $ranking->getRankingDay();

        $this->assertEquals('array', gettype($response));
    }
}
