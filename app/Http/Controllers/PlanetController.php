<?php

namespace StarWarsApi\Http\Controllers;

use Illuminate\Http\Request;
use StarWarsApi\Core\Planet;
use StarWarsApi\Support\Repositories\PlanetRepository;

class PlanetController extends Controller
{
    /**
     * @var PlanetRepository
     */
    private $repository;

    /**
     * Create a new controller instance.
     *
     * @param PlanetRepository $repository
     */
    public function __construct(PlanetRepository $repository)
    {
        //
        $this->repository = $repository;
    }

    public function index(){
        return $this->repository->list();
    }

    public function find($id){
        $planet = $this->repository->find($id);

        if(!$planet){
            return response()->json([
                "error" => "Not found Planet"
            ],404);
        }

        return $planet;
    }

    public function delete($id){
        $planet = $this->repository->find($id);

        if(!$planet){
            return response()->json([
                "error" => "Not found Planet"
            ],404);
        }

        $this->repository->delete($planet['id']);

        return response()->json([
            "error" => false
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            "name" => "required|min:3|max:50",
            "climate" => "required|min:3|max:50",
            "terrain" => "required|min:3|max:50"
        ]);

        $this->repository->create(
            (new Planet())
                ->fill($request->only(['name','climate','terrain']))
        );

        return response()->json([
            'error' => false
        ]);
    }
}
