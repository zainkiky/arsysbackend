<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\ArsysStudySpecializationPivot;
use Illuminate\Http\Request;

class StudySpecializationPivot extends Controller
{
    public function pivot(Request $request)
    {
        $program_id = $request->input('program_id');

        if ($program_id) {
            $specializationPivot = ArsysStudySpecializationPivot::with(['specialization'])
            ->where('program_id', $program_id)
            ->get();

            if($specializationPivot)
                return ResponseFormatter::success(
                    $specializationPivot,
                    'Data program berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data program tidak ada',
                    404
                );
        }

        $student = ArsysStudySpecializationPivot::with(['specialization'])
        ->get();

        return ResponseFormatter::success(
            $student,
            'Data student berhasil diambil'
        );
    }
}
