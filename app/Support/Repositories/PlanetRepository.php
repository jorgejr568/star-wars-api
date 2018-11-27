<?php
/**
 * Created by PhpStorm.
 * User: j
 * Date: 26/11/18
 * Time: 22:19
 */

namespace StarWarsApi\Support\Repositories;


use Carbon\Carbon;
use StarWarsApi\Core\Planet;

class PlanetRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModelClass(Planet::class);

    }

    public function create(Planet $planet){
        return $this->getModel()->insert([
            "name" => $planet->name,
            "climate" => $planet->climate,
            "terrain" => $planet->terrain,
            "created_at" => Carbon::now()
        ]);
    }

    public function delete($id){
        $this->getModel()->where("id",$id)->delete();
    }

    public function find($id){
        /** @var Planet $planet */
        $planet = $this->getModel()->where('id',$id)->first();

        return $this->planetDefaultObject($planet);
    }

    public function list(){
        $planets = $this->getModel()->select([
            'id',
            'name',
            'climate',
            'terrain'
        ])->get()->all();

        $planets = array_map(function(Planet $planet){
            return $this->planetDefaultObject($planet);
        },$planets);

        return $planets;
    }

    private function planetDefaultObject(Planet $planet){
        return [
            "id" => $planet->id,
            "name" => $planet->name,
            "climate" => $planet->climate,
            "terrain" => $planet->terrain,
            "filmsCount" => $planet->getFilmsCount()
        ];
    }
}