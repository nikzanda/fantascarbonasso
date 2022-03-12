<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = DB::table('teams AS t')
            ->select('t.*', DB::raw('IFNULL(SUM(c.points * (CASE WHEN c.is_bonus = 1 THEN 1 ELSE -1 END) * (CASE WHEN e.created_by_leader = 1 THEN 2 ELSE 1 END)), 0) AS points'))
            ->leftJoin('events AS e', 't.id', '=', 'e.team_id')
            ->leftJoin('categories AS c', 'c.id', '=', 'e.category_id')
            ->groupBy(['t.id', 't.name'])
            ->get();

        return response()->json($teams);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return $team;
    }

    /**
     * Display resources points.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPoints()
    {
        $teams = DB::table('teams AS t')
            ->select('t.name', DB::raw('IFNULL(SUM(c.points * (CASE WHEN c.is_bonus = 1 THEN 1 ELSE -1 END) * (CASE WHEN e.created_by_leader = 1 THEN 2 ELSE 1 END)), 0) AS total_points'))
            ->leftJoin('events AS e', 't.id', '=', 'e.team_id')
            ->leftJoin('categories AS c', 'c.id', '=', 'e.category_id')
            ->groupBy('t.name')
            ->get();

        return response()->json($teams);
    }
}
