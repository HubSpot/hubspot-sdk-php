<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Revisions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a specific revision of a definition by revision ID.
 *
 * @see HubspotSDK\Services\Automation\Actions\RevisionsService::get()
 *
 * @phpstan-type RevisionGetParamsShape = array{appId: int, definitionId: string}
 */
final class RevisionGetParams implements BaseModel
{
    /** @use SdkModel<RevisionGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

    #[Required]
    public string $definitionId;

    /**
     * `new RevisionGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RevisionGetParams::with(appId: ..., definitionId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RevisionGetParams)->withAppID(...)->withDefinitionID(...)
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
    public static function with(int $appId, string $definitionId): self
    {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['definitionId'] = $definitionId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    public function withDefinitionID(string $definitionID): self
    {
        $obj = clone $this;
        $obj['definitionId'] = $definitionID;

        return $obj;
    }
}
