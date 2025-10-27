<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicFile\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_file = array{
 *   fileID: string,
 *   fileUsageType: string,
 *   type: value-of<Type>,
 *   url: string,
 *   name?: string,
 * }
 */
final class PublicFile implements BaseModel
{
    /** @use SdkModel<public_file> */
    use SdkModel;

    #[Api('fileId')]
    public string $fileID;

    #[Api]
    public string $fileUsageType;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public string $url;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new PublicFile()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicFile::with(fileID: ..., fileUsageType: ..., type: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicFile)
     *   ->withFileID(...)
     *   ->withFileUsageType(...)
     *   ->withType(...)
     *   ->withURL(...)
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
        string $url,
        Type|string $type = 'FILE',
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj->fileID = $fileID;
        $obj->fileUsageType = $fileUsageType;
        $obj['type'] = $type;
        $obj->url = $url;

        null !== $name && $obj->name = $name;

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

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
