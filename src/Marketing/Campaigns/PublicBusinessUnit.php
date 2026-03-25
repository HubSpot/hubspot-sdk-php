<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicBusinessUnitShape = array{id: int}
 */
final class PublicBusinessUnit implements BaseModel
{
    /** @use SdkModel<PublicBusinessUnitShape> */
    use SdkModel;

    /**
     * The unique identifier for the business unit, represented as an integer.
     */
    #[Required]
    public int $id;

    /**
     * `new PublicBusinessUnit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicBusinessUnit::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicBusinessUnit)->withID(...)
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
    public static function with(int $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    /**
     * The unique identifier for the business unit, represented as an integer.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
