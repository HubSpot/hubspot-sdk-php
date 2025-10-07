<?php

declare(strict_types=1);

namespace HubspotSDK\CursorURLPage\Paging;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type next_alias = array{link?: string}
 */
final class Next implements BaseModel
{
    /** @use SdkModel<next_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $link;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $link = null): self
    {
        $obj = new self;

        null !== $link && $obj->link = $link;

        return $obj;
    }

    public function withLink(string $link): self
    {
        $obj = clone $this;
        $obj->link = $link;

        return $obj;
    }
}
