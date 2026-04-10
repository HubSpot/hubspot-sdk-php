<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Conversations\CustomChannels\PublicFile\FileUsageType;
use HubSpotSDK\Conversations\CustomChannels\PublicFile\Type;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicFileShape = array{
 *   fileID: string,
 *   fileUsageType: FileUsageType|value-of<FileUsageType>,
 *   type: Type|value-of<Type>,
 *   name?: string|null,
 *   url?: string|null,
 * }
 */
final class PublicFile implements BaseModel
{
    /** @use SdkModel<PublicFileShape> */
    use SdkModel;

    #[Required('fileId')]
    public string $fileID;

    /** @var value-of<FileUsageType> $fileUsageType */
    #[Required(enum: FileUsageType::class)]
    public string $fileUsageType;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $url;

    /**
     * `new PublicFile()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicFile::with(fileID: ..., fileUsageType: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicFile)->withFileID(...)->withFileUsageType(...)->withType(...)
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
     * @param FileUsageType|value-of<FileUsageType> $fileUsageType
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $fileID,
        FileUsageType|string $fileUsageType,
        Type|string $type = 'FILE',
        ?string $name = null,
        ?string $url = null,
    ): self {
        $self = new self;

        $self['fileID'] = $fileID;
        $self['fileUsageType'] = $fileUsageType;
        $self['type'] = $type;

        null !== $name && $self['name'] = $name;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withFileID(string $fileID): self
    {
        $self = clone $this;
        $self['fileID'] = $fileID;

        return $self;
    }

    /**
     * @param FileUsageType|value-of<FileUsageType> $fileUsageType
     */
    public function withFileUsageType(FileUsageType|string $fileUsageType): self
    {
        $self = clone $this;
        $self['fileUsageType'] = $fileUsageType;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
