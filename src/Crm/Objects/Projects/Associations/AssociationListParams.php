<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Projects\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Objects\Projects\AssociationsService::list()
 *
 * @phpstan-type AssociationListParamsShape = array{
 *   projectId: string, after?: string, includeFA?: bool, limit?: int
 * }
 */
final class AssociationListParams implements BaseModel
{
    /** @use SdkModel<AssociationListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $projectId;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?bool $includeFA;

    #[Api(optional: true)]
    public ?int $limit;

    /**
     * `new AssociationListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationListParams::with(projectId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationListParams)->withProjectID(...)
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
        string $projectId,
        ?string $after = null,
        ?bool $includeFA = null,
        ?int $limit = null,
    ): self {
        $obj = new self;

        $obj['projectId'] = $projectId;

        null !== $after && $obj['after'] = $after;
        null !== $includeFA && $obj['includeFA'] = $includeFA;
        null !== $limit && $obj['limit'] = $limit;

        return $obj;
    }

    public function withProjectID(string $projectID): self
    {
        $obj = clone $this;
        $obj['projectId'] = $projectID;

        return $obj;
    }

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    public function withIncludeFa(bool $includeFa): self
    {
        $obj = clone $this;
        $obj['includeFA'] = $includeFa;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }
}
