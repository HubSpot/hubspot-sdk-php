<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a file by its path.
 *
 * @see HubspotSDK\Services\Files\FilesService::getByPath()
 *
 * @phpstan-type FileGetByPathParamsShape = array{properties?: list<string>|null}
 */
final class FileGetByPathParams implements BaseModel
{
    /** @use SdkModel<FileGetByPathParamsShape> */
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
