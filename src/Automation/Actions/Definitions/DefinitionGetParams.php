<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a custom workflow action definition by ID.
 *
 * @see HubspotSDK\Services\Automation\Actions\DefinitionsService::get()
 *
 * @phpstan-type DefinitionGetParamsShape = array{appID: int, archived?: bool|null}
 */
final class DefinitionGetParams implements BaseModel
{
    /** @use SdkModel<DefinitionGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * `new DefinitionGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionGetParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionGetParams)->withAppID(...)
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
    public static function with(int $appID, ?bool $archived = null): self
    {
        $self = new self;

        $self['appID'] = $appID;

        null !== $archived && $self['archived'] = $archived;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }
}
