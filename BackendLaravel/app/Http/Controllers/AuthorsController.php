<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Models\Authors;
    // use AuthorService;
    use GuzzleHttp\Promise\Create;
    use Illuminate\Support\Facades\Validator;
use PharIo\Manifest\Author;

    class AuthorsController extends Controller
    {

        // protected $authorService;

        // public function __construct(AuthorService $authorService = null) {
        //     $this->authorService = $authorService;
        // }
        public function index()
    {
        //display user input
        
        $author = Authors::get();
        return $author;
    }

        // Create a new author record
        public function create(Request $request)
        {

            $rules = [
                'name_of_the_Author' => 'required|string|max:255',
                'biography' => 'required|string',
                'author_birthdate' => 'required|date',
                'nationality' => 'required|string',
                'user_id' => 'required|id'
            ];
    
            $messages = [
                'name_of_the_Author.required' => 'Author must be field',
                'biography.required' => 'Biography must be field',
                'author_birthdate.required' => 'Author birthdate must be field',
                'nationality.required' => 'Nationality must be field',
                'user_id.required' => 'Id must be filled'
            ];
        
            $validator = Validator::make($request -> all(), $rules, $messages);
                if($validator -> fails())
                {
                    return response() -> json([
                        'status' => false,
                        'errors' => $validator->errors()
                    ], 422);
                }
            
            // Validate the incoming request data
            // $validate = $request->validate([
            //     'name_of_the_Author' => 'required|string|max:255',
            //     'biography' => 'required|string',
            //     'author_birthdate' => 'required|date',
            //     'nationality' => 'required|string',
            // ]);

           
            // Create a new author record
            $author = Authors::create($request->all());

            // $author =  $this->authorService->saveAuthor($request->all());


            return response()->json([
                'sucess' => true,
                'message' => 'Author created successfully',
                'Author_id' => $author->id // Include the ID in the response
            ], 200);

        }
    
        // Retrieve an author by ID
        public function show($id)
        {
            $author = Authors::find($id);
    
            if (!$author) {
                return response()->json([
                    'status' => false,
                    'message' => 'Author not found'
                ], 404);
            }
    
            return response()->json($author);
        }
    
        // Update an author by ID
        public function update(Request $request, $id)
        {
            $author = Authors::find($id);
    
            if (!$author) {
                return response()->json([
                    'status' => false,
                    'message' => 'Author not found'], 404);
            }
    
            // Validate the incoming request data
            $request->validate([
                'name_of_the_Author' => 'required|string|max:255',
                // Add more validation rules as needed
                'biography' => 'required|string',
            ]);
    
            // Update the author record
            $author->update($request->all());
    
            return response()->json([
                'status' => true,
                'message' => 'Author updated successfully'
            ]);
        }
    
        // Delete an author by ID
        public function destroy($id)
        {
            $author = Authors::find($id);
    
            if (!$author) {
                return response()->json([
                    'status' =>false,
                    'message' => 'Author not found'
            ], 404);
            }
    
            // Delete the author record
            $author->delete();
    
            return response()->json([
                'status' =>true,
                'message' => 'Author deleted successfully'
            ]);
        }
        public function searchAuthors(Request $request)
        {
            $searchTerm = $request->input('search_term');
            
            $authors = Authors::where('name_of_the_Author', 'LIKE', "%$searchTerm%")
                         ->get();
            
            return  response()->json([
                'message' => 'Authors searched successfully',
                'name_of_the_Author'=> $authors
            ]);
        }
    }
    