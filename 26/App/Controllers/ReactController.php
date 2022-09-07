<?php

namespace App\Controllers;

use App\App;
use App\DB\Json;

class ReactController {

    public function list()
    {
        return App::json(Json::connect()->showAll());
    }


    public function store()
    {
        
        $rawData = file_get_contents("php://input");
        $rawData = json_decode($rawData, 1);
        
        Json::connect()->create([
            'type' => $rawData['type'],
            'weight' => $rawData['weight'],
            'tail' => $rawData['tail']
        ]);
        return App::json(['msg' => 'Gyvuliukas '. $rawData['type'] . ' patalintas']);
    }

    public function delete(int $id)
    {
        Json::connect()->delete($id);
        return App::json(['msg' => 'Animal was kicked from zoo']);
    }

    public function update(int $id)
    {
        $rawData =file_get_contents("php://input");
        $rawData = json_decode($rawData, 1);
        Json::connect()->update($id, [
            'type' => $rawData['type'],
            'weight' => $rawData['weight'],
            'tail' =>  $rawData['tail'],
        ]);
        return App::json(['msg' => 'Hello Africa']);
    }

}