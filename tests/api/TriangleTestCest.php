<?php

use Codeception\Example;
use Codeception\Util\HttpCode;

class TriangleTestCest
{
    /**
     * @param ApiTester $I
     * @param Example $provider
     *
     * @dataProvider dataProvider
     */

    public function triangleTest(ApiTester $I, Example $provider): void
    {
        $I->sendTriangleSides($provider['sides']);
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }

    protected function dataProvider(): Generator
    {
        yield [
            'sides' => ['a' => 2, 'b' => 3, 'c' => 4],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => true]
        ];
    }
}
