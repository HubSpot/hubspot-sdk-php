<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FilterCreateResponseShape = array{filterID: int}
 */
final class FilterCreateResponse implements BaseModel
{
    /** @use SdkModel<FilterCreateResponseShape> */
    use SdkModel;

    /**
     * The unique identifier for the created filter. It is an integer formatted as int64.
     */
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

    /**
     * The unique identifier for the created filter. It is an integer formatted as int64.
     */
    public function withFilterID(int $filterID): self
    {
        $self = clone $this;
        $self['filterID'] = $filterID;

        return $self;
    }
}
