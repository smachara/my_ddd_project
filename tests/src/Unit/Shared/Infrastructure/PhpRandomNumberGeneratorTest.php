<?php declare(strict_types = 1);

namespace MacharaM\Tests\Unit\Shared\Infrastructure;

use MacharaM\Shared\Infrastructure\PhpRandomNumberGenerator;
use PHPUnit\Framework\TestCase;

final class PhpRandomNumberGeneratorTest extends TestCase
{
    private PhpRandomNumberGenerator $phpRandomNumberGenerator;

    protected function setUp(): void
    {
        $this->phpRandomNumberGenerator = new PhpRandomNumberGenerator();
    }

    /** @test */
    public function it_should_generate_a_ramdom_number():void 
    {
        $this->assertIsNumeric($this->phpRandomNumberGenerator->generate());
    }
}
