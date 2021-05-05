<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 3/3/2020
 * Time: 11:57 AM
 */

namespace App\Packages;


use App\Models\JbCandidate;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;

class ScanAdapter implements ScanPort
{

	function scanPdf(Request $request,JbCandidate $jbCandidate)
	{

		$parser = new Parser;
		$allowed = ['pdf'];

		if ($request->has('cv_upload') || !is_null($request->cv_upload)) {

			$mime = $request->cv_upload->getClientOriginalextension();

			if (in_array($mime, $allowed)) {


				try{
					$pdf = $parser->parseFile($request->cv_upload->getRealPath());

					$text = $pdf->getText();

					$text =  $this->scanText($text);

					$jbCandidate->cv_string = $text;
				}catch (\Exception $exception){

				}


			}

		}

		return $jbCandidate;

	}



	function scanText($txt)
	{
		$r = [];
		$txt = strtolower($txt);
		for ($c = 0; $c < strlen($txt); $c++) {
			if ($txt[$c] == "," || $txt[$c] == '.') {
				$r[] = "_SPC_";
			} else {
				$r[] = trim($txt[$c]);
			}
		}
		return implode('', $r);
	}


}