<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicObjectRequestOptionsShape = array{properties: list<string>}
 */
final class PublicObjectRequestOptions implements BaseModel
{
    /** @use SdkModel<PublicObjectRequestOptionsShape> */
    use SdkModel;

    /** @var list<string> $properties */
    #[Required(list: 'string')]
    public array $properties;

    /**
     * `new PublicObjectRequestOptions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicObjectRequestOptions::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicObjectRequestOptions)->withProperties(...)
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
     *
     * @param list<string> $properties
     */
    public static function with(array $properties): self
    {
        $self = new self;

        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
