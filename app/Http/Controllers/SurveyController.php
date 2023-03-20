<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Survey;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SurveyController extends Controller
{
    public function create(Request $request) : JsonResponse {
        try {
            $survey = Survey::create([
                "name" => $request->name,
                "type" => $request->type
            ]);
            return response()->json([
                "status" => true,
                "message" => "sucess",
                "data" => $survey,
            ], 200);
        } catch (Exception $e) {
            return response()->json(
                [
                    "status" =>  false,
                    "message" => "Oops, there was an error"
                ], 500
            );
        }
    }

    public function getSurvey() : JsonResponse {
        try {

            $survey = Survey::latest()->get();
            return response()->json(
                [
                    "status" =>  true,
                    "message" => "success",
                    "data" => $survey
                ], 200
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    "status" =>  false,
                    "message" => "Oops, there was an error"
                ], 500
            );
        }
    }

    public function deleteSurvey($id) : JsonResponse{
        Survey::where("id", $id)->delete();
        return response()->json([
            "status" => true,
            "message" => "Deleted",
        ], 200);
    }

    public function storeQuestion(Request $request) :JsonResponse {

        try {
            //check if survey exist already

            foreach ($request->questions as $key => $value) {
                $count = Question::where(["survey" => $request->survey, "index" => $value['index']])->count();
                if($value['title'] == ""){
                    $title = "";
                }else{
                    $title = $value['title'];
                }
                if($value['description'] == ""){
                    $description = "";
                }else{
                    $description = $value['description'];
                }


                if($count == 0){
                    Question::create([
                        "survey" => $request->survey,
                        "index" => $value['index'],
                        "title" => $title,
                        "description" => $description,
                    ]);
                }else{
                    Question::where(["survey" => $request->survey, "index" => $value['index']])->update([
                        "title" => $title,
                        "description" => $description,
                    ]);
                }
            }

            return response()->json([
                "status" => true,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" => $e->getMessage(),
            ], 500);
        }

    }

    public function getQuestion($id) : JsonResponse{
        try {
            $questions = Question::where("survey",$id)->latest()->get();
            return response()->json([
                "status" => true,
                "data" =>$questions,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" => $e->getMessage(),
            ], 500);
        }
    }
}
