<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\Access;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationScope;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationStrategy;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FileImportFromURLAsyncParams); // set properties as needed
 * $client->files.files->importFromURLAsync(...$params->toArray());
 * ```
 * Import file from URL.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files.files->importFromURLAsync(...$params->toArray());`
 *
 * @see HubspotSDK\Files\Files->importFromURLAsync
 *
 * @phpstan-type file_import_from_url_async_params = array{
 *   access: Access|value-of<Access>,
 *   url: string,
 *   duplicateValidationScope?: DuplicateValidationScope|value-of<DuplicateValidationScope>,
 *   duplicateValidationStrategy?: DuplicateValidationStrategy|value-of<DuplicateValidationStrategy>,
 *   expiresAt?: \DateTimeInterface,
 *   folderID?: string,
 *   folderPath?: string,
 *   name?: string,
 *   overwrite?: bool,
 *   ttl?: string,
 * }
 */
final class FileImportFromURLAsyncParams implements BaseModel
{
    /** @use SdkModel<file_import_from_url_async_params> */
    use SdkModel;
    use SdkParams;

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
     * `new FileImportFromURLAsyncParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileImportFromURLAsyncParams::with(access: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FileImportFromURLAsyncParams)->withAccess(...)->withURL(...)
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
