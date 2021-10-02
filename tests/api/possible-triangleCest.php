<?php

use Codeception\Util\HttpCode;

//class possible_triangleCest
//{
//
//    public function Test1(ApiTester $I)
//    {
//        $sides = [
//            'a' => 1,
//            'b' => 2,
//            'c' => 3];
//        $I->haveHttpHeader('Content-Type', 'application/json');
//        $I->sendGet('/triangle/possible', $sides);
//        $I->seeResponseCodeIs(HttpCode::OK);
//        $I->seeResponseContains('{"isPossible":true}');
//    }
//
//    public function Test2(ApiTester $I)
//    {
//        $sides = [
//            'a' => 15,
//            'b' => 18,
//            'c' => 34];
//        $I->haveHttpHeader('Content-Type', 'application/json');
//        $I->sendGet('/triangle/possible', $sides);
//        $I->seeResponseCodeIs(HttpCode::OK);
//        $I->seeResponseContains('{"isPossible":false}');
//    }
//
//    public function Test3(ApiTester $I)
//    {
//        $sides = [
//            'a' => 0,
//            'b' => 0,
//            'c' => 1];
//        $I->haveHttpHeader('Content-Type', 'application/json');
//        $I->sendGet('/triangle/possible', $sides);
//        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
//        $I->seeResponseContains('"message":{"error":"Not valid date"}');
//    }
//
//    public function Test4(ApiTester $I)
//    {
//        $sides = [
//            'a' => 1,
//            'b' => 1,
//            'c' => 0];
//        $I->haveHttpHeader('Content-Type', 'application/json');
//        $I->sendGet('/triangle/possible', $sides);
//        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
//        $I->seeResponseContains('"message":{"error":"Not valid date"}');
//    }
//}