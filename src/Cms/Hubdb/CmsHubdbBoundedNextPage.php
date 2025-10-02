<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type cms_hubdb_bounded_next_page = array{offset: int, link?: string}
 */
final class CmsHubdbBoundedNextPage implements BaseModel
{
    /** @use SdkModel<cms_hubdb_bounded_next_page> */
    use SdkModel;

    #[Api]
    public int $offset;

    #[Api(optional: true)]
    public ?string $link;

    /**
     * `new CmsHubdbBoundedNextPage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsHubdbBoundedNextPage::with(offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsHubdbBoundedNextPage)->withOffset(...)
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
     */
    public static function with(int $offset, ?string $link = null): self
    {
        $obj = new self;

        $obj->offset = $offset;

        null !== $link && $obj->link = $link;

        return $obj;
    }

    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }

    public function withLink(string $link): self
    {
        $obj = clone $this;
        $obj->link = $link;

        return $obj;
    }
}
