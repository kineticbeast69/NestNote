<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use function PHPUnit\Framework\returnArgument;

class NoteController extends Controller
{
    // reading all the notes
    function readNoteHome(Request $request)
    {
        $read_notes = $request->user()->notes;
        return view("index", ["notes" => $read_notes]);

    }

    // adding the notes
    function addNote(Request $request)
    {
        $validate = $request->validate([
            "title" => "required|string|min:5",
            "content" => "required|string|min:10",
            "tags" => "required|string",
        ], [
            "title.required" => "Enter some title please.",
            "title.min" => "Title should have 5 characters.",
            "content.required" => "Enter some content please.",
            "content.min" => "Content should have 10 characters.",
            "tags.required" => "Enter some tags please."
        ]);

        // converting tags string into an array
        $tags_array = $request->filled("tags") ? array_map("trim", explode(", ", $request["tags"])) : [];


        // saving the notes

        $add_notes = $request->user()->notes()->create([
            "title" => $request["title"],
            "content" => $request["content"],
            "tags" => $tags_array,
        ]);


        if (!$add_notes) {
            return back()->with("techError", "Cant' Add the note! Please try again.");
        }
        return redirect()->route("home")->with("AddSuccess", "Note added sucessfully");


    }

    // getting the single notes
    function singleNote($postID)
    {
        $single_note = Note::select(["title", "content", "id"])->where("id", $postID)->first();

        return view("updateNotePage", ["note" => $single_note]);
    }


    // update the form controller
    function updateNoteForm(Request $request, $postID)
    {
        $validate = $request->validate([
            "title" => "required|string|min:5",
            "content" => "required|string|min:10",
        ], [
            "title.required" => "Please enter some title.",
            "title.min" => "Title must have 5 characters.",
            "content.required" => "Please enter some content.",
            "content.min" => "Content must have 10 characters."
        ]);

        // updating the query
        $update_note = Note::where("id", $postID)->update([
            "title" => $request["title"],
            "content" => $request["content"],
        ]);

        if (!$update_note) {
            return redirect()->back()->with("techError", "Can't update the note.");
        }

        return redirect()->route("home")->with("updateSuccess", "Note edited succesfully.");

    }

    // deleting the notes controller
    function deleteNote($postID)
    {
        $deleteNote = Note::where("id", $postID)->delete();
        if (!$deleteNote) {
            return redirect()->route('home')->with('deleteError', 'Failed to delete the note.');

        }
        return redirect()->route('home')->with('deleteSuccess', 'Note deleted successfully.');

    }

    // search query controller
    function searchQuery(Request $request)
    {
        $empty_resposne = $request["query"];
        if (empty($empty_resposne)) {
            return redirect()->route("home");
        }

        $validate = $request->validate([
            "query" => "required|string"
        ]);

        $query = $validate["query"];

        $notes = Note::where('title', 'like', '%' . $query . '%')
            ->orWhere('content', 'like', '%' . $query . '%')
            ->get();

        if (!$notes) {
            return redirect()->route("home")->with("techError", "Can't find the note.");
        }

        return view("index", ["notes" => $notes])->with("backKey", "true");
    }

}
