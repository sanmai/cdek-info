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

use CdekSDK\Reference\OrderStatus;
use CdekSDK\Reference\Reference;

/**
 * @coversNothing
 */
class CommonTest extends TestCase
{
    /**
     * @dataProvider allReferences
     */
    public function test_it_can_contains_expected_number_of_items(Reference $ref, int $count)
    {
        $this->assertCount($count, $ref);

        foreach ($ref as $id => $summary) {
            $this->assertGreaterThan(0, $id);
            $this->assertGreaterThan(0, strlen($summary));
        }
    }

    /**
     * @dataProvider allReferences
     */
    public function test_it_can_contains_expected_number_of_items_with_fallback_parser(Reference $ref, int $count)
    {
        $this->assertCount($count, self::useFallbackParser($ref));
    }

    public static function allReferences()
    {
        yield 'OrderStatus' => [
            new OrderStatus(), 20,
        ];
    }
}
