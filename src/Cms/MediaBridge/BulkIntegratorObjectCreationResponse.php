<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
    #[Api(map: IntegratorObjectCreationResponse::class)]
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
        $obj = new self;

        $obj->createdObjects = $createdObjects;

        return $obj;
    }

    /**
     * @param array<string,mixed> $createdObjects
     */
    public function withCreatedObjects(array $createdObjects): self
    {
        $obj = clone $this;
        $obj->createdObjects = $createdObjects;

        return $obj;
    }
}
