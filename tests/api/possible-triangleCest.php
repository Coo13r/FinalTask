<?php

use Codeception\Util\HttpCode;

class possible_triangleCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function TestPossibleTriangle(ApiTester $I)
    {
        $sides = [
            'a' => 1,
            'b' => 2,
            'c' => 3];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $sides);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseContains('{"isPossible":true}');
    }
}
