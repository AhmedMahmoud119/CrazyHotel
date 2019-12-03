<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function HotelsData()
    {

        $providers = [
            1 => 'BestHotel',
            2 => 'TopHotel',
        ];

        $hotels = [
            [
                'hotel_name' => 'Hotel 1',
                'from_date' => '2011-12-03',
                'to_date' => '1997-05-17',
                'city' => 'AUH',
                'adults_number' => 3,
                'rate' => '*****',
                'fare' => 30,
                'amenities' => ['one', 'tow'],
                'discount' => 2,
                'provider' => $providers[1]
            ],
            [
                'hotel_name' => 'Hotel 2',
                'from_date' => '2011-12-03',
                'to_date' => '1997-05-17',
                'city' => 'AUH',
                'adults_number' => 3,
                'rate' => '*****',
                'fare' => 30,
                'amenities' => ['one', 'tow', 'three'],
                'discount' => 2,
                'provider' => $providers[2]
            ]
        ];

        return $hotels;
    }

    public function OurHotels(Request $request){
        $new_hotels = $this->filter_array($this->HotelsData(),$request->all());
        return json_encode($this->select($new_hotels,['hotel_name','provider','fare','amenities']));
    }

    public function BestHotel(Request $request){
        $new_hotels = $this->filter_array($this->HotelsData(),$request->all(),'BestHotel');
        return json_encode($this->select($new_hotels,['hotel_name','rate','fare','amenities']));
    }

    public function TopHotel(Request $request){
        $new_hotels = $this->filter_array($this->HotelsData(),$request->all(),'TopHotel');
        return json_encode($this->select($new_hotels,['hotel_name','rate','fare','amenities']));
    }


    public function filter_array($array , $condition , $provider = null){
        $foundItems = array();


        foreach($array as $item)
        {
            if(isset($condition['from_date'])) {
                $from_date = strtotime($condition['from_date']);
                $condition['from_date'] = date('Y-m-d', $from_date);
            }
            if(isset($condition['to_date'])) {
                $to_date = strtotime($condition['to_date']);
                $condition['to_date'] = date('Y-m-d', $to_date);
            }

            if(isset($provider)){
                if($item['provider'] == $provider) {
                    $find = TRUE;
                    foreach ($condition as $key => $value) {
                        if (isset($item[$key]) && $item[$key] == $value) {
                            $find = TRUE;
                        } else {
                            $find = FALSE;
                            break;
                        }
                    }
                    if ($find) {
                        array_push($foundItems, $item);
                    }
                }
            }else{
                $find = TRUE;
                foreach ($condition as $key => $value) {
                    if (isset($item[$key]) && $item[$key] == $value) {
                        $find = TRUE;
                    } else {
                        $find = FALSE;
                        break;
                    }
                }
                if ($find) {
                    array_push($foundItems, $item);
                }
            }
        }

        return $foundItems;
    }

    public function select($arrays,$selection_items){
        $items_selected = array();
        foreach ($arrays as $key => $array){
            $new_hotels = collect($array)->only($selection_items);
            array_push($items_selected, $new_hotels);
        }
        return $items_selected;
    }



}
