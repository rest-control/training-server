<?php

namespace Tests;

use RestControl\TestCase\AbstractTestCase;

class CookieTest extends AbstractTestCase
{
    /**
     * @test(
     *     title="Check response cookies.",
     *     description="Check cookies from example response.",
     *     tags="hasCookie responseCookie"
     * )
     */
    public function exampleResponseCookies()
    {
        return send()
            ->get($this->getVar('training') . '/plain/cookies')
            ->expectedResponse()
            ->hasCookie(
                'test',
                'value'
            )
            ->hasCookie(
                containsString('nother'),
                containsString('ooki')
            );
    }
}