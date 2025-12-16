<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch;

use HubspotSDK\Cms\SiteSearch\SiteSearchGetIndexedDataParams\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * For a given account and document ID (page ID, blog post ID, HubDB row ID, etc.), return all indexed data for that document. This is useful when debugging why a particular document is not returned from a custom search.
 *
 * @see HubspotSDK\Services\Cms\SiteSearchService::getIndexedData()
 *
 * @phpstan-type SiteSearchGetIndexedDataParamsShape = array{
 *   type?: null|Type|value-of<Type>
 * }
 */
final class SiteSearchGetIndexedDataParams implements BaseModel
{
    /** @use SdkModel<SiteSearchGetIndexedDataParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The type of document. Can be one of `SITE_PAGE`, `BLOG_POST`, or `KNOWLEDGE_ARTICLE`.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(Type|string|null $type = null): self
    {
        $self = new self;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The type of document. Can be one of `SITE_PAGE`, `BLOG_POST`, or `KNOWLEDGE_ARTICLE`.
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
