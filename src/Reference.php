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

namespace CdekSDK\Reference;

use phpDocumentor\Reflection\DocBlockFactory;

abstract class Reference implements \JsonSerializable, \IteratorAggregate
{
    /**
     * @var bool|null
     */
    private $useReflection;

    private function canUseReflection(): bool
    {
        if ($this->useReflection === null) {
            $this->useReflection = class_exists(\ReflectionClassConstant::class);
        }

        return $this->useReflection;
    }

    /**
     * @return \Generator<string, string>
     */
    private function getConstantsFromReflection(): \Generator
    {
        $reflectionClass = new \ReflectionClass($this);
        $consts = $reflectionClass->getReflectionConstants();

        foreach ($consts as $const) {
            yield $const->getName() => $const->getDocComment();
        }
    }

    /**
     * @return \Generator<string, string>
     */
    private function getConstantsFromSourceCode(): \Generator
    {
        $reflectionClass = new \ReflectionClass($this);

        $filename = $reflectionClass->getFileName();
        assert(is_string($filename));

        preg_match_all(':(/\*\*[^/]*/|)\s*const ([^\s]+) =:s', file_get_contents($filename), $constants, PREG_SET_ORDER);

        foreach ($constants as list(, $docComment, $name)) {
            yield $name => $docComment;
        }
    }

    final public function getIterator()
    {
        $constants = $this->canUseReflection() ? $this->getConstantsFromReflection() : $this->getConstantsFromSourceCode();

        $factory = DocBlockFactory::createInstance();

        foreach ($constants as $name => $docblock) {
            $docblock = $factory->create($docblock);

            yield sprintf('%s::%s', static::class, $name) => $docblock->getSummary();
        }
    }

    final public function jsonSerialize()
    {
        return iterator_to_array($this, true);
    }
}
