<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\IntegratorObjectCreationRequest\MediaType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegratorObjectCreationRequestShape = array{
 *   mediaTypes: list<MediaType|value-of<MediaType>>
 * }
 */
final class IntegratorObjectCreationRequest implements BaseModel
{
    /** @use SdkModel<IntegratorObjectCreationRequestShape> */
    use SdkModel;

    /** @var list<value-of<MediaType>> $mediaTypes */
    #[Required(list: MediaType::class)]
    public array $mediaTypes;

    /**
     * `new IntegratorObjectCreationRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorObjectCreationRequest::with(mediaTypes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorObjectCreationRequest)->withMediaTypes(...)
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
     * @param list<MediaType|value-of<MediaType>> $mediaTypes
     */
    public static function with(array $mediaTypes): self
    {
        $self = new self;

        $self['mediaTypes'] = $mediaTypes;

        return $self;
    }

    /**
     * @param list<MediaType|value-of<MediaType>> $mediaTypes
     */
    public function withMediaTypes(array $mediaTypes): self
    {
        $self = clone $this;
        $self['mediaTypes'] = $mediaTypes;

        return $self;
    }
}
