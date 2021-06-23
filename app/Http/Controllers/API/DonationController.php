<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function all(Request $request) {
        $id = $request->input('id');
        $dana_dibutuhkan = $request->input('dana_dibutuhkan');
        $dana_terkumpul = $request->input('dana_terkumpul');
        $name = $request->input('name');
        $description = $request->input('description');
        $tags = $request->input('tags');
        $categories_id = $request->input('categories_id');
        $limit = $request->input('limit');
    
        if($id) {
            $donation = Donation::with(['category', 'galleries'])->find($id);

            if($donation) {
                return ResponseFormatter::success(
                    $donation,
                    'Data Donasi berhasil diambil'
                );
            }
            else{
                return ResponseFormatter::error(
                    null,
                    'Data Donasi tidak ada',
                    404
                );
            }
        }

        $donation = Donation::with(['category', 'galleries']);
        if($name) {
            $donation->where('name', 'like', '%' . $name . '%');
        }

        if($description) {
            $donation->where('description', 'like', '%' . $description . '%');
        }

        if($tags) {
            $donation->where('tags', 'like', '%' . $tags . '%');
        }

        if($categories_id) {
            $donation->where('categories_id', $categories_id);
        }

        if($dana_dibutuhkan) {
            $donation->where('dana_dibutuhkan', $dana_dibutuhkan);
        }

        if($dana_terkumpul) {
            $donation->where('dana_terkumpul', $dana_terkumpul);
        }

        if($donation) {
            return ResponseFormatter::success(
                $donation->paginate($limit),
                'Data Donasi berhasil diambil'
            );
        }
    }
}
