<?php

namespace App\Http\Controllers\Dashboard\Reviews;

use App\Http\Controllers\Controller;
use App\Models\UserLink;
use App\Services\YandexReviewParser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewsController extends Controller
{
    public function saveReviewLink(Request $request): Response
    {
        $validated = $request->validate([
            'link' => ['required', 'url', 'regex:/^https:\/\/yandex\.ru\//i'],
        ]);

        UserLink::query()->updateOrCreate(['user_id' => auth()->id()], ['link' => $validated['link']]);

        return response(status: 200);
    }

    public function getReviews(YandexReviewParser $yandexReviewParser): JsonResponse
    {
        $ref = UserLink::query()->where('user_id', auth()->id())->firstOrFail()->link;

        if (!$ref) {
            return response()->json(['error' => 'Записи отсутсвуют, требуется ссылка'], 404);
        }

        return response()->json($yandexReviewParser->parse(url: $ref));
    }
}
