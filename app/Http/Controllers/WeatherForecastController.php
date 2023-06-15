<?php

namespace App\Http\Controllers;

use App\Models\AdminQuery;
use App\Models\TarotBackground;
use App\Models\TarotCard;
use App\Models\UserResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RakibDevs\Weather\Weather;

class WeatherForecastController extends Controller
{
    public function weatherDetail()
    {
        // $wt = new Weather();
        // $info = $wt->getCurrentByCity('Lucknow');
        // dd($info);
        $data = Http::withHeaders([
            'X-RapidAPI-Key' => 'b81ccfe416msh4cbdc429674a1a5p1f0391jsn7920d24e62e1',
            'X-RapidAPI-Host' => 'forecast9.p.rapidapi.com'
        ])->get('https://forecast9.p.rapidapi.com/rapidapi/forecast/Lucknow/hourly/');

        return $data->object();
    }

    public function askOpenAi()
    {
        return view('home');
    }

    public function openAiGenerate(Request $request)
    {
        $search = $request->search ?? 'Demo question';

        // Text AI Generation
         $txt_result = $this->textAIGenerate($search);

        //Image AI Generation
        $img_result = $this->imageAIGenerate($search);

        // return response()->json($data['choices'][0]['message'], 200, array(), JSON_PRETTY_PRINT);

        return view('home', compact('txt_result', 'img_result'));
    }

    public function textAIGenerate($search)
    {
        $data = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])
            ->post("https://api.openai.com/v1/chat/completions", [
                "model" => "gpt-3.5-turbo",
                'messages' => [
                    [
                        "role" => "user",
                        "content" => $search
                    ]
                ],
                'temperature' => 0.5,
                "max_tokens" => 200,
                "top_p" => 1.0,
                "frequency_penalty" => 0.52,
                "presence_penalty" => 0.5,
                "stop" => ["11."],
            ])
            ->json();
        dd($data);
        return $data['choices'][0]['message'];
    }

    public function imageAIGenerate($search)
    {
        $data = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])
            ->post("https://api.openai.com/v1/images/generations", [
                "prompt" => $search,
                "n" => 2,
                "size" => "1024x1024"

            ])
            ->json();

            return $data;

    }

    public function adminQuery()
    {
        $data = AdminQuery::get();
        return view('admin', compact('data'));
    }

    public function saveAdminQuery(Request $request)
    {
        // dd($request->all());
        if($request->query2 == 'text'){

            $user = AdminQuery::where('query', 'text')->update([
                't1' => $request->t1,
                't2' => $request->t2
            ]);

            return redirect()->route('adminQuery')->with('toast_success','Admin Query Saved Successfully!');

        }
        elseif($request->query1 == 'picture')
        {
            $user = AdminQuery::where('query', 'picture')->update([
                't1' => $request->t1,
                't2' => $request->t2
            ]);

            return redirect()->route('adminQuery')->with('toast_success','Admin Query Saved Successfully!');
        }
        else{
            dd('else');
        }
    }

    //Tarot Card

    public function askTarot()
    {
        $cards = TarotCard::whereNotNull('card_images')->get()->take(21);
        // dd($cards);
        $tarot_background = TarotBackground::inRandomOrder()->first();
        // dd($tarot_background->background_images);
        return view('ask-tarot-2', compact('cards', 'tarot_background'));
    }

    public function tarotCard(Request $request)
    {
        // dd($request->all());
        $search = $request->search ;
        $card_id = $request->tarot_card_id;
        $cards = TarotCard::find($card_id);
        $total_card_count = $cards->count();

        // Text AI Generation
         $txt_result = $this->textTarotAIGenerate($search, $cards);

        //Image AI Generation
        $img_result = $this->imageTarotAIGenerate($search, $cards);

        $user = UserResponse::create([
            'question' => $search,
            'user_id' => Auth::user()->id,
            'text_answer' => json_encode($txt_result['content']),
            'img_answer' => json_encode($img_result['data']),
        ]);

        // return response()->json($data['choices'][0]['message'], 200, array(), JSON_PRETTY_PRINT);

        return view('tarot-result', compact('txt_result', 'img_result', 'user'));
    }

    public function textTarotAIGenerate($search, $cards)
    {
        $adminQuery = AdminQuery::where('query', 'text')->first();
        $param = $adminQuery->t1.' '.$search.' '.$adminQuery->t2.' '.$cards->name;
        Log::info('textTarotAIGenerate '. $param);
        $data = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . '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',
        ])
            ->post("https://api.openai.com/v1/chat/completions", [
                "model" => "gpt-3.5-turbo",
                'messages' => [
                    [
                        "role" => "user",
                        "content" => $param
                    ]
                ],
                'temperature' => 0.5,
                "max_tokens" => 200,
                "top_p" => 1.0,
                "frequency_penalty" => 0.52,
                "presence_penalty" => 0.5,
                "stop" => ["11."],
            ])
            ->json();

            // dd($data);
        return $data['choices'][0]['message'];
    }

    public function imageTarotAIGenerate($search, $cards)
    {
        $adminQuery = AdminQuery::where('query', 'picture')->first();
        $param = $adminQuery->t1.' - '. $cards->name .' - '.$search.' - '.$cards->meanings;
        Log::info('imageTarotAIGenerate '. $param);
        $data = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . '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',
        ])
            ->post("https://api.openai.com/v1/images/generations", [
                "prompt" => $param,
                "n" => 1,
                "size" => "512x512"

            ])
            ->json();

            return $data;

    }
    public function CardImages()
    {
       $tarotCard = TarotCard::where('status', 1)->where('card_images', '!=', '')->inRandomOrder()->first();
       return response()->json([ 'card' => $tarotCard ]);
    }
    public function userResponse()
    {
        $users = UserResponse::paginate(10);
        return view('user-response', compact('users'));
    }


    public function delUserResponse($id)
    {
        UserResponse::find($id)->delete();
        return redirect()->back()->with('toast_success','Response deleted Successfully!');
    }
}
