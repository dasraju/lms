<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuHead;

class HelperController extends Controller
{
    public function change_status( Request $request,$type,$id)
    {
         $status = $request->status;
        switch ($type) {
            case "menuhead":
                $menuhead = MenuHead::where('id', $id)
                ->update(['status' => $status]);
              break;
            case "cat":
              echo "Your favorite color is blue!";
              break;
            case "subcat":
              echo "Your favorite color is green!";
              break;
            default:
              echo "Your favorite color is neither red, blue, nor green!";
          }
          return response()->json(['success'=>'success']);

    }
}
