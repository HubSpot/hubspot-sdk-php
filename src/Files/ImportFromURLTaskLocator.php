<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Information on the task that has been started, and where to check it's status.
 *
 * @phpstan-type ImportFromURLTaskLocatorShape = array{
 *   id: string, links: array<string,string>
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
     * @var array<string,string> $links
     */
    #[Required(map: 'string')]
    public array $links;

    /**
     * `new ImportFromURLTaskLocator()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ImportFromURLTaskLocator::with(id: ..., links: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ImportFromURLTaskLocator)->withID(...)->withLinks(...)
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
     * @param array<string,string> $links
     */
    public static function with(string $id, array $links): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['links'] = $links;

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
