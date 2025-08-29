<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //$data = Article::query()->get();
       // $data = Article::query()->get('title');
       // $data = Article::query()->find(1);
       // $data = Article::query()->findOrFail(1);
       // $data = Article::query()->create([]);
       // $data = Article::query()->update([]);
       // $data = Article::query()->find(5)?->delete();
       // $data = Article::destroy(5);
       // $data = Article::query()->first();
       // $data = Article::query()->firstOrFail();
       // $data = Article::query()->orderBy('created_at','DESC')->first();
       // $data = Article::query()->latest()->first();
       // $data = Article::query()->oldest()->first();
       // $data = Article::query()->limit(4)->get();
       // $data = Article::query()->take(4)->get();
       // $data = Article::query()->skip(4)->get();
       // $data = Article::query()->paginate(4);
       // $data = Article::query()->simplePaginate(4);
       // $data = Article::query()->count('image');
//        $data = Article::query()
//            ->where('id','>',6)
//            ->orWhere('tilte','foo')
//            ->get();
//        $data = Article::query()
//            ->where([
//                ['id','>',6],
//                ['tilte','foo']
//            ])->get();

 //       $data = Article::query()->whereNull('image')->get();
//        $data = Article::query()->whereNotNull('image')->get();
//        $data = Article::query()->whereTitle('foo')->get();
//        $data = Article::query()->whereDate('created_at','2024/12/10')->get();
//        $data = Article::query()->whereBetween('created_at',['2024/12/10','2024/12/28'])->get();
//        $data = Article::query()->whereIn('id',[1,3,4,5])->first();
//        $data = Article::query()->whereNotIn('id',[1,3,4,5])->exists();

//        $data = Article::query()
//            ->where(function ($query) use ($request) {
//                $query->where('user_id', $request->user()->id)
//                    ->where('title', $request->title);
//            })
//            ->orWhere('body', $request->body)
//            ->get();

//        $data = Article::query()
//            ->whereColumn('updated_at','>', 'created_at')
//            ->get();

//        $data = Article::query()
//            ->where('id','10')
//            ->first()->title;
//        $data = Article::query()
//            ->where('id','10')
//            ->value('title');
//        $data = Article::query()
//            ->where('id','10')
//            ->exists(); // true - false
//
//        $data = Article::query()
//            ->where('id','10')
//            ->doesntExist(); // true - false

//                $data = Article::query()
//                 ->when($request->name,function($q) use ($request){
//                     $q->where('name','like','%'.$request->name.'%');
//                 })
//                 ->get();

//        $data = Article::query()->select('title')->get();
//        $data = Article::query()->get('title');

//          $data = Article::query()->select('user_id',DB::raw('count(*) as total'))->groupBy('user_id')->get();

//        $data = Article::query()->selectRaw('user_id , count(*) as total')->groupBy('user_id')
//            ->having('total', '>', 3)
//            ->orderByDesc('total')
//            ->get();

//        $data = Article::query()
//            ->orderByRaw('length (title) DESC ')
//            ->get();

      //      $articles = Article::query()->get();
//            foreach ($articles as $article) {
//                echo $article->title . "<br>";
//            }
//
//        Article::query()->each(function ($article) {
//            echo $article->title . "<br>";
//        },100);

//           $modified = $articles->map(function ($article) {
//                return [
//                    'id' => $article->id,
//                    'title' => $article->title,
//                ];
//                return $article;
//            });

//        $articles->transform(function ($article) {
//            return [
//                'id' => $article->id,
//                'title' => $article->title,
//                'length'=> strlen($article->title),
//            ];
//            return $article;
//        });

//     $filtered = $articles->filter(function ($article) {
//                return $article->id > 7 ;
//            });

//        $result = $articles->contains(function ($article) {
//            return $article->id === 37 ;
//        });


       // dd($result );

//        $articles = Article::query()->cursor();
//        foreach ($articles as $article) {
//            $article->update([
//
//            ]);
//        }

//        Article::chunk(200, function (Collection $articles) {
//
//            foreach ($articles as $article) {
//
//                $article->update([
//
//            ]);
//
//            }
//
//        });


//        $articles = Article::query()->lazy(200);
//        foreach ($articles as $article) {
//            $article->update([
//
//            ]);
//        }

//        Article::query()->lazy(200)
//        ->each->update([]);

//        $users = User::query()->whereHas('articles',function ($q){
//            $q->where('category_id',21);
//        })->get();

//        $users = User::query()->withCount('articles')->get();
//
//        return $users;

        return view('eloquent');
    }
}
