<?php
/**
 * This code is licensed under the MIT License.
 *
 * Copyright (c) 2019 Alexey Kopytko <alexey@kopytko.com> and contributors
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

declare(strict_types=1);

namespace Tests\CdekSDK\Reference;

use Tests\CdekSDK\Reference\Fixtures\ExampleReference;

/**
 * @covers \CdekSDK\Reference\Reference
 */
class ExampleReferenceTest extends TestCase
{
    /**
     * @dataProvider exampleReferences
     */
    public function test_it_can_be_iterated(ExampleReference $ref)
    {
        $this->assertCount(2, $ref);

        $this->assertSame(<<<'JSON'
{
    "1": "Проверка.",
    "2": "Ещё проверка."
}
JSON
, json_encode($ref, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        foreach ($ref as $id => $summary) {
            $this->assertTrue(is_int($id));
            $this->assertGreaterThan(0, $id);
            $this->assertGreaterThan(0, strlen($summary));
        }
    }

    public static function exampleReferences()
    {
        yield 'Standard parser' => [
            new ExampleReference(),
        ];

        if (class_exists(\ReflectionClassConstant::class)) {
            yield 'Fallback parser' => [
                self::useFallbackParser(new ExampleReference()),
            ];
        }
    }
}
