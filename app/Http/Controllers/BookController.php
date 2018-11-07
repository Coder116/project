<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User_book;
use DB;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Book::with('users');
        if (auth()->user()->role !== 'admin') {
            $query->whereHas('users');
            $query = $query->get();
        return view('book', ['book'=> $query]);
        }
        $query = $query->get();
        return view('book', ['book'=> $query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {

        if($request->hasFile('image')){
            $file = $request->image;
            $name_image = str_random(32).'.'.$file->getClientOriginalExtension();
            $file->move('images', $name_image);
        }

        $data_input = [ 'title' => $request->input('title'),
                'description' => $request->input('description'),
                'fmd' => $request->input('fmd'),
                'image' => $name_image
            ];

        $book_id = Book::storeBook($data_input);

        User_book::insertBookUserId(['user_id' => Auth::id(), 'book_id' => $book_id]);

        return redirect()->route('book.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $book = Book::getBook($id);
        // // dump($book);
        // return view('edit', compact('book')); //Compact??
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, $id)
    {
        dd(12);
        $data_edit = [ 
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'fmd' => $request->input('fmd'),
                ];
                // dd($data_edit);
        if($request->image){
            $file = $request->image;
            $name_image = str_random(32).'.'.$file->getClientOriginalExtension();
            $file->move('images', $name_image);
            $data_edit['image'] = $name_image;
            // dd($file);
        }


        Book::getBook($id)->update($data_edit);
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::getBook($id)->delete();

        $query = Book::with('users');

        if (auth()->user()->role !== 'admin') {

            $query->whereHas('users');
            $query = $query->get();

        return view('table', ['book'=> $query]);
        }

        $query = $query->get();
        return view('table', ['book'=> $query]);

        // return response()->json(['success' => 'Done!']);
    }
}
