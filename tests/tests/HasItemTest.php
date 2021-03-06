<?php

namespace Tests;

use Tests\Objects\UserObject;
use RestControl\TestCase\AbstractTestCase;

class HasItemTest extends AbstractTestCase
{
    /**
     * @test(
     *     title="Find example user.",
     *     description="Find example user with UserObject item validation.",
     *     tags="hasItem validateItem"
     * )
     */
    public function exampleFindUser()
    {
        $userItem = new UserObject();

        return send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->hasItem($userItem);
    }

    /**
     * @test(
     *     title="Find example user with required values.",
     *     description="Find example user with UserObject item validation and few required values.",
     *     tags="hasItem checkValues"
     * )
     */
    public function exampleFindUser1WithRequiredValues()
    {
        $userItem = new UserObject([
            'id'   => 1,
            'name' => 'Leanne Graham',
            'address' => [
                'street' => 'Kulas Light',
                'geo'    => [
                    'lat' => '-37.3159',
                    'lng' => '81.1496',
                ],
            ],
        ]);

        return send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->hasItem($userItem);
    }

    /**
     * @test(
     *     title="Find example user with required values.",
     *     description="Find example user with UserObject item validation only with given values. This test should fail.",
     *     tags="hasItem requiredValues"
     * )
     */
    public function exampleFindUser1WithOnlyGivenRequiredValuesFails()
    {
        $userItem = new UserObject([
            'id'   => 1,
            'name' => 'Leanne Graham',
        ]);

        return send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->hasItem($userItem, null, true);
    }
}