<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Ranking\RankingRepositoryInterface as Ranking;


class LinkController extends Controller
{

    protected $ranking;

    public function __construct(Ranking $ranking)
    {
        $this->ranking = $ranking;
    }

    public function index(Request $request)
    {
        return $this->ranking->storeViewCount($request->id);
    }
}
