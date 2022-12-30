<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuHead;
use App\Models\PdfFile;
use App\Models\VideoSolution;
use App\Models\ResourceFolderPdf;
use App\Models\ResourcePdf;
use App\Models\User;

class HelperController extends Controller
{
    public function change_status( Request $request,$type,$id,$column)
    {
         $status = $request->status;
         
        switch ($type) {
            case "user":
              $menuhead = User::where('id', $id)
              ->update([$column => $status]);
            break;
            case "menuhead":
                $menuhead = MenuHead::where('id', $id)
                ->update([$column => $status]);
              break;
            case "cat":
              echo "Your favorite color is blue!";
              break;
            case "subcat":
              echo "Your favorite color is green!";
              break;
            case "pdfnote":
              $pdf = PdfFile::where('id', $id)
              ->update([$column => $status]);
              break;
            case "videosolution":
              $pdf = VideoSolution::where('id', $id)
              ->update([$column => $status]);
              break;
            case "folderpdf": 
              $pdf = ResourceFolderPdf::where('id', $id)
              ->update([$column => $status]);
              break;
            case "resourcepdf": 
              $pdf = ResourcePdf::where('id', $id)
              ->update([$column => $status]);
              break;          
            default:
              echo "Your favorite color is neither red, blue, nor green!";
          }
          return response()->json(['success'=>'success']);

    }
}
