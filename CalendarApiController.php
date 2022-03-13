<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\GoogleCalendar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class DevelCalendarApiController extends Controller
{

    /**
    * カレンダーのイベント一覧を取得
    * $client: Googleクライアント
    */
    public function listCalendarEvents($client) {

        // カレンダーサービス オブジェクトを生成
        $calendarClient = new \Google_Service_Calendar($client);

        $param = array(
            'orderBy' => 'startTime', // 開始日時順にソート
            'maxResults' => 10,
            'singleEvents' => true,
            'timeMin' => date('c')
        );

        // イベント一覧を取得
        $result = $calendarClient->events->listEvents('primary', $param);

        // レスポンスからイベント一覧を取得
        return $result->items;
    }


    public function demo_calendar($client) {
        $eventList = $this->listCalendarEvents($client);
        return view('listcalendar_ok')->with('list',$eventList);
    }

}
