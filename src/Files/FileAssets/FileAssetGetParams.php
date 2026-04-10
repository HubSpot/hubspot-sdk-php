<?php

declare(strict_types=1);

namespace HubSpotSDK\Files\FileAssets;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a file by its ID.
 *
 * @see HubSpotSDK\Services\Files\FileAssetsService::get()
 *
 * @phpstan-type FileAssetGetParamsShape = array{properties?: list<string>|null}
 */
final class FileAssetGetParams implements BaseModel
{
    /** @use SdkModel<FileAssetGetParamsShape> */
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
