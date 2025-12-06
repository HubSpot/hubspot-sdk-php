<?php

declare(strict_types=1);

namespace HubspotSDK\Page\Paging;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type NextShape = array{after?: string|null}
 */
final class Next implements BaseModel
{
    /** @use SdkModel<NextShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $after;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $after = null): self
    {
        $obj = new self;

        null !== $after && $obj['after'] = $after;

        return $obj;
    }

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }
}
