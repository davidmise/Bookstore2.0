<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Auth;
use App\Models\Authors;
use PharIo\Manifest\Author;

class BooksController extends Controller
{
    public function index()
    {
        //display user input  
        $books = Books::with('genre')->with('author')->get();
        return $books;

        // $books = Authors::with('books')->get();
        // return $books;
    }

    // Create a new book record
    public function create(Request $request)
    {
        // dd($request->all());
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'Author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'price' => 'required|numeric',
            'published_date' => 'required|date',
            'cover_image' => 'required|string',
        ];

        $messages = [
            'title' => 'title must be filled',
            'description' => 'description must be filled',
            'Author_id' => ' Author id  must be filled',
            'genre_id' => 'genre id  must be filled',
            'price' => 'price must be filled',
            'published_date' => 'publisehd date must be filled',
            'cover_image' => 'cover image must be filled',
        ];
    
        $validator = Validator::make($request -> all(), $rules, $messages);
            if($validator -> fails())
            {
                return response() -> json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            
             
        
                $book = Books::create($request->all());
                $author = $request->author->id;
        

                return response()->json([
                    'message' => 'Book created successfully',
                    'status' => true,
                    'book' => $book,
                    // 'user'=> $user,
                    'author'=>$author
                ], 201);
            
  
    }

    // Retrieve a book by ID
    public function show($id)
    {
        $book = Books::find($id);

        if (!$book) {
            return response()->json([
                'status'=>false,
                 'message' => 'Book not found'
                ], 404);
        }

        return response()->json($book); 
    }

    // Update a book by ID
    public function update(Request $request, $id)
    {
        $book = Books::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        // var author_id = localStorage.getItem('author_id');

        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            // Add more validation rules as needed
            'description' => 'required|string',
            'price' => 'required|numeric',
            'cover_image' => 'required|string',
            // 'Author_id' => $author_id
        ]);

        // Update the book record
        $book->update($request->all());

        return response()->json(['message' => 'Book updated successfully']);
    }

    // Delete a book by ID
    public function destroy($id)
    {
        $book = Books::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        // Delete the book record
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
    
    // search books by title

    public function searchBooks(Request $request)
    {
        $searchTerm = $request->input('search_term');
        
        $books = Books::leftJoin('Authors', 'Books.author_id','=','Author.id')
                        ->where(function ($query) use ($searchTerm){
                        $query -> where('Books.title', 'LIKE', "%$searchTerm%")
                        ->orWhere('Authors.name_of_the_Author', 'LIKE', "%$searchTerm%");
                      }) ->get();
        
        return  response()->json([
            'message' => 'Book searched successfully',
            'books'=> $books
        ]);
    }
    // filter books by genre
    public function filterBooks(Request $request)
    {
        $genre = $request->input('genre');
        
        $books = Books::when($genre, function ($query) use ($genre) {
                return $query->where('genre', $genre);
            })
            ->get();
        
        return  response()->json([
            'status'=>true,
            'message' => 'Book created successfully'
        ], 201);
    }

    
}
