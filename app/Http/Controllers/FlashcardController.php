<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flashcard;
use App\Models\FlashcardTopic;
use Illuminate\Support\Facades\Auth;

class FlashcardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $topics = FlashcardTopic::where('user_id', Auth::id())->with('flashcards')->get();
        return view('dashboard.flashcard', compact('topics'));
    }


    /**
     * new flashcard
     */
    public function store(Request $request)
    {
        $request->validate([
            'topic_id' => 'required|exists:flashcard_topics,id',
            'word' => 'required|string|max:255',
            'meaning' => 'required|string|max:255',
        ]);
        //voice (Google translate)
        $audioUrl = "https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&q=" . urlencode($request->word) . "&tl=en";

        Flashcard::create([
            'topic_id' => $request->topic_id,
            'word' => $request->word,
            'meaning' => $request->meaning,
            'audio_url' => $audioUrl,
        ]);

        return redirect()->back()->with('success', 'Thêm từ vựng thành công!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $flashcard = Flashcard::with('topic')->findOrFail($id);
        return response()->json($flashcard);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'word' => 'required|string|max:255',
            'meaning' => 'required|string|max:255',
        ]);

        $flashcard = Flashcard::findOrFail($id);
        $flashcard->update([
            'word' => $request->word,
            'meaning' => $request->meaning,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flashcard = Flashcard::findOrFail($id);
        $flashcard->delete();

        return redirect()->back()->with('success', 'Đã xóa từ vựng!');
    }
}
