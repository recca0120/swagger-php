<?php declare(strict_types=1);

/**
 * @license Apache 2.0
 */

namespace OpenApi\Attributes;

use OpenApi\Annotations\JsonContent;
use OpenApi\Annotations\MediaType;
use OpenApi\Annotations\XmlContent;
use OpenApi\Generator;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class Response extends \OpenApi\Annotations\Response
{
    /**
     * @param Header[]                                                                 $headers
     * @param MediaType|JsonContent|XmlContent|array<MediaType|JsonContent|XmlContent> $content
     * @param Link[]                                                                   $links
     * @param array<string,string>|null                                                $x
     * @param Attachable[]|null                                                        $attachables
     */
    public function __construct(
        string|null $ref = null,
        int|string $response = null,
        ?string $description = null,
        ?array $headers = null,
        MediaType|JsonContent|XmlContent|array|null $content = null,
        ?array $links = null,
        // annotation
        ?array $x = null,
        ?array $attachables = null
    ) {
        parent::__construct([
            'ref' => $ref ?? Generator::UNDEFINED,
            'response' => $response ?? Generator::UNDEFINED,
            'description' => $description ?? Generator::UNDEFINED,
            'x' => $x ?? Generator::UNDEFINED,
            'value' => $this->combine($headers, $content, $links, $attachables),
        ]);
    }
}
