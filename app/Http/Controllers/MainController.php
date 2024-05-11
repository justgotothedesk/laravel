<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Memo;

class MainController
{
    // 웹 최초 진입시 처리 로직.
    public function index() {
        // $memos = Memo::orderBy('created_at', 'desc')->get();
        // return view('index', ['memos' => $memos]);
        return view('index');
    }

    // create 요청
    public function create() {
        return view('create');
    }

    // create view에서 메모 삽입 요청 시 처리
    public function store(Request $request) {
        // request 객체를 통해 메모 내용 추출
        // validate 메서드를 이용하여 메모 길이가 500이 넘는지 확인
        // 500이 넘어가면 create view에서 에러 반환 및 데이터 미등록
        $content = $request->validate(['content' => 'required:max:500']);

        // memos 테이블에 데이터 삽입
        Memo::create($content);

        return redirect() -> route('index');
    }

    // 메모 수정 요청
    public function edit(Request $request) {
        // request 객체를 통해 수정하고자 하는 ID를 받음
        $memo = Memo::find($request -> id);

        // edit view와 해당 메모를 렌더링, 브라우저 출력
        return view('edit', ['memo' => $memo]);
    }

    // edit view에서 수정된 메모를 적용하는 요청
    public function update(Request $request) {
        // memo 테이블에서 요청 받은 id값의 데이터를 호출
        $memo = Memo::find($request->id);

        // 메모 내용이 500자 이상이 아닌지 확인
        $content = $request->validate(['content' => 'required:max:500']);
        
        // 수정된 메모를 테이블에 적용하고 저장
        $memo->fill($content)->save();

        // index 메서드로 리다이렉트
        return redirect() -> route('index');
    }

    // 메모 삭제 요청
    public function delete(Request $request) {
        // ID를 통한 검색
        $memo = Memo::find($request->id);
        $memo->delete();

        return redirect()->route('index');
    }

}
