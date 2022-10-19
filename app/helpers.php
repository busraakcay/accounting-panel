<?php

use App\Models\Branch;

if (!function_exists("checkPasswords")) {
    function checkPasswords($password, $repassword)
    {
        if ($password == $repassword) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists("getBranchName")) {
    function getBranchName()
    {
        if (!session()->has('branchName')) {
            $branch = Branch::where('id', 1)->first();
            session()->put('branchName', $branch->name);
            session()->put('branchId', $branch->id);
            session()->save();
        }
        return session()->get('branchName');
    }
}
