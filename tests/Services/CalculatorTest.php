namespace App\Tests\Services;

use PHPUnit\Framework\TestsCase;
use App\Services\Calculator;

class CalculatorTest extends TestCase
{
public function testAddition()
{
$calculator = new Calculator();
$this->assertEquals(4, $calculator->add(2, 2));
}
}