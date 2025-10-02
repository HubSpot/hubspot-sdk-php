<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type previous_page = array{before: string, link?: string}
 */
final class PreviousPage implements BaseModel
{
    /** @use SdkModel<previous_page> */
    use SdkModel;

    #[Api]
    public string $before;

    #[Api(optional: true)]
    public ?string $link;

    /**
     * `new PreviousPage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PreviousPage::with(before: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PreviousPage)->withBefore(...)
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

    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }

    public function withLink(string $link): self
    {
        $obj = clone $this;
        $obj->link = $link;

        return $obj;
    }
}
