<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\ArsysResearchType;
use Illuminate\Http\Request;

class ResearchType extends Controller
{
    public function all(Request $request)
    {
        $research = ArsysResearchType::
            select('id', 'code', 'description')
            ->get();
        

        return ResponseFormatter::success(
            $research,
            'Data research berhasil diambil'
        );
    }
}
