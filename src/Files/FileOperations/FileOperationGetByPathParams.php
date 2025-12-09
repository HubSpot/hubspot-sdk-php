<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileOperations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a file by its path.
 *
 * @see HubspotSDK\Services\Files\FileOperationsService::getByPath()
 *
 * @phpstan-type FileOperationGetByPathParamsShape = array{
 *   properties?: list<string>
 * }
 */
final class FileOperationGetByPathParams implements BaseModel
{
    /** @use SdkModel<FileOperationGetByPathParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Properties to return in the response.
     *
     * @var list<string>|null $properties
     */
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
     * @param list<string> $properties
     */
    public static function with(?array $properties = null): self
    {
        $obj = new self;

        null !== $properties && $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * Properties to return in the response.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}
