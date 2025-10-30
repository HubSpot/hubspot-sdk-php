<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\PublicFile\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicFileShape = array{
 *   fileID: string,
 *   fileUsageType: string,
 *   type: value-of<Type>,
 *   name?: string,
 *   url?: string,
 * }
 */
final class PublicFile implements BaseModel
{
    /** @use SdkModel<PublicFileShape> */
    use SdkModel;

    #[Api('fileId')]
    public string $fileID;

    #[Api]
    public string $fileUsageType;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $fileID,
        string $fileUsageType,
        Type|string $type = 'FILE',
        ?string $name = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        $obj->fileID = $fileID;
        $obj->fileUsageType = $fileUsageType;
        $obj['type'] = $type;

        null !== $name && $obj->name = $name;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    public function withFileID(string $fileID): self
    {
        $obj = clone $this;
        $obj->fileID = $fileID;

        return $obj;
    }

    public function withFileUsageType(string $fileUsageType): self
    {
        $obj = clone $this;
        $obj->fileUsageType = $fileUsageType;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
