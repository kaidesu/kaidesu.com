<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\Wanikani as WanikaniClient;
use Illuminate\Support\Facades\Cache;

class Wanikani extends Component
{
    public function render()
    {
        $wanikani = new WanikaniClient;

        $summary = Cache::remember('wanikani.summary', 60, function() use ($wanikani) {
            $response = $wanikani->get('summary');

            return json_decode($response->getBody());
        });

        $user = Cache::remember('wanikani.user', 60, function() use ($wanikani) {
            $response = $wanikani->get('user');

            return json_decode($response->getBody());
        });

        $radicals = Cache::remember('wanikani.radicals', 60, function() use ($wanikani) {
            $response = $wanikani->get('assignments?subject_types=radical&srs_stages=5,6,7,8,9');

            return json_decode($response->getBody());
        });

        $kanji = Cache::remember('wanikani.kanji', 60, function() use ($wanikani) {
            $response = $wanikani->get('assignments?subject_types=kanji&srs_stages=5,6,7,8,9');

            return json_decode($response->getBody());
        });

        $vocabulary = Cache::remember('wanikani.vocabulary', 60, function() use ($wanikani) {
            $response = $wanikani->get('assignments?subject_types=vocabulary&srs_stages=5,6,7,8,9');

            return json_decode($response->getBody());
        });

        $reviews    = count($summary->data->reviews[0]->subject_ids);
        $lessons    = count($summary->data->lessons[0]->subject_ids);
        $radicals   = $radicals->total_count;
        $kanji      = $kanji->total_count;
        $vocabulary = $vocabulary->total_count;
        $level      = $user->data->level;

        return view('livewire.wanikani', compact('reviews', 'lessons', 'radicals', 'level', 'kanji', 'vocabulary'));
    }
}
