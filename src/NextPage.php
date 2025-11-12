<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Specifies the paging information needed to retrieve the next set of results in a paginated API response.
 *
 * @phpstan-type NextPageShape = array{after: string, link?: string|null}
 */
final class NextPage implements BaseModel
{
    /** @use SdkModel<NextPageShape> */
    use SdkModel;

    /**
     * A paging cursor token for retrieving subsequent pages.
     */
    #[Api]
    public string $after;

    /**
     * A URL that can be used to retrieve the next page results.
     */
    #[Api(optional: true)]
    public ?string $link;

    /**
     * `new NextPage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NextPage::with(after: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NextPage)->withAfter(...)
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
    public static function with(string $after, ?string $link = null): self
    {
        $obj = new self;

        $obj->after = $after;

        null !== $link && $obj->link = $link;

        return $obj;
    }

    /**
     * A paging cursor token for retrieving subsequent pages.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * A URL that can be used to retrieve the next page results.
     */
    public function withLink(string $link): self
    {
        $obj = clone $this;
        $obj->link = $link;

        return $obj;
    }
}
