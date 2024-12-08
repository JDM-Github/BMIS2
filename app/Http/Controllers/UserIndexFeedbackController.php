<?php

namespace App\Http\Controllers;

use App\DataTables\UserFeedBackDataTable;
use Illuminate\Http\Request;

class UserIndexFeedbackController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UserFeedBackDataTable $userFeedBackDataTable)
    {
        return $userFeedBackDataTable->render('feedback.index');
    }
}
