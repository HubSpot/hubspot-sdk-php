<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Projects\Associations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Objects\Projects\AssociationsService::list()
 *
 * @phpstan-type AssociationListParamsShape = array{
 *   projectID: string, after?: string, includeFa?: bool, limit?: int
 * }
 */
final class AssociationListParams implements BaseModel
{
    /** @use SdkModel<AssociationListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $projectID;

    #[Optional]
    public ?string $after;

    #[Optional]
    public ?bool $includeFa;

    #[Optional]
    public ?int $limit;

    /**
     * `new AssociationListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationListParams::with(projectID: ...)
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
        string $projectID,
        ?string $after = null,
        ?bool $includeFa = null,
        ?int $limit = null,
    ): self {
        $self = new self;

        $self['projectID'] = $projectID;

        null !== $after && $self['after'] = $after;
        null !== $includeFa && $self['includeFa'] = $includeFa;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    public function withProjectID(string $projectID): self
    {
        $self = clone $this;
        $self['projectID'] = $projectID;

        return $self;
    }

    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withIncludeFa(bool $includeFa): self
    {
        $self = clone $this;
        $self['includeFa'] = $includeFa;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
