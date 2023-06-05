<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\ArsysResearchModel;
use Illuminate\Http\Request;

class Research extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $description = $request->input('description');

        if($id)
        {
            $research = ArsysResearchModel::select(
                'arsys_research.id',
                'arsys_research_type.description',
                'arsys_research.research_code',
                'arsys_research.title',
                'arsys_research.research_id',
                'arsys_student.first_name',
                'arsys_student.last_name',
                'arsys_student.code'
            )
            ->join('arsys_student', 'arsys_research.student_id', '=', 'arsys_student.id')
            ->join('arsys_research_type', 'arsys_research.research_type_id', '=', 'arsys_research_type.id')
            ->find($id);

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

        if($description)
        {
            $research = ArsysResearchModel::select(
                'arsys_research.id',
                'arsys_research_type.description',
                'arsys_research.research_code',
                'arsys_research.title',
                'arsys_research.research_id',
                'arsys_student.first_name',
                'arsys_student.last_name',
                'arsys_student.code'
            )
            ->join('arsys_student', 'arsys_research.student_id', '=', 'arsys_student.id')
            ->join('arsys_research_type', 'arsys_research.research_type_id', '=', 'arsys_research_type.id')
            ->where('arsys_research_type.description', $description)
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

        $research = ArsysResearchModel::select('arsys_research.id', 'arsys_research_type.description', 'arsys_research.research_code', 'arsys_research.title', 'arsys_research.research_id', 'arsys_student.first_name', 'arsys_student.last_name', 'arsys_student.code')
            ->join('arsys_student', 'arsys_research.student_id', '=', 'arsys_student.id')
            ->join('arsys_research_type', 'arsys_research.research_type_id', '=', 'arsys_research_type.id')
            ->get();
        

        return ResponseFormatter::success(
            $research,
            'Data research berhasil diambil'
        );
    }
}
