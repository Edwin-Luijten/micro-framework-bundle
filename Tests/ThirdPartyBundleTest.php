<?php

/*
 * This file is part of the gnugat/micro-framework-bundle package.
 *
 * (c) Loïc Faugeron <faugeron.loic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\MicroFrameworkBundle\Tests;

use Symfony\Component\HttpFoundation\Request;

class ThirdPartyBundleTest extends \PHPUnit_Framework_TestCase
{
    private $kernel;

    protected function setUp()
    {
        $this->kernel = new \AppKernel('test', false);
        $this->kernel->boot();
    }

    /**
     * @test
     */
    public function it_can_load_bundle_services()
    {
        self::assertTrue($this->kernel->getContainer()->has('app.my_service'));
    }

    /**
     * @test
     */
    public function it_can_load_bundle_controllers()
    {
        $request = Request::create('/?name=igor');

        $response = $this->kernel->handle($request);

        self::assertSame(200, $response->getStatusCode(), $response->getContent());
    }
}
