<?php

namespace Tests\Provider;

use Gammabeam82\Benchmark\Provider\DataProvider;
use PHPUnit\Framework\TestCase;

class DataProviderTest extends TestCase
{
    private const SIZE = 50;

    /**
     * @var DataProvider
     */
    private $provider;

    public function setUp()
    {
        $this->provider = new DataProvider();
        $this->provider->generateData(self::SIZE);
    }

    public function testData()
    {
        $data = $this->provider->getData();

        $this->assertTrue(is_array($data));
        $this->assertEquals(self::SIZE, count($data));
    }
}
