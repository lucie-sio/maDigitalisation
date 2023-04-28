<?php 

use PHPUnit\Framework\TestCase;

final class APITest extends TestCase
{
    
    /**
     * @desc Vérifie que la route api renvoi quelque chose
     */
    public function testRouteTest(): void
    {   
        require __DIR__ . "/../api/api.php";
        $api = new API();
        $result = $api->test();

        $this->assertSame('"Ceci est un Test API"', $result);
    }

    /**
     * @desc Vérifie que la route api renvoi du Json
     */
    public function testJson(): void
    {   
        $api = new API();
        $result = $api->test();

        $this->assertJson($result);
    }
}