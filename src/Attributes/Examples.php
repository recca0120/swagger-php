<?php declare(strict_types=1);

/**
 * @license Apache 2.0
 */

namespace OpenApi\Attributes;

use OpenApi\Generator;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY)]
class Examples extends \OpenApi\Annotations\Examples
{
    /**
     * @param array<string,string>|null $x
     * @param Attachable[]|null         $attachables
     */
    public function __construct(
        ?string $example = null,
        ?string $summary = null,
        ?string $description = null,
        int|string|array|null $value = null,
        ?string $externalValue = null,
        string|null $ref = null,
        // annotation
        ?array $x = null,
        ?array $attachables = null
    ) {
        parent::__construct([
            'example' => $example ?? Generator::UNDEFINED,
            'summary' => $summary ?? Generator::UNDEFINED,
            'description' => $description ?? Generator::UNDEFINED,
            'value' => $value ?? Generator::UNDEFINED,
            'externalValue' => $externalValue ?? Generator::UNDEFINED,
            'ref' => $ref ?? Generator::UNDEFINED,
            'x' => $x ?? Generator::UNDEFINED,
        ]);
        if ($attachables) {
            $this->merge($attachables);
        }
    }
}
