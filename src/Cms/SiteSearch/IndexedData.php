<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch;

use HubspotSDK\Cms\SiteSearch\IndexedData\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The indexed data in HubSpot.
 *
 * @phpstan-import-type IndexedFieldShape from \HubspotSDK\Cms\SiteSearch\IndexedField
 *
 * @phpstan-type IndexedDataShape = array{
 *   id: string,
 *   fields: array<string,IndexedField|IndexedFieldShape>,
 *   type: Type|value-of<Type>,
 * }
 */
final class IndexedData implements BaseModel
{
    /** @use SdkModel<IndexedDataShape> */
    use SdkModel;

    /**
     * The ID of the document in HubSpot.
     */
    #[Required]
    public string $id;

    /**
     * The indexed fields in HubSpot.
     *
     * @var array<string,IndexedField> $fields
     */
    #[Required(map: IndexedField::class)]
    public array $fields;

    /**
     * The type of document. Can be `SITE_PAGE`, `LANDING_PAGE`, `BLOG_POST`, `LISTING_PAGE`, or `KNOWLEDGE_ARTICLE`.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
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
     * @param array<string,IndexedField|IndexedFieldShape> $fields
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        array $fields,
        Type|string $type
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['fields'] = $fields;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The ID of the document in HubSpot.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The indexed fields in HubSpot.
     *
     * @param array<string,IndexedField|IndexedFieldShape> $fields
     */
    public function withFields(array $fields): self
    {
        $self = clone $this;
        $self['fields'] = $fields;

        return $self;
    }

    /**
     * The type of document. Can be `SITE_PAGE`, `LANDING_PAGE`, `BLOG_POST`, `LISTING_PAGE`, or `KNOWLEDGE_ARTICLE`.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
