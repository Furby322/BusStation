<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorAddRequest;
use App\Http\Requests\AuthorDelRequest;
use App\Http\Requests\BooksSearchRequest;
use App\Http\Requests\BooksDelRequest;
use App\Http\Requests\BooksAddRequest;
use App\Http\Requests\JanrAddRequest;
use App\Http\Requests\JanrDelRequest;
use App\Models\CarPark;
use App\Models\Plot;
use App\Models\Masters;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Autors;
use App\Models\Books;
use App\Models\Janr;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ContactController extends Controller
{
    public function submit(ContactRequest $req)
    {
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->date = $req->input('date');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact')->with('success', 'Сообщение было отправлено!');

    }

    public  function allData()
    {
        return view('messages', ['data' => Contact::all()]);
    }

    public function lol(ContactRequest $req)
    {
        $posts = new Contact();
        $posts->name = $req->input('name');
        return view('contact');
        //return view('contact');
    }

    public function view(ContactRequest $req)
    {
        $view = new Contact();
        $view->fill($req->all());
        return view('contact', ['view' => $view]);
    }

    public function lab2_view()
    {
        $autors = Autors::paginate(1);
        $janr = Janr::all();
        $books = Books::whereBetween('yearW', [1900, 1999])
                        ->orderBy('yearW', 'asc')
                        ->get();
        $books_id_a1 = Books::where('id_author', 1)
                            ->count();
        $books_id_a2 = Books::where('id_author', 2)
                            ->count();
        $books_id_a3 = Books::where('id_author', 3)
                            ->count();
        $books_id_a = [$books_id_a1, $books_id_a2, $books_id_a3];
        $autors_count = Autors::all();
        $aut1 = Autors::find(1);
        $aut2 = Autors::find(2);
        $aut3 = Autors::find(3);
        return view('lab2index', ['autors' => $autors,'janr' => $janr, 'book' => $books, 'aut1' => $aut1, 'aut2' => $aut2, 'aut3' => $aut3, 'book_id_a' => $books_id_a, 'authors_count' => $autors_count]);
    }

    public function gf()
    {

    }

    public function add_author_view()
    {
        return view('add_author');
    }

    public function add_author1_post(AuthorAddRequest $req)
    {
        Autors::create($req->all());

        return redirect()->route('lab2_view')->with('success', 'Автор добавлен!');

    }

    public function del_author_view()
    {
        return view('del_author');
    }

    public function del_author_post(AuthorDelRequest $req)
    {
        Autors::find($req->input('id'))->delete();

        return redirect()->route('lab2_view')->with('success', 'Автор удален!');
    }

    public function search_book_post(BooksSearchRequest $req)
    {
        $word = $req->input('word');
        $search = Books::where('NameBook', 'like' ,'%'.$req->input('word').'%')
                        ->get();
        return view('search_book',['search' => $search, 'word' => $word]);
    }

    public function lab3_index_view()
    {
        return view('lab3_index');
    }

    public function lab3_autors_view()
    {
        $autors = Autors::paginate(1);
        return view('lab3_autors',['autors' => $autors]);
    }

    public function add_author_post(AuthorAddRequest $req)
    {
        Autors::create($req->all());

        return redirect()->route('lab3_autors_view')->with('success', 'Автор добавлен!');

    }

    public function lab3_autors_edit($id)
    {
        $authors = Autors::find($id);

        return view('lab3_autors_edit',['authors' => $authors]);
    }

    public function lab3_autors_update(AuthorAddRequest $req, $id)
    {
        $authors = Autors::find($id);

        $authors->fill($req->all());

        $authors->save();

        return redirect()->route('lab3_autors_view');
    }

    public function lab3_autors_destroy($id)
    {
        Autors::find($id)->delete();

        return redirect()->route('lab3_autors_view');
    }

    public function lab3_books_view(Request $req)
    {
        $books = Books::paginate(2);
        return view('lab3_books',['books' => $books]);
    }

    public function add_books_post(BooksAddRequest $req)
    {
        Books::create($req->all());

        return redirect()->route('lab3_books_view')->with('success', 'Книга добавлена!');

    }

    public function lab3_books_edit($id)
    {
        $books = Books::find($id);

        return view('lab3_books_edit', ['books' => $books]);
    }

    public function lab3_books_update(BooksAddRequest $req, $id)
    {
        $books = Books::find($id);

        $books->fill($req->all());

        $books->save();

        return redirect()->route('lab3_books_view');
    }

    public function lab3_books_destroy($id)
    {
        Books::find($id)->delete();

        return redirect()->route('lab3_books_view');
    }

    public function lab3_janrs_view()
    {
        $janrs = Janr::paginate(1);
        return view('lab3_janrs',['janrs' => $janrs]);
    }

    public function add_janrs_post(JanrAddRequest $req)
    {
        Janr::create($req->all());

        return redirect()->route('lab3_janrs_view')->with('success', 'Жанр добавлен!');

    }

    public function lab3_janrs_edit($id)
    {
        if (Route::has('login'))
        {
            if(Auth::user()->active === 2)
            {
                $janr = Janr::find($id);

                return view('lab3_janrs_edit', ['janrs' => $janr]);
            }
            else
            {
                return view('welcome');
            }
        }
    }

    public function lab3_janrs_update(JanrAddRequest $req, $id)
    {
        $janr = Janr::find($id);

        $janr->fill($req->all());

        $janr->save();

        return redirect()->route('lab3_janrs_view');
    }

    public function lab3_janrs_destroy($id)
    {
        if (Route::has('login'))
        {
            if(Auth::user()->active === 2)
            {
                Janr::find($id)->delete();

                return redirect()->route('lab3_janrs_view');
            }
        }

    }

}
