<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\ArsysStudyProgram;
use Illuminate\Http\Request;

class StudyProgram extends Controller
{
    public function all(Request $request)
    {
        $program = ArsysStudyProgram::all();
        
        if($program)
            return ResponseFormatter::success(
                $program,
                'Data program berhasil diambil'
        );
        else
            return ResponseFormatter::error(
                $program,
                'Data program gagal diambil'
            );
    }
}
