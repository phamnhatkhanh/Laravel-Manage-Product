<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $products=[];
    protected $group_by_status=[];
    public function index(Request $request)
    {
   

        $group_by_status = DB::table('products')
        ->select('products.status as status',DB::raw('count(products.status) as total'))
        ->orderBy('products.status', 'asc')
        ->groupBy('products.status')
        ->get();

        $products = DB::table('products')->paginate(5);
        return view ('product.dashbroad')->with(['products'=>$products,'group_by_status'=>$group_by_status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = array(
            'title'=> $request->title,
            'price'=>$request->price,
            'description'=>$request->desc,
            'status'=>$request->status,
            'user_id'=>$request->id_user
        );
        // dd($data);
        DB::table('products')->insert($data);

        return \redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $product = DB::table('products')->where('id',$id)->get();
           return view ('product.crud_product')->with(['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           return view ('product.crud_product');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array(
            'title'=> $request->title,
            'price'=>$request->price,
            'description'=>$request->desc,
            'status'=>$request->status,
            'user_id'=>$request->id_user
        );
        // dd($data);
        DB::table('products')
            ->where('id',$id)
            ->limit(1)
            ->update($data);
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect('/product');
    }

    public function filter_product(Request $request){
        $keyword= $request->keyword;
        $status= $request->status;
        $from_price= $request->input('from_price');
        $to_price= $request->input('to_price');
        $errs =array();

        // search name product and description
        if(empty ($from_price) && empty ($to_price) ){
            $products =DB::table('products')
            ->where(function ($query) use($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%');
                })
            ->where('status', 'like', '%' . $status . '%')
             ->paginate(5);

        }else{
            // From_price have value
            if(!empty ($from_price) && empty ($to_price)){

                $products =DB::table('products')
                ->where(function ($query) use($keyword) {
                    $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%');
                })
                ->where('status', 'like', '%' . $status . '%')
                ->where('price','>=',$from_price)
                ->paginate(5);

            // To_price have value
            }elseif(empty ($from_price) && !empty ($to_price)){
                $products =DB::table('products')
                ->where(function ($query) use($keyword) {
                    $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%');
                })
                ->where('status', 'like', '%' . $status . '%')
                ->where('price','<=',$to_price)
                  ->paginate(5);
            // From and To have value
            }else{

                $products =DB::table('products')
                ->where(function ($query) use($keyword) {
                    $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%');
                })
                ->where('status', 'like', '%' . $status . '%')
                ->where('price','>=',$from_price)
                ->where('price','<=',$to_price)
                  ->paginate(5);
            }

        }


        $group_by_status = DB::table('products')
        ->select('products.status as status',DB::raw('count(products.status) as total'))
        ->orderBy('products.status', 'asc')
        ->groupBy('products.status')
        ->get();



      return  view('product.dashbroad')->with(['products'=>$products,'group_by_status'=>$group_by_status]);
    }
}
