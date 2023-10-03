<?php

namespace App\Http\Controllers;

use App\Models\book_issue;
use App\Http\Requests\Storebook_issueRequest;
use App\Http\Requests\Updatebook_issueRequest;
use App\Models\auther;
use App\Models\book;
use App\Models\settings;
use App\Models\student;
use \Illuminate\Http\Request;

class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.issueBooks', [
            'books' => book_issue::Paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allBooks = book::all();
        $books = [];
        foreach ($allBooks as $book) {
            $issues_book = book_issue::where('book_id', $book->id)->where('issue_status', 'Y')->get();
            $book->number_copies = $book->number_copies - count($issues_book);
            if ($book->number_copies > 0) {
                array_push($books, $book);
            }
        }
        return view('book.issueBook_add', [
            'students' => student::latest()->get(),
            'books' => $books,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storebook_issueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storebook_issueRequest $request)
    {
        $issue_date = date('Y-m-d');
        $data = book_issue::create($request->validated() + [
            'student_id' => $request->student_id,
            'book_id' => $request->book_id,
            'issue_date' => $issue_date,
            'issue_status' => 'Y',
        ]);
        $data->save();
        $book = book::find($request->book_id);
        $book->status = 'N';
        $book->save();
        return redirect()->route('book_issued');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // calculate the total fine  (total days * fine per day)
        $book = book_issue::where('id',$id)->get()->first();
        return view('book.issueBook_edit', [
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebook_issueRequest  $request
     * @param  \App\Models\book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $book_issue = book_issue::find($id);
        $book_issue->issue_status = 'N';
        $book_issue->return_day = now();
        $book_issue->save();
        $book = book::find($book_issue->book_id);
        $book->status= 'Y';
        $book->save();
        return redirect()->route('book_issued');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        book_issue::find($id)->delete();
        return redirect()->route('book_issued');
    }
}
