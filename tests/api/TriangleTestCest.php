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
        // Testing possible triangle
        yield [
            'sides' => ['a'=>2, 'b'=>3, 'c'=>4],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => true],
        ];

        yield [
            'sides' => ['a'=>2, 'b'=>2, 'c'=>2],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => true],
        ];

        // Testing triangle with number with zero in side
        yield [
            'sides' => ['a'=>10, 'b'=>10, 'c'=>10],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => true],
        ];

        yield [
            'sides' => ['a'=>20, 'b'=>19, 'c'=>21],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => true],
        ];

        yield [
            'sides' => ['a'=>21, 'b'=>20, 'c'=>21],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => true],
        ];

        yield [
            'sides' => ['a'=>15, 'b'=>18, 'c'=>20],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => true],
        ];

        // Testing a triangle for a condition A+B > C
        yield [
            'sides' => ['a'=>5, 'b'=>7, 'c'=>11],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => true],
        ];

        yield [
            'sides' => ['a'=>5, 'b'=>7, 'c'=>12],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => false],
        ];

        yield [
            'sides' => ['a'=>5, 'b'=>7, 'c'=>13],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => false],
        ];

        // Testing a triangle for a condition A-B < C
        yield [
            'sides' => ['a'=>19, 'b'=>7, 'c'=>11],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => false],
        ];

        yield [
            'sides' => ['a'=>19, 'b'=>7, 'c'=>12],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => false],
        ];
        yield [
            'sides' => ['a'=>19, 'b'=>7, 'c'=>13],
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ['isPossible' => true],
        ];

        // Testing triangle with not valid sides
        yield [
            'sides' => ['a'=>0, 'b'=>0, 'c'=>0],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];

        yield [
            'sides' => ['a'=>2, 'b'=>0, 'c'=>2],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];
        yield [
            'sides' => ['a'=>0, 'b'=>1, 'c'=>2],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];
        yield [
            'sides' => ['a'=>2, 'b'=>3, 'c'=>0],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];

        yield [
            'sides' => ['a'=>2, 'b'=>2, 'c'=>-1],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];

        yield [
            'sides' => ['a'=>2, 'b'=>-1, 'c'=>2],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];

        yield [
            'sides' => ['a'=>-1, 'b'=>2, 'c'=>2],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];

        yield [
            'sides' => ['a'=>2, 'b'=>2, 'c'=>'Q'],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];

        yield [
            'sides' => ['a'=>'Z', 'b'=>2, 'c'=>3],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];

        yield [
            'sides' => ['a'=>2, 'b'=>'Z', 'c'=>3],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];

        // Boolean to number conversion
        yield [
            'sides' => ['a'=>3, 'b'=> 3, 'c'=>true],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];

        yield [
            'sides' => ['a'=>3, 'b'=> 3, 'c'=>'true'],
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ['message' => ['error' => 'Not valid date']],
        ];
    }
}
