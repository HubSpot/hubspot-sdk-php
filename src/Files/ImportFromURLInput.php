<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\ImportFromURLInput\Access;
use HubspotSDK\Files\ImportFromURLInput\DuplicateValidationScope;
use HubspotSDK\Files\ImportFromURLInput\DuplicateValidationStrategy;

/**
 * @phpstan-type import_from_url_input = array{
 *   access: value-of<Access>,
 *   url: string,
 *   duplicateValidationScope?: value-of<DuplicateValidationScope>,
 *   duplicateValidationStrategy?: value-of<DuplicateValidationStrategy>,
 *   expiresAt?: \DateTimeInterface,
 *   folderID?: string,
 *   folderPath?: string,
 *   name?: string,
 *   overwrite?: bool,
 *   ttl?: string,
 * }
 */
final class ImportFromURLInput implements BaseModel
{
    /** @use SdkModel<import_from_url_input> */
    use SdkModel;

    /** @var value-of<Access> $access */
    #[Api(enum: Access::class)]
    public string $access;

    #[Api]
    public string $url;

    /** @var value-of<DuplicateValidationScope>|null $duplicateValidationScope */
    #[Api(enum: DuplicateValidationScope::class, optional: true)]
    public ?string $duplicateValidationScope;

    /**
     * @var value-of<DuplicateValidationStrategy>|null $duplicateValidationStrategy
     */
    #[Api(enum: DuplicateValidationStrategy::class, optional: true)]
    public ?string $duplicateValidationStrategy;

    #[Api(optional: true)]
    public ?\DateTimeInterface $expiresAt;

    #[Api('folderId', optional: true)]
    public ?string $folderID;

    #[Api(optional: true)]
    public ?string $folderPath;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?bool $overwrite;

    #[Api(optional: true)]
    public ?string $ttl;

    /**
     * `new ImportFromURLInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ImportFromURLInput::with(access: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ImportFromURLInput)->withAccess(...)->withURL(...)
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
     * @param Access|value-of<Access> $access
     * @param DuplicateValidationScope|value-of<DuplicateValidationScope> $duplicateValidationScope
     * @param DuplicateValidationStrategy|value-of<DuplicateValidationStrategy> $duplicateValidationStrategy
     */
    public static function with(
        Access|string $access,
        string $url,
        DuplicateValidationScope|string|null $duplicateValidationScope = null,
        DuplicateValidationStrategy|string|null $duplicateValidationStrategy = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $folderID = null,
        ?string $folderPath = null,
        ?string $name = null,
        ?bool $overwrite = null,
        ?string $ttl = null,
    ): self {
        $obj = new self;

        $obj['access'] = $access;
        $obj->url = $url;

        null !== $duplicateValidationScope && $obj['duplicateValidationScope'] = $duplicateValidationScope;
        null !== $duplicateValidationStrategy && $obj['duplicateValidationStrategy'] = $duplicateValidationStrategy;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $folderID && $obj->folderID = $folderID;
        null !== $folderPath && $obj->folderPath = $folderPath;
        null !== $name && $obj->name = $name;
        null !== $overwrite && $obj->overwrite = $overwrite;
        null !== $ttl && $obj->ttl = $ttl;

        return $obj;
    }

    /**
     * @param Access|value-of<Access> $access
     */
    public function withAccess(Access|string $access): self
    {
        $obj = clone $this;
        $obj['access'] = $access;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * @param DuplicateValidationScope|value-of<DuplicateValidationScope> $duplicateValidationScope
     */
    public function withDuplicateValidationScope(
        DuplicateValidationScope|string $duplicateValidationScope
    ): self {
        $obj = clone $this;
        $obj['duplicateValidationScope'] = $duplicateValidationScope;

        return $obj;
    }

    /**
     * @param DuplicateValidationStrategy|value-of<DuplicateValidationStrategy> $duplicateValidationStrategy
     */
    public function withDuplicateValidationStrategy(
        DuplicateValidationStrategy|string $duplicateValidationStrategy
    ): self {
        $obj = clone $this;
        $obj['duplicateValidationStrategy'] = $duplicateValidationStrategy;

        return $obj;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    public function withFolderID(string $folderID): self
    {
        $obj = clone $this;
        $obj->folderID = $folderID;

        return $obj;
    }

    public function withFolderPath(string $folderPath): self
    {
        $obj = clone $this;
        $obj->folderPath = $folderPath;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withOverwrite(bool $overwrite): self
    {
        $obj = clone $this;
        $obj->overwrite = $overwrite;

        return $obj;
    }

    public function withTtl(string $ttl): self
    {
        $obj = clone $this;
        $obj->ttl = $ttl;

        return $obj;
    }
}
