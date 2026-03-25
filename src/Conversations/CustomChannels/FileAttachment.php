<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\FileAttachment\FileUsageType;
use HubspotSDK\Conversations\CustomChannels\FileAttachment\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FileAttachmentShape = array{
 *   fileID: string,
 *   type: Type|value-of<Type>,
 *   fileUsageType?: null|FileUsageType|value-of<FileUsageType>,
 * }
 */
final class FileAttachment implements BaseModel
{
    /** @use SdkModel<FileAttachmentShape> */
    use SdkModel;

    #[Required('fileId')]
    public string $fileID;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /** @var value-of<FileUsageType>|null $fileUsageType */
    #[Optional(enum: FileUsageType::class)]
    public ?string $fileUsageType;

    /**
     * `new FileAttachment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileAttachment::with(fileID: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FileAttachment)->withFileID(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param FileUsageType|value-of<FileUsageType>|null $fileUsageType
     */
    public static function with(
        string $fileID,
        Type|string $type = 'FILE',
        FileUsageType|string|null $fileUsageType = null,
    ): self {
        $self = new self;

        $self['fileID'] = $fileID;
        $self['type'] = $type;

        null !== $fileUsageType && $self['fileUsageType'] = $fileUsageType;

        return $self;
    }

    public function withFileID(string $fileID): self
    {
        $self = clone $this;
        $self['fileID'] = $fileID;

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

    /**
     * @param FileUsageType|value-of<FileUsageType> $fileUsageType
     */
    public function withFileUsageType(FileUsageType|string $fileUsageType): self
    {
        $self = clone $this;
        $self['fileUsageType'] = $fileUsageType;

        return $self;
    }
}
