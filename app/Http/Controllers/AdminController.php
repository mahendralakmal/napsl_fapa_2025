<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Judging;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clentCount = \App\Models\FapaInternationalAwards::count();
        // $clentCount = \App\Models\User::where('role', 'client')->count();
        $entriesCount = \App\Models\ExhibitionEntries::count();
        $monochromeCount = \App\Models\ExhibitionEntries::where('section', 'Open Monochrome')->count();
        $colorCount = \App\Models\ExhibitionEntries::where('section', 'Open Color')->count();
        // $clients = \App\Models\User::with('fapa')->where('role', 'client')->get();
        $clients = \App\Models\User::with('fapa')
            ->where('role', 'client')
            ->whereHas('fapa', function($q) {
                $q->whereDoesntHave('payments', function($q2) {
                    $q2->where('status', 'paid');
                });
            })
            ->get();
        $paidCount = \App\Models\Payment::where('status', 'paid')->count();
        $unpaidCount = $clentCount - $paidCount;
        $users = \App\Models\User::with("fapa")->get();
        $rawResults = DB::table('judgings')
            ->join('exhibition_entries', 'judgings.image_id', '=', 'exhibition_entries.id')
            ->join('users', 'judgings.user_id', '=', 'users.id')
            ->select(
                'users.id as user_id',
                'users.name as user_name',
                'exhibition_entries.section',
                DB::raw('count(*) as entry_count')
            )
            ->groupBy('users.id', 'users.name', 'exhibition_entries.section')
            ->orderBy('users.name')
            ->orderBy('exhibition_entries.section')
            ->get();

        // Transform to get: [user_id => [user_name, 'Open Color' => count, 'Open Monochrome' => count]]
        $grouped = [];

        foreach ($rawResults as $row) {
            $uid = $row->user_id;
            if (!isset($grouped[$uid])) {
                $grouped[$uid] = [
                    'user_name' => $row->user_name,
                    'Open Color' => 0,
                    'Open Monochrome' => 0,
                ];
            }

            if (strtolower($row->section) === 'open color') {
                $grouped[$uid]['Open Color'] = $row->entry_count;
            } elseif (strtolower($row->section) === 'open monochrome') {
                $grouped[$uid]['Open Monochrome'] = $row->entry_count;
            }
        }

        $judging = array_values($grouped);

        $judging_results = DB::table('exhibition_entries')
            ->leftJoin('judgings', 'exhibition_entries.id', '=', 'judgings.image_id')
            ->leftJoin('users', 'exhibition_entries.user_id', '=', 'users.id')
            ->select(
                'exhibition_entries.id as image_id',
                // DB::raw('COALESCE(NULLIF(fapa.name, ""), users.name) as entrant'),
                // 'fapa.name as entrant',
                'users.name as entrant',
                'exhibition_entries.image_caption as image_name',
                'exhibition_entries.image',
                'exhibition_entries.section',
                DB::raw('SUM(judgings.mark) as total_score'),
                DB::raw('COUNT(judgings.id) as judge_count')
            )
            ->groupBy(
                'exhibition_entries.id',
                'exhibition_entries.image_caption',
                'exhibition_entries.image',
                'exhibition_entries.section',
                'users.name',
            )
            ->orderBy('total_score', 'DESC')
            ->get();

            // dd($judging_results);
        return view('admin.index', compact('judging_results','judging','users','clentCount','entriesCount','monochromeCount','colorCount','clients','paidCount','unpaidCount')); // Assuming you have an admin index view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
