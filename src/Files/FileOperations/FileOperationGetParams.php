<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileOperations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a file by its ID.
 *
 * @see HubspotSDK\Services\Files\FileOperationsService::get()
 *
 * @phpstan-type FileOperationGetParamsShape = array{
 *   properties?: list<string>|null
 * }
 */
final class FileOperationGetParams implements BaseModel
{
    /** @use SdkModel<FileOperationGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string>|null $properties */
    #[Optional(list: 'string')]
    public ?array $properties;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $properties
     */
    public static function with(?array $properties = null): self
    {
        $self = new self;

        null !== $properties && $self['properties'] = $properties;

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
