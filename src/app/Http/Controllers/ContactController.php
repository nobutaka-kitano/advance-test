<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {

        $genders = ['1' => '男性', '2' => '女性', '3' => 'その他'];
        $categories = Category::all();

        return view('index', ['genders' => $genders, 'categories' => $categories]);
        // return view('index');
    }

    public function confirm(Request $request)
    {
        // dd($request);
        // $contact = $request->only([ 'first_name','last_name', 'email', 'tel', 'content', 'gender']);
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);
        // return $contact;
            // カテゴリのIDをリクエストから取得（適切なフィールドを選択）
        $categoryId = $request->input('category_id');

        // カテゴリのデータを取得
        $category = Category::find($categoryId);
        // $contact と $category をビューに渡す
        return view('confirm', compact('contact', 'category'));
    }

    public function store(Request $request)
    {
        $request->only([
            'name' => 'required|string',
            'gender' => 'required|in:1,2,3',
            'email' => 'required|email',
            'tell' => 'required|string',
            'address' => 'required|string',
            'building' => 'required|string',
            'detail' => 'required|string',
        ]);

        $contact = [
            'first_name' => $request->input('first_name', 'DefaultFirstName'),
            'last_name' => $request->input('last_name', 'DefaultLastName'), // リクエストから取得できない場合はデフォルト値を設定

            // 'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'address' => $request->input('address'),
            'building' => $request->input('building'),
            'detail' => $request->input('detail'),
        ];

        // $contactData をデータベースに保存
        Contact::create($contact);

        return view('thanks');
    }

    public function show()
    {

    }

}
