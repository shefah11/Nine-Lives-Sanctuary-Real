<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatController extends Controller
{
    public function getCatsData()
    {
        return [
            'rocket' => [
                'name' => 'Rocket', 'gender' => 'Male', 'age' => '3 months', 'fee' => 'RM80',
                'short_desc' => 'A hyperactive little kitten who loves to zoom around!',
                'long_desc_1' => 'Rocket is a sweet, hyperactive 3-month-old kitten!',
                'long_desc_2' => 'He loves to zoom across rooms and play with toy mice.',
                'images' => ['/images/rocket1.jpg','/images/rocket2.jpg']
            ],
            'emma' => [
                'name' => 'Emma', 'gender' => 'Female', 'age' => '1 year', 'fee' => 'RM80',
                'short_desc' => 'Gentle, curious, and loves nap spots.',
                'long_desc_1' => 'Emma is a lovely 1-year-old female cat!',
                'long_desc_2' => 'She loves exploring with calm curiosity.',
                'images' => ['/images/emma1.jpg','/images/emma2.jpg']
            ],
            'shox' => [
                'name' => 'Shox', 'gender' => 'Male', 'age' => '4 years', 'fee' => 'RM80',
                'short_desc' => 'A mature, confident gentleman.',
                'long_desc_1' => 'Shox is a handsome 4-year-old male cat!',
                'long_desc_2' => 'He loves chin scratches and sunny spots.',
                'images' => ['/images/shox1.jpg','/images/shox2.jpg']
            ],
            'luke' => [
                'name' => 'Luke', 'gender' => 'Male', 'age' => '2 years', 'fee' => 'RM80',
                'short_desc' => 'A goofy, energetic boy!',
                'long_desc_1' => 'Luke is a charming 2-year-old male cat!',
                'long_desc_2' => 'He is incredibly social and loves attention.',
                'images' => ['/images/luke1.jpg','/images/luke2.jpg']
            ],
            'oyen' => [
                'name' => 'Oyen', 'gender' => 'Female', 'age' => '8 years', 'fee' => 'RM80',
                'short_desc' => 'A wise, sweet senior lady.',
                'long_desc_1' => 'Oyen is a beautiful 8-year-old ginger cat!',
                'long_desc_2' => 'She values peace, quiet, and deep comfort.',
                'images' => ['/images/oyen1.jpg','/images/oyen2.jpg']
            ],
            'akiff' => [
                'name' => 'Akiff', 'gender' => 'Male', 'age' => '2 years', 'fee' => 'RM80',
                'short_desc' => 'Intelligent and highly curious.',
                'long_desc_1' => 'Akiff is a clever 2-year-old male cat!',
                'long_desc_2' => 'He loves playing fetch and solving puzzles.',
                'images' => ['/images/akiff1.jpg','/images/akiff2.jpg']
            ],
            'wuteh' => [
                'name' => 'Wuteh', 'gender' => 'Male', 'age' => '5 years', 'fee' => 'RM80',
                'short_desc' => 'The ultimate chill companion.',
                'long_desc_1' => 'Wuteh is a serene 5-year-old male cat!',
                'long_desc_2' => 'He prefers long afternoon naps.',
                'images' => ['/images/wuteh1.jpg','/images/wuteh2.jpg']
            ],
            'yoda' => [
                'name' => 'Yoda', 'gender' => 'Male', 'age' => '1 year', 'fee' => 'RM80',
                'short_desc' => 'A sweet young soul.',
                'long_desc_1' => 'Yoda is a sweet 1-year-old male cat!',
                'long_desc_2' => 'He shows love through gentle nose boops.',
                'images' => ['/images/yoda1.jpg', '/images/yoda2.jpg']
            ]
        ];
    }

    public function index()
    {
        $allCats = $this->getCatsData();
        return view('gallery', compact('allCats'));
    }

    public function show($id)
    {
        $allCats = $this->getCatsData();

        if (!array_key_exists($id, $allCats)) {
            abort(404);
        }

        $cat = $allCats[$id];
        return view('details', compact('cat', 'id'));  // ← IMPORTANT: pass $id
    }

    public function createForm()
    {
        return view('adoption-form');
    }
}