<?php
/**
 * Created by PhpStorm.
 * User: j
 * Date: 26/11/18
 * Time: 22:18
 */

namespace StarWarsApi\Support\Repositories;


use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    private $modelClass;
    private $model;

    public function getModel(): Model
    {
        return $this->model ?: $this->model = new $this->modelClass;
    }

    public function setModelClass($modelClass){
        $this->modelClass = $modelClass;
    }


}