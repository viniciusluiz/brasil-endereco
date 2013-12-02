<?php

namespace Minime\Provedor;

class HttpHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function parseTable()
    {
        $this->assertCount(2,
            HttpHelper::parseTable(
                '<table>
                   <tr>
                      <td>A</td>
                      <td>B</td>
                      <td>C</td>
                      <td>D</td>
                      <td>E</td>
                   </tr>
                </table>
                <table>
                   <tr>
                      <td>1</td>
                      <td>2</td>
                      <td>3</td>
                      <td>4</td>
                      <td>5</td>
                   </tr>
                </table>'
            )
        );
    }

    /**
     * @test
     */
    public function exchangeIndexNumericalByTextual()
    {
        $this->assertCount(0, HttpHelper::exchangeIndexNumericalByTextual(['a','b','c','d','e'], ['a','b','c','d','e']));
        $this->assertCount(1, HttpHelper::exchangeIndexNumericalByTextual([0=>['a','b','c','d','e']], ['a','b','c','d','e']));
    }

}
