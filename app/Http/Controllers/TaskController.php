<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    public function getSolution($question)
    {
        if ($question == 1) {
            return $this->firstSolution("http://103.219.147.17/api/json.php");
        } elseif ($question == 2) {
            dd($this->secondSolution(array('0' => 'z1', '1' => 'Z10', '2' => 'z12', '3' => 'Z2', '4' => 'z3')));
        } elseif ($question == 3) {
            return $this->thirdSolution("192.168.0.1");
        } else {
            return abort(404);
        }
    }

    private function firstSolution($url)
    {
        try {
            $response = Http::get($url)->json();
            $data =  $response['data'];
            $data = explode(', ', $data);
            $speeds = [];
            $i = 0;
            foreach ($data as $key => $value) {
                $data =  explode('=', $value);
                if ($data[0] == 'speed') {
                    $speed = $data[1];
                    if ($speed > 60) {
                        array_push($speeds, (int)$speed);
                    }
                }
            }
        } catch (\Throwable $th) {
            return 'Something went wrong';
        }
        return response()->json([
            "Total" => count($speeds),
            "List" => $speeds
        ]);
    }

    private function secondSolution($input)
    {
        try {
            if (!is_array($input)) {
                return 'Invalid Data. Please input an array';
            }
            uasort($input, array($this, 'customSort'));
        } catch (\Throwable $th) {
            return 'Something went wrong';
        }
        return $input;
    }

    private function customSort($a, $b)
    {
        $a = (int) str_replace(["z", "Z"], ["", ""], $a);
        $b = (int) str_replace(["z", "Z"], ["", ""], $b);
        if ($a == $b) return 0;
        return ($a < $b) ? -1 : 1;
    }

    private function thirdSolution($ip)
    {
        try {
            $check = 1;
            for ($i = 0; $i < strlen($ip); $i++) {
                if (!(($ip[$i] >= 0 && $ip[$i] <= 9) || $ip[$i] == '.')) {
                    $check = 0;
                }
            }
            if (strlen($ip) > 15 || strlen($ip) < 7) {
                $check = 0;
            }
            $ipArray = explode(".", $ip);
            if (count($ipArray) !== 4) {
                $check = 0;
            }
            foreach ($ipArray as  $value) {
                if ($value < 0 || $value > 255) {
                    $check = 0;
                }
            }
        } catch (\Throwable $th) {
            return 'Something went wrong';
        }

        return $check ? "TRUE" : "FALSE";
    }
}
