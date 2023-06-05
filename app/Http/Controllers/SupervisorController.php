<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\ArsysSupervisorModel;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function all(Request $request)
    {
        $abbrev = $request->input('abbrev');

        if ($abbrev) {
            $supervisor = ArsysSupervisorModel::select(
            'arsys_supervisor.id',
            'arsys_supervisor.nip',
            'arsys_supervisor.front_title',
            'arsys_supervisor.first_name',
            'arsys_supervisor.last_name',
            'arsys_supervisor.rear_title',
            'arsys_study_program.description AS program_description',
            'arsys_study_specialization.description AS specialization_description'
        )
        ->join('arsys_study_program', 'arsys_supervisor.program_id', '=', 'arsys_study_program.id')
        ->join('arsys_study_specialization', 'arsys_supervisor.specialization_id', '=', 'arsys_study_specialization.id')
        ->where('arsys_study_program.abbrev', $abbrev)
        ->get();
            

            if($supervisor)
                return ResponseFormatter::success(
                    $supervisor,
                    'Data supervisor berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data supervisor tidak ada',
                    404
                );
        }

        $supervisor = ArsysSupervisorModel::select(
            'arsys_supervisor.id',
            'arsys_supervisor.nip',
            'arsys_supervisor.front_title',
            'arsys_supervisor.first_name',
            'arsys_supervisor.last_name',
            'arsys_supervisor.rear_title',
            'arsys_study_program.description AS program_description',
            'arsys_study_specialization.description AS specialization_description'
        )
        ->join('arsys_study_program', 'arsys_supervisor.program_id', '=', 'arsys_study_program.id')
        ->join('arsys_study_specialization', 'arsys_supervisor.specialization_id', '=', 'arsys_study_specialization.id')
        ->get();

        return ResponseFormatter::success(
            $supervisor,
            'Data supervisor berhasil diambil'
        );
    }
}
