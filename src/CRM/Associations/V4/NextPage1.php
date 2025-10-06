<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type next_page1 = array{after: string, link?: string}
 */
final class NextPage1 implements BaseModel
{
    /** @use SdkModel<next_page1> */
    use SdkModel;

    #[Api]
    public string $after;

    #[Api(optional: true)]
    public ?string $link;

    /**
     * `new NextPage1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NextPage1::with(after: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NextPage1)->withAfter(...)
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

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withLink(string $link): self
    {
        $obj = clone $this;
        $obj->link = $link;

        return $obj;
    }
}
