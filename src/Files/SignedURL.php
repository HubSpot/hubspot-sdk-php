<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type signed_url = array{
 *   expiresAt: \DateTimeInterface,
 *   extension: string,
 *   name: string,
 *   size: int,
 *   type: string,
 *   url: string,
 *   height?: int,
 *   width?: int,
 * }
 */
final class SignedURL implements BaseModel
{
    /** @use SdkModel<signed_url> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $expiresAt;

    #[Api]
    public string $extension;

    #[Api]
    public string $name;

    #[Api]
    public int $size;

    #[Api]
    public string $type;

    #[Api]
    public string $url;

    #[Api(optional: true)]
    public ?int $height;

    #[Api(optional: true)]
    public ?int $width;

    /**
     * `new SignedURL()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SignedURL::with(
     *   expiresAt: ..., extension: ..., name: ..., size: ..., type: ..., url: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SignedURL)
     *   ->withExpiresAt(...)
     *   ->withExtension(...)
     *   ->withName(...)
     *   ->withSize(...)
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
     */
    public static function with(
        \DateTimeInterface $expiresAt,
        string $extension,
        string $name,
        int $size,
        string $type,
        string $url,
        ?int $height = null,
        ?int $width = null,
    ): self {
        $obj = new self;

        $obj->expiresAt = $expiresAt;
        $obj->extension = $extension;
        $obj->name = $name;
        $obj->size = $size;
        $obj->type = $type;
        $obj->url = $url;

        null !== $height && $obj->height = $height;
        null !== $width && $obj->width = $width;

        return $obj;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    public function withExtension(string $extension): self
    {
        $obj = clone $this;
        $obj->extension = $extension;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj->height = $height;

        return $obj;
    }

    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj->width = $width;

        return $obj;
    }
}
