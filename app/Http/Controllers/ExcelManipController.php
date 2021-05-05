<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Excel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');


class ExcelManipController extends Controller
{
    //


    function showForm(Request $request){
//       return view('excel_manip');
        $r = [
            "nwaneshi peter"=>"17PA006",
            "ogidan bayo"=>"17PA009",
            "olorunniyi emmanuel"=>"17PA010",
            "eze victor"=>"17PA002",
            "abdulkarim mohammed"=>"17PA005",
            "awa eke anya"=>"17PA001",
            "ofoma okechukwu"=>"17PA008",
            "ogeah uche"=>"17PA012",
            "oroiwi frank"=>"17PA013",
            "olatunde ayodeji"=>"17PA017",
            "adejumo rotimi"=>"17PA016",
            "odumosu omoyeni"=>"18PA018",
            "omopariola john fatile"=>"18PA019",
            "judith akpan"=>"19PA022",
            "olayinka oladogba"=>"19PA020",
            "ifeoma okechukwu"=>"19PA021",
            "gladys eyeneka"=>"19PA023",
            "pauline aniedi"=>"19PA024",
            "sandra ozuruonye"=>"19PA025",
            "folake adenola"=>"19PA028"
        ];

        $t = $request->name;
        $t = strtolower($t);
        $t = explode(' ', $t);
        $val = '';
        foreach ($r  as $k=>$v){
            $tt = explode(' ', $k);
            $checkCount = count($t);
            $checkAcc = 0;
            foreach ($t as $k1=>$v1){
                if (in_array($v1,$tt)){
                   $checkAcc+=1;
                }
            }

            if ($checkAcc >= $checkCount){
                $val = $v;
            }

        }

        return  $val; //$r[strtolower($request->name)];
    }

    function showFormAction(Request $request){
        $path = $request->file('file');
        $dataModel = new DataModel;
        //selectSheets('NATIONALS PAYROLL-JAN 19')
        $data = Excel::import($dataModel,$path);
        dd($data);
//        $rowCount  = $dataModel->sheets('NATIONALS PAYROLL-JAN 19')->getRowCount();

//        dd($rowCount);
//        dd(123);

        $response = [
            'message'=>'Conversion Done.'
        ];

//        return redirect()->back()->with($response);

    }


}

class DataModel implements ToCollection ,WithHeadingRow {


    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // TODO: Implement collection() method.
//        dump($collection);
//        dd($collection);
        foreach ($collection as $k=>$v){
            dump($v);
        }

    }
}
