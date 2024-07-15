<?php

namespace App;

use App\Models\Policy;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Policycheck
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function pv($policyName) {
        $userId = Session::get('userId');
        $thePolicy = Policy::where('policyName', $policyName)->first();

        $isPolicy = DB::SELECT("SELECT * FROM memberpolicies WHERE member_id=? AND policy_id=?", [$userId, $thePolicy->id]);

        if(count($isPolicy) == 0) {
            return false;
        }
        else {
            return true;
        }
    }
}
