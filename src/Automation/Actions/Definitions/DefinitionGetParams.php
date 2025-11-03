<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Definitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a custom workflow action definition by ID.
 *
 * @see HubspotSDK\Automation\Actions\Definitions->get
 *
 * @phpstan-type DefinitionGetParamsShape = array{appID: int, archived?: bool}
 */
final class DefinitionGetParams implements BaseModel
{
    /** @use SdkModel<DefinitionGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->appID = $appID;

        null !== $archived && $obj->archived = $archived;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }
}
