<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ImportFromURLTaskLocatorShape = array{
 *   id: string, links?: array<string,string>|null
 * }
 */
final class ImportFromURLTaskLocator implements BaseModel
{
    /** @use SdkModel<ImportFromURLTaskLocatorShape> */
    use SdkModel;

    /**
     * ID of the task.
     */
    #[Required]
    public string $id;

    /**
     * Links for where to check information related to the task. The `status` link gives the URL for where to check the status of the task.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * `new ImportFromURLTaskLocator()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ImportFromURLTaskLocator::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ImportFromURLTaskLocator)->withID(...)
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
     * @param array<string,string>|null $links
     */
    public static function with(string $id, ?array $links = null): self
    {
        $self = new self;

        $self['id'] = $id;

        null !== $links && $self['links'] = $links;

        return $self;
    }

    /**
     * ID of the task.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Links for where to check information related to the task. The `status` link gives the URL for where to check the status of the task.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $self = clone $this;
        $self['links'] = $links;

        return $self;
    }
}
