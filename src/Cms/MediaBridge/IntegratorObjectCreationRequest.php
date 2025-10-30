<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\IntegratorObjectCreationRequest\MediaType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegratorObjectCreationRequestShape = array{
 *   mediaTypes: list<value-of<MediaType>>
 * }
 */
final class IntegratorObjectCreationRequest implements BaseModel
{
    /** @use SdkModel<IntegratorObjectCreationRequestShape> */
    use SdkModel;

    /** @var list<value-of<MediaType>> $mediaTypes */
    #[Api(list: MediaType::class)]
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
        $obj = new self;

        $obj['mediaTypes'] = $mediaTypes;

        return $obj;
    }

    /**
     * @param list<MediaType|value-of<MediaType>> $mediaTypes
     */
    public function withMediaTypes(array $mediaTypes): self
    {
        $obj = clone $this;
        $obj['mediaTypes'] = $mediaTypes;

        return $obj;
    }
}
