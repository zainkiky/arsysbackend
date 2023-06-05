<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\ArsysStudent;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $program_id = $request->input('program_id');
        $specialization_id = $request->input('specialization_id');
        $limit = $request->input('limit');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $gpa = $request->input('gpa');
        $status = $request->input('status');

        if ($id) {
            $student = ArsysStudent::with(['studyProgram', 'studySpecialization'])->find($id);

            if ($student)
                return ResponseFormatter::success(
                    $student,
                    'Data student berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data student tidak ada',
                    404
                );
        }

        if ($specialization_id && $program_id) {
            $student = ArsysStudent::with(['studyProgram', 'studySpecialization'])
                ->where('program_id', $program_id)
                ->where('specialization_id', $specialization_id)
                ->get();

            if ($student) {
                return ResponseFormatter::success(
                    // $student->paginate($limit),
                    $student,
                    'Data list student berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data student tidak ada',
                    404
                );
            }
        }

        if ($program_id) {
            $student = ArsysStudent::with(['studyProgram', 'studySpecialization'])
                ->where('program_id', $program_id)
                ->get();

            if ($student)
                return ResponseFormatter::success(
                    $student,
                    'Data student berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data student tidak ada',
                    404
                );
        }

        if ($specialization_id) {
            $student = ArsysStudent::with(['studyProgram', 'studySpecialization'])
                ->where('specialization_id', $specialization_id)
                ->get();

            if ($student)
                return ResponseFormatter::success(
                    $student,
                    'Data student berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data student tidak ada',
                    404
                );
        }

        $student = ArsysStudent::
            with(['studyProgram', 'studySpecialization'])
            ->get();

        return ResponseFormatter::success(
            $student,
            'Data student berhasil diambil'
        );

        // if($first_name)
        //     $student->where('first_name', 'like', '%' . $first_name . '%');

        // if($last_name)
        //     $student->where('last_name', 'like', '%' . $last_name . '%');
    }

    public function count(Request $request)
    {
        $program_id = $request->input('program_id');
        $specialization_id = $request->input('specialization_id');

        if ($specialization_id && $program_id) {
            $student = ArsysStudent::with(['studyProgram', 'studySpecialization'])
                ->where('program_id', $program_id)
                ->where('specialization_id', $specialization_id)
                ->get();

            if ($student) {
                return ResponseFormatter::success(
                    $student->count(),
                    'Data list student berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data student tidak ada',
                    404
                );
            }
        }

        if ($program_id) {
            $student = ArsysStudent::with(['studyProgram', 'studySpecialization'])
                ->where('program_id', $program_id)
                ->get();

            if ($student)
                return ResponseFormatter::success(
                    $student->count(),
                    'Data student berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data student tidak ada',
                    404
                );
        }

        if ($specialization_id) {
            $student = ArsysStudent::with(['studyProgram', 'studySpecialization'])
                ->where('specialization_id', $specialization_id)
                ->get();

            if ($student)
                return ResponseFormatter::success(
                    $student->count(),
                    'Data student berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data student tidak ada',
                    404
                );
        }

        $student = ArsysStudent::with(['studyProgram', 'studySpecialization'])
            ->get();

        return ResponseFormatter::success(
            $student->count(),
            'Data student berhasil diambil'
        );
    }

    public function alls(Request $request)
    {

        $id = $request->input('id');
        $program_id = $request->input('program_id');
        $specialization_id = $request->input('specialization_id');
        $page = $request->input("page");
        $limit = $request->input("limit");

        if ($id) {
            $student = ArsysStudent::select(
                'arsys_student.id',
                'arsys_student.first_name',
                'arsys_student.last_name',
                'arsys_student.code',
                'arsys_study_program.description as program_description',
                'arsys_study_specialization.description as specialization_description',
                'arsys_supervisor.front_title',
                'arsys_supervisor.rear_title',
                'arsys_supervisor.first_name as supervisor_first_name',
                'arsys_supervisor.last_name as supervisor_last_name'
            )
                ->join('arsys_study_specialization', 'arsys_student.specialization_id', '=', 'arsys_study_specialization.id')
                ->join('arsys_study_program', 'arsys_student.program_id', '=', 'arsys_study_program.id')
                ->join('arsys_supervisor', 'arsys_student.supervisor_id', '=', 'arsys_supervisor.id')
                ->find($id);

            if ($student)
                return ResponseFormatter::success(
                    $student,
                    'Data student berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data student tidak ada',
                    404
                );
        }

        if ($specialization_id && $program_id) {
            $student = ArsysStudent::select(
                'arsys_student.id',
                'arsys_student.first_name',
                'arsys_student.last_name',
                'arsys_student.code',
                'arsys_study_program.description as program_description',
                'arsys_study_specialization.description as specialization_description',
                'arsys_supervisor.front_title',
                'arsys_supervisor.rear_title',
                'arsys_supervisor.first_name as supervisor_first_name',
                'arsys_supervisor.last_name as supervisor_last_name'
            )
                ->join('arsys_study_specialization', 'arsys_student.specialization_id', '=', 'arsys_study_specialization.id')
                ->join('arsys_study_program', 'arsys_student.program_id', '=', 'arsys_study_program.id')
                ->join('arsys_supervisor', 'arsys_student.supervisor_id', '=', 'arsys_supervisor.id')
                ->where('arsys_study_program.id', $program_id)
                ->where('arsys_study_specialization.id', $specialization_id)
                ->get();

            if ($student) {
                return ResponseFormatter::success(
                    // $student->paginate($limit),
                    $student,
                    'Data list student berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data student tidak ada',
                    404
                );
            }
        }

        if ($program_id) {
            $student = ArsysStudent::select(
                'arsys_student.id',
                'arsys_student.first_name',
                'arsys_student.last_name',
                'arsys_student.code',
                'arsys_study_program.description as program_description',
                'arsys_study_specialization.description as specialization_description',
                'arsys_supervisor.front_title',
                'arsys_supervisor.rear_title',
                'arsys_supervisor.first_name as supervisor_first_name',
                'arsys_supervisor.last_name as supervisor_last_name'
            )
                ->join('arsys_study_specialization', 'arsys_student.specialization_id', '=', 'arsys_study_specialization.id')
                ->join('arsys_study_program', 'arsys_student.program_id', '=', 'arsys_study_program.id')
                ->join('arsys_supervisor', 'arsys_student.supervisor_id', '=', 'arsys_supervisor.id')
                ->where('arsys_study_program.id', $program_id)
                ->get();

            if ($student)
                return ResponseFormatter::success(
                    $student,
                    'Data student berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data student tidak ada',
                    404
                );
        }

        if ($specialization_id) {
            $student = ArsysStudent::select(
                'arsys_student.id',
                'arsys_student.first_name',
                'arsys_student.last_name',
                'arsys_student.code',
                'arsys_study_program.description as program_description',
                'arsys_study_specialization.description as specialization_description',
                'arsys_supervisor.front_title',
                'arsys_supervisor.rear_title',
                'arsys_supervisor.first_name as supervisor_first_name',
                'arsys_supervisor.last_name as supervisor_last_name'
            )
                ->join('arsys_study_specialization', 'arsys_student.specialization_id', '=', 'arsys_study_specialization.id')
                ->join('arsys_study_program', 'arsys_student.program_id', '=', 'arsys_study_program.id')
                ->join('arsys_supervisor', 'arsys_student.supervisor_id', '=', 'arsys_supervisor.id')
                ->where('arsys_study_specialization.id', $specialization_id)
                ->get();

            if ($student)
                return ResponseFormatter::success(
                    $student,
                    'Data student berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data student tidak ada',
                    404
                );
        }

        $student = ArsysStudent::select(
            'arsys_student.id',
            'arsys_student.first_name',
            'arsys_student.last_name',
            'arsys_student.code',
            'arsys_study_program.description as program_description',
            'arsys_study_specialization.description as specialization_description',
            'arsys_supervisor.front_title',
            'arsys_supervisor.rear_title',
            'arsys_supervisor.first_name as supervisor_first_name',
            'arsys_supervisor.last_name as supervisor_last_name'
        )
            ->join('arsys_study_specialization', 'arsys_student.specialization_id', '=', 'arsys_study_specialization.id')
            ->join('arsys_study_program', 'arsys_student.program_id', '=', 'arsys_study_program.id')
            ->join('arsys_supervisor', 'arsys_student.supervisor_id', '=', 'arsys_supervisor.id')
            ->limit(5)
            ->offset(2)
            ->get();

        return ResponseFormatter::success(
            $student,
            'Data student berhasil diambil'
        );

    }
}