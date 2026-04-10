<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BulkIntegratorObjectCreationResponseShape = array{
 *   createdObjects: array<string,mixed>
 * }
 */
final class BulkIntegratorObjectCreationResponse implements BaseModel
{
    /** @use SdkModel<BulkIntegratorObjectCreationResponseShape> */
    use SdkModel;

    /** @var array<string,mixed> $createdObjects */
    #[Required(map: IntegratorObjectCreationResponse::class)]
    public array $createdObjects;

    /**
     * `new BulkIntegratorObjectCreationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BulkIntegratorObjectCreationResponse::with(createdObjects: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BulkIntegratorObjectCreationResponse)->withCreatedObjects(...)
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
     * @param array<string,mixed> $createdObjects
     */
    public static function with(array $createdObjects): self
    {
        $self = new self;

        $self['createdObjects'] = $createdObjects;

        return $self;
    }

    /**
     * @param array<string,mixed> $createdObjects
     */
    public function withCreatedObjects(array $createdObjects): self
    {
        $self = clone $this;
        $self['createdObjects'] = $createdObjects;

        return $self;
    }
}
