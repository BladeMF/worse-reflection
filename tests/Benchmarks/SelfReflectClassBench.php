<?php

namespace Phpactor\WorseReflection\Tests\Benchmarks;

use Phpactor\WorseReflection\Core\ClassName;

/**
 * @Iterations(5)
 * @Revs(10)
 * @Warmup(1)
 * @OutputTimeUnit("milliseconds", precision=2)
 * @Assert("variant.mode <= baseline.mode +/- 10%")
 * @Assert("variant.mem_peak <= baseline.mem_final +/- 10%")
 */
class SelfReflectClassBench extends BaseBenchCase
{
    public function benchMethodsAndProperties(): void
    {
        $class = $this->getReflector()->reflectClassLike(ClassName::fromString(self::class));

        foreach ($class->methods() as $method) {
            foreach ($method->parameters() as $parameter) {
                $method->inferredReturnTypes();
            }
        }
    }

    public function benchFrames(): void
    {
        $class = $this->getReflector()->reflectClassLike(ClassName::fromString(self::class));

        foreach ($class->methods() as $method) {
            $method->frame();
        }
    }
}
