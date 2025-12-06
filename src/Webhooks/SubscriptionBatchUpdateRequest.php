<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscriptionBatchUpdateRequestShape = array{id: int, active: bool}
 */
final class SubscriptionBatchUpdateRequest implements BaseModel
{
    /** @use SdkModel<SubscriptionBatchUpdateRequestShape> */
    use SdkModel;

    #[Api]
    public int $id;

    #[Api]
    public bool $active;

    /**
     * `new SubscriptionBatchUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionBatchUpdateRequest::with(id: ..., active: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionBatchUpdateRequest)->withID(...)->withActive(...)
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
    public static function with(int $id, bool $active): self
    {
        $obj = new self;

        $obj['id'] = $id;
        $obj['active'] = $active;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj['active'] = $active;

        return $obj;
    }
}
