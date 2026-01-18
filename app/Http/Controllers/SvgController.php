<?php

namespace App\Http\Controllers;
use SVG\SVG;
use SVG\Nodes\Shapes\SVGPath;
use SVG\Nodes\Texts\SVGText;
use Illuminate\Http\Request;

class SvgController extends Controller
{
    //
    // app/Http/Controllers/YourController.php

    public function showSvg()
    {

        
            $employees = [
                [
                    'id' => 1,
                    'name' => 'CEO',
                    'manager_id' => null,
                    'subordinates' => [
                        [
                            'id' => 2,
                            'name' => 'Manager 1',
                            'manager_id' => 1,
                            'subordinates' => [
                                [
                                    'id' => 4,
                                    'name' => 'Employee 1',
                                    'manager_id' => 2,
                                    'subordinates' => []
                                ],
                                [
                                    'id' => 5,
                                    'name' => 'Employee 2',
                                    'manager_id' => 2,
                                    'subordinates' => []
                                ]
                            ]
                        ],
                        [
                            'id' => 3,
                            'name' => 'Manager 2',
                            'manager_id' => 1,
                            'subordinates' => [
                                [
                                    'id' => 6,
                                    'name' => 'Employee 3',
                                    'manager_id' => 3,
                                    'subordinates' => []
                                ]
                            ]
                        ]
                    ]
                ]
            ];
    

        return view('test.testsvg', ['employees' => $employees]);
    }
}
