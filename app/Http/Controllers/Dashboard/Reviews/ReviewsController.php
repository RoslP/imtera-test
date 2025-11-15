<?php

namespace App\Http\Controllers\Dashboard\Reviews;

use App\Http\Controllers\Controller;
use App\Models\UserLink;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewsController extends Controller
{
    public function saveReviewLink(Request $request): Response
    {
        $validated = $request->validate([
            'link' => ['required', 'url', 'regex:/^https:\/\/yandex\.ru\//i'],
        ]);

        UserLink::query()->updateOrCreate(['user_id' => auth()->id(), 'link' => $validated['link']]);

        return response(status: 200);
    }
}
