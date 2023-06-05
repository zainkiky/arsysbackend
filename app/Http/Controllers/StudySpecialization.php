<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\ArsysStudySpecialization;
use Illuminate\Http\Request;

class StudySpecialization extends Controller
{
    public function all(Request $request)
    {
        $specialization = ArsysStudySpecialization::all();
        
        if($specialization)
            return ResponseFormatter::success(
                $specialization,
                'Data program berhasil diambil'
        );
        else
            return ResponseFormatter::error(
                $specialization,
                'Data specialization gagal diambil'
            );
    }
}
