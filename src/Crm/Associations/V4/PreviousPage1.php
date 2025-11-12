<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * specifies the paging information needed to retrieve the previous set of results in a paginated API response.
 *
 * @phpstan-type PreviousPage1Shape = array{before: string, link?: string|null}
 */
final class PreviousPage1 implements BaseModel
{
    /** @use SdkModel<PreviousPage1Shape> */
    use SdkModel;

    /**
     * A paging cursor token for retrieving previous pages.
     */
    #[Api]
    public string $before;

    /**
     * A URL that can be used to retrieve the previous pages' results.
     */
    #[Api(optional: true)]
    public ?string $link;

    /**
     * `new PreviousPage1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PreviousPage1::with(before: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PreviousPage1)->withBefore(...)
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
    public static function with(string $before, ?string $link = null): self
    {
        $obj = new self;

        $obj->before = $before;

        null !== $link && $obj->link = $link;

        return $obj;
    }

    /**
     * A paging cursor token for retrieving previous pages.
     */
    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }

    /**
     * A URL that can be used to retrieve the previous pages' results.
     */
    public function withLink(string $link): self
    {
        $obj = clone $this;
        $obj->link = $link;

        return $obj;
    }
}
