<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Revisions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a specific revision of a definition by revision ID.
 *
 * @see HubspotSDK\Automation\Actions\Revisions->read
 *
 * @phpstan-type RevisionReadParamsShape = array{appID: int, definitionID: string}
 */
final class RevisionReadParams implements BaseModel
{
    /** @use SdkModel<RevisionReadParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    #[Api]
    public string $definitionID;

    /**
     * `new RevisionReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RevisionReadParams::with(appID: ..., definitionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RevisionReadParams)->withAppID(...)->withDefinitionID(...)
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
    public static function with(int $appID, string $definitionID): self
    {
        $obj = new self;

        $obj->appID = $appID;
        $obj->definitionID = $definitionID;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withDefinitionID(string $definitionID): self
    {
        $obj = clone $this;
        $obj->definitionID = $definitionID;

        return $obj;
    }
}
