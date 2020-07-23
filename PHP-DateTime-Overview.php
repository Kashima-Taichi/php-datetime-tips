<?php

/*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
|
| 現在の年月日時間を返す
| 任意の年月日時間を返す
| timezoneの取得・設定
| format()によるいろいろな出力形式
| 日付を足したり引いたりする
| 日付を日付の差を算出する
| タイムスタンプの取得
| DateTime と DateTimeImmutable
| 日本語の曜日の設定
|
*/

    function br() {
        echo "<br>";
    }

    /*
    |--------------------------------------------------------------------------
    | 現在の年月日時間を返す
    |--------------------------------------------------------------------------
    */

    br();
    echo "現在の年月日時間を返す";
    br();
    $date = new DateTime();
    echo $date->format('Y-m-d H:i:s');
    br();

    // 7時間遅い時間が返ってくるが、それは時間の設定がXAMPPのデフォルトではドイツの時間に設定されているからである
    // XAMPPのphp.ini内の時間の設定を調べると、 date.timezone=Europe/Berlin になっているのでここを Asia/Tokyo にしてサーバー再起動すると日本の時間が出る

    /*
    |--------------------------------------------------------------------------
    | 任意の年月日時間を返す
    |--------------------------------------------------------------------------
    */

    br();
    // 数値から1
    // setDate()で年月日のみの指定をしているので、時間は現在の時間を返す
    echo "数値から年月日時間を返す";
    br();
    $date = new DateTime();
    $date->setDate(1994, 8, 27);
    echo $date->format('Y-m-d H:i:s');
    br();

    br();
    // 数値から2
    echo "数値から年月日時間を返す2";
    br();
    $date = new DateTime();
    $date->setDate(2014, 8, 1)->setTime(1, 10, 13);
    echo $date->format('Y-m-d H:i:s');
    br();

    br();
    // 文字列から
    echo "文字列から年月日時間を返す";
    br();
    $date = new DateTime('2014-08-01 23:01:05');
    echo $date->format('Y-m-d H:i:s');
    br();

    br();
    // フォーマットから
    echo "フォーマットから年月日時間を返す";
    br();
    $format = 'Y年m月d日 H時i分s秒';
    $date = DateTime::createFromFormat($format, '2014年02月05日 23時11分24秒');
    echo $date->format('Y-m-d H:i:s');
    br();

    /*
    |--------------------------------------------------------------------------
    | timezoneの取得・設定
    |--------------------------------------------------------------------------
    */

    br();
    // タイムゾーンの取得
    echo "タイムゾーンの取得";
    br();
    $date = new DateTime();
    $timezone = $date->getTimezone();
    echo $timezone->getName();
    br();

    br();
    // タイムゾーンの変更
    echo "タイムゾーンの変更";
    br();
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('Europe/London'));
    $timezone = $date->getTimezone();
    echo $timezone->getName();
    br();

    br();
    // 最初からタイムゾーンを指定
    echo "最初からタイムゾーンを指定";
    br();
    $date = new DateTime(null, new DateTimeZone('Antarctica/Syowa'));
    $timezone = $date->getTimezone();
    echo $timezone->getName();
    br();

    /*
    |--------------------------------------------------------------------------
    | format()によるいろいろな出力形式
    |--------------------------------------------------------------------------
    */

    br();
    // format()によるいろいろな出力形式
    echo "《 format()によるいろいろな出力形式 》";
    br();
    $date = new DateTime();
    echo "Y-m-d h:i:s a";
    br();
    echo $date->format('Y-m-d h:i:s a');
    br();
    br();
    echo 'y-F-d D';
    br();
    echo $date->format('y-F-d D');
    br();
    br();
    echo 't';
    br();
    echo $date->format('t');
    br();
    br();
    echo 'DateTime::ATOM';
    br();
    echo $date->format('DateTime::ATOM');
    br();
    br();
    echo 'DateTime::COOKIE';
    br();
    echo $date->format('DateTime::COOKIE');
    br();
    br();
    echo 'DateTime::RSS';
    br();
    echo $date->format('DateTime::RSS');
    br();
    br();
    echo 'DateTime::W3C';
    br();
    echo $date->format('DateTime::W3C');
    br();

    /*
    |--------------------------------------------------------------------------
    | 日付を足したり引いたりする
    |--------------------------------------------------------------------------
    */

    br();
    echo "《 日付を足したり引いたりする 》";
    br();
    echo "1日足す";
    br();
    $date = new DateTime('2000-01-01');
    echo $date->modify('+1 days')->format('Y-m-d H:i:s');
    br();
    br();
    
    echo "1日引く";
    br();
    $date = new DateTime('2000-01-01');
    echo $date->modify('-1 days')->format('Y-m-d H:i:s');
    br();
    br();

    echo '+6 hours';
    br();
    echo $date->modify('+6 hours')->format('Y-m-d H:i:s');
    br();
    br();

    echo '+1 weeks';
    br();
    echo $date->modify('+1 weeks')->format('Y-m-d H:i:s');
    br();
    br();

    echo '+1 months + 2 days + 3 hours';
    br();
    echo $date->modify('+1 months + 2 days + 3 hours')->format('Y-m-d H:i:s');
    br();
    br();

    /*
    |--------------------------------------------------------------------------
    | 日付を日付の差を算出する
    |--------------------------------------------------------------------------
    */

    br();
    echo "《 日付を日付の差を算出する 》";
    br();
    $date1 = new DateTime('1900-01-01');
    $date2 = new DateTime('1900-01-04');
    $diff = $date1->diff($date2);
    echo "1900-01-04 - 1900-01-01";
    br();
    echo $diff->format('%R%a');
    br();
    br();
    echo "1900-01-01 - 1900-01-04";
    br();
    echo $date2->diff($date1)->format('%R%a');
    br();
    br();
    echo "1900-01-01 - 1900-01-04 正の数で表示";
    br();
    echo $date2->diff($date1, true)->format('%R%a');
    br();
    br();
    echo "年月日時間のズレを表示させる";
    br();
    $date1 = new DateTime('2013-05-04 23:34:14');
    $date2 = new DateTime('2014-07-01 10:11:13');
    $diff = $date1->diff($date2);
    echo $diff->format('%R %y年 %mヶ月 %d日 %h時間 %i分 %s秒 ずれています');
    br();

    /*
    |--------------------------------------------------------------------------
    | タイムスタンプの取得
    |--------------------------------------------------------------------------
    */

    br();
    echo "《 タイムスタンプの取得 》";
    br();
    $date = new DateTime();
    echo $date->getTimestamp();
    br();

    /*
    |--------------------------------------------------------------------------
    | DateTime と DateTimeImmutable
    |--------------------------------------------------------------------------
    */

    br();
    echo "《 DateTime と DateTimeImmutable 》";
    br();
    br();
    echo 'DateTime';
    br();
    $date = new DateTime();
    echo $date->format('Y-m-d H:i:s');
    br();
    br();
    echo 'DateTimeImmutable';
    br();
    $date = new DateTimeImmutable();
    echo $date->format('Y-m-d H:i:s');
