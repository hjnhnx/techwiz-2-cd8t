<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\RequestRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('web/contact');
    }

    public function storeFeedback(FeedbackRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $feedback = new Feedback();
        $feedback->fill($data);
        $feedback->save();
        return redirect()->route('thankYouFeedback');
    }

    public function thankYou()
    {
        return view('web/thank-you');

    }
}
