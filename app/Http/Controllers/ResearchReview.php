<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\ArsysResearchReview;
use Illuminate\Http\Request;

class ResearchReview extends Controller
{
    public function all(Request $request)
    {
        $research_id = $request->input('research_id');

        if($research_id)
        {
            $research = ArsysResearchReview::select(
                'arsys_research_review.research_id',
                'arsys_research_review.supervisor_id',
                'arsys_supervisor.nip',
                'arsys_supervisor.front_title',
                'arsys_supervisor.first_name',
                'arsys_supervisor.last_name',
                'arsys_supervisor.rear_title'
            )
            ->join('arsys_supervisor', 'arsys_research_review.supervisor_id', '=', 'arsys_supervisor.id')
            ->where('arsys_research_review.research_id', $research_id)
            ->get();

            if($research)
                return ResponseFormatter::success(
                    $research,
                    'Data research berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data research tidak ada',
                    404
                );
        }
    }
}
