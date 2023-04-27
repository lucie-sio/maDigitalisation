<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PDOTest extends TestCase
{
    public function testCompanyName(): void
    {


        $greeting = $greeter->greet('Alice');

        $this->assertSame('Hello, Alice!', $greeting);
    }
}