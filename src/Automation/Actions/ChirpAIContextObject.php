<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\ChirpAIContextObject\UnstructuredSource;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ComplianceIDsShape from \HubspotSDK\Automation\Actions\ComplianceIDs
 *
 * @phpstan-type ChirpAIContextObjectShape = array{
 *   applicationGroup: string,
 *   applicationID: string,
 *   metadata: array<string,string>,
 *   otelContextHolder: array<string,string>,
 *   unstructuredSources: list<UnstructuredSource|value-of<UnstructuredSource>>,
 *   complianceIDs?: null|ComplianceIDs|ComplianceIDsShape,
 *   featureID?: string|null,
 *   inferenceID?: string|null,
 *   trajectoryID?: string|null,
 * }
 */
final class ChirpAIContextObject implements BaseModel
{
    /** @use SdkModel<ChirpAIContextObjectShape> */
    use SdkModel;

    #[Required]
    public string $applicationGroup;

    #[Required('applicationId')]
    public string $applicationID;

    /** @var array<string,string> $metadata */
    #[Required(map: 'string')]
    public array $metadata;

    /** @var array<string,string> $otelContextHolder */
    #[Required(map: 'string')]
    public array $otelContextHolder;

    /** @var list<value-of<UnstructuredSource>> $unstructuredSources */
    #[Required(list: UnstructuredSource::class)]
    public array $unstructuredSources;

    #[Optional('complianceIds')]
    public ?ComplianceIDs $complianceIDs;

    #[Optional('featureId')]
    public ?string $featureID;

    #[Optional('inferenceId')]
    public ?string $inferenceID;

    #[Optional('trajectoryId')]
    public ?string $trajectoryID;

    /**
     * `new ChirpAIContextObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChirpAIContextObject::with(
     *   applicationGroup: ...,
     *   applicationID: ...,
     *   metadata: ...,
     *   otelContextHolder: ...,
     *   unstructuredSources: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChirpAIContextObject)
     *   ->withApplicationGroup(...)
     *   ->withApplicationID(...)
     *   ->withMetadata(...)
     *   ->withOtelContextHolder(...)
     *   ->withUnstructuredSources(...)
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
     * @param array<string,string> $metadata
     * @param array<string,string> $otelContextHolder
     * @param list<UnstructuredSource|value-of<UnstructuredSource>> $unstructuredSources
     * @param ComplianceIDs|ComplianceIDsShape|null $complianceIDs
     */
    public static function with(
        string $applicationGroup,
        string $applicationID,
        array $metadata,
        array $otelContextHolder,
        array $unstructuredSources,
        ComplianceIDs|array|null $complianceIDs = null,
        ?string $featureID = null,
        ?string $inferenceID = null,
        ?string $trajectoryID = null,
    ): self {
        $self = new self;

        $self['applicationGroup'] = $applicationGroup;
        $self['applicationID'] = $applicationID;
        $self['metadata'] = $metadata;
        $self['otelContextHolder'] = $otelContextHolder;
        $self['unstructuredSources'] = $unstructuredSources;

        null !== $complianceIDs && $self['complianceIDs'] = $complianceIDs;
        null !== $featureID && $self['featureID'] = $featureID;
        null !== $inferenceID && $self['inferenceID'] = $inferenceID;
        null !== $trajectoryID && $self['trajectoryID'] = $trajectoryID;

        return $self;
    }

    public function withApplicationGroup(string $applicationGroup): self
    {
        $self = clone $this;
        $self['applicationGroup'] = $applicationGroup;

        return $self;
    }

    public function withApplicationID(string $applicationID): self
    {
        $self = clone $this;
        $self['applicationID'] = $applicationID;

        return $self;
    }

    /**
     * @param array<string,string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * @param array<string,string> $otelContextHolder
     */
    public function withOtelContextHolder(array $otelContextHolder): self
    {
        $self = clone $this;
        $self['otelContextHolder'] = $otelContextHolder;

        return $self;
    }

    /**
     * @param list<UnstructuredSource|value-of<UnstructuredSource>> $unstructuredSources
     */
    public function withUnstructuredSources(array $unstructuredSources): self
    {
        $self = clone $this;
        $self['unstructuredSources'] = $unstructuredSources;

        return $self;
    }

    /**
     * @param ComplianceIDs|ComplianceIDsShape $complianceIDs
     */
    public function withComplianceIDs(ComplianceIDs|array $complianceIDs): self
    {
        $self = clone $this;
        $self['complianceIDs'] = $complianceIDs;

        return $self;
    }

    public function withFeatureID(string $featureID): self
    {
        $self = clone $this;
        $self['featureID'] = $featureID;

        return $self;
    }

    public function withInferenceID(string $inferenceID): self
    {
        $self = clone $this;
        $self['inferenceID'] = $inferenceID;

        return $self;
    }

    public function withTrajectoryID(string $trajectoryID): self
    {
        $self = clone $this;
        $self['trajectoryID'] = $trajectoryID;

        return $self;
    }
}
