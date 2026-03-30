<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FilterCreateResponseShape = array{filterID: int}
 */
final class FilterCreateResponse implements BaseModel
{
    /** @use SdkModel<FilterCreateResponseShape> */
    use SdkModel;

    #[Required('filterId')]
    public int $filterID;

    /**
     * `new FilterCreateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilterCreateResponse::with(filterID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilterCreateResponse)->withFilterID(...)
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
    public static function with(int $filterID): self
    {
        $self = new self;

        $self['filterID'] = $filterID;

        return $self;
    }

    public function withFilterID(int $filterID): self
    {
        $self = clone $this;
        $self['filterID'] = $filterID;

        return $self;
    }
}
