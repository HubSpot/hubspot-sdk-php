<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch;

use HubspotSDK\Cms\SiteSearch\IndexedData\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * The indexed data in HubSpot.
 *
 * @phpstan-type IndexedDataShape = array{
 *   id: string, fields: array<string, IndexedField>, type: value-of<Type>
 * }
 */
final class IndexedData implements BaseModel, ResponseConverter
{
    /** @use SdkModel<IndexedDataShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The ID of the document in HubSpot.
     */
    #[Api]
    public string $id;

    /**
     * The indexed fields in HubSpot.
     *
     * @var array<string, IndexedField> $fields
     */
    #[Api(map: IndexedField::class)]
    public array $fields;

    /**
     * The type of document. Can be `SITE_PAGE`, `LANDING_PAGE`, `BLOG_POST`, `LISTING_PAGE`, or `KNOWLEDGE_ARTICLE`.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new IndexedData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IndexedData::with(id: ..., fields: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IndexedData)->withID(...)->withFields(...)->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string, IndexedField> $fields
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        array $fields,
        Type|string $type
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->fields = $fields;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The ID of the document in HubSpot.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The indexed fields in HubSpot.
     *
     * @param array<string, IndexedField> $fields
     */
    public function withFields(array $fields): self
    {
        $obj = clone $this;
        $obj->fields = $fields;

        return $obj;
    }

    /**
     * The type of document. Can be `SITE_PAGE`, `LANDING_PAGE`, `BLOG_POST`, `LISTING_PAGE`, or `KNOWLEDGE_ARTICLE`.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
