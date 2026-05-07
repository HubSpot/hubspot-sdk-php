<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Automation\Actions\ChirpAIContextObject\UnstructuredSource;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ComplianceIDsShape from \HubSpotSDK\Automation\Actions\ComplianceIDs
 *
 * @phpstan-type ChirpAIContextObjectShape = array{
 *   applicationGroup: string,
 *   applicationID: string,
 *   isPrivate: bool,
 *   metadata: array<string,string>,
 *   otelContextHolder: array<string,string>,
 *   unstructuredSources: list<UnstructuredSource|value-of<UnstructuredSource>>,
 *   complianceIDs?: null|ComplianceIDs|ComplianceIDsShape,
 *   conversationID?: string|null,
 *   featureID?: string|null,
 *   inferenceID?: string|null,
 *   trajectoryID?: string|null,
 * }
 */
final class ChirpAIContextObject implements BaseModel
{
    /** @use SdkModel<ChirpAIContextObjectShape> */
    use SdkModel;

    /**
     * The group to which the application belongs.
     */
    #[Required]
    public string $applicationGroup;

    /**
     * The identifier for the application associated with the context.
     */
    #[Required('applicationId')]
    public string $applicationID;

    #[Required]
    public bool $isPrivate;

    /**
     * Additional metadata related to the context, represented as key-value pairs.
     *
     * @var array<string,string> $metadata
     */
    #[Required(map: 'string')]
    public array $metadata;

    /**
     * Holds OpenTelemetry context information as key-value pairs.
     *
     * @var array<string,string> $otelContextHolder
     */
    #[Required(map: 'string')]
    public array $otelContextHolder;

    /** @var list<value-of<UnstructuredSource>> $unstructuredSources */
    #[Required(list: UnstructuredSource::class)]
    public array $unstructuredSources;

    #[Optional('complianceIds')]
    public ?ComplianceIDs $complianceIDs;

    #[Optional('conversationId')]
    public ?string $conversationID;

    /**
     * The identifier for the feature associated with the context.
     */
    #[Optional('featureId')]
    public ?string $featureID;

    /**
     * The identifier for the inference associated with the context.
     */
    #[Optional('inferenceId')]
    public ?string $inferenceID;

    /**
     * The identifier for the trajectory, formatted as a UUID.
     */
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
     *   isPrivate: ...,
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
     *   ->withIsPrivate(...)
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
        bool $isPrivate,
        array $metadata,
        array $otelContextHolder,
        array $unstructuredSources,
        ComplianceIDs|array|null $complianceIDs = null,
        ?string $conversationID = null,
        ?string $featureID = null,
        ?string $inferenceID = null,
        ?string $trajectoryID = null,
    ): self {
        $self = new self;

        $self['applicationGroup'] = $applicationGroup;
        $self['applicationID'] = $applicationID;
        $self['isPrivate'] = $isPrivate;
        $self['metadata'] = $metadata;
        $self['otelContextHolder'] = $otelContextHolder;
        $self['unstructuredSources'] = $unstructuredSources;

        null !== $complianceIDs && $self['complianceIDs'] = $complianceIDs;
        null !== $conversationID && $self['conversationID'] = $conversationID;
        null !== $featureID && $self['featureID'] = $featureID;
        null !== $inferenceID && $self['inferenceID'] = $inferenceID;
        null !== $trajectoryID && $self['trajectoryID'] = $trajectoryID;

        return $self;
    }

    /**
     * The group to which the application belongs.
     */
    public function withApplicationGroup(string $applicationGroup): self
    {
        $self = clone $this;
        $self['applicationGroup'] = $applicationGroup;

        return $self;
    }

    /**
     * The identifier for the application associated with the context.
     */
    public function withApplicationID(string $applicationID): self
    {
        $self = clone $this;
        $self['applicationID'] = $applicationID;

        return $self;
    }

    public function withIsPrivate(bool $isPrivate): self
    {
        $self = clone $this;
        $self['isPrivate'] = $isPrivate;

        return $self;
    }

    /**
     * Additional metadata related to the context, represented as key-value pairs.
     *
     * @param array<string,string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Holds OpenTelemetry context information as key-value pairs.
     *
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

    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    /**
     * The identifier for the feature associated with the context.
     */
    public function withFeatureID(string $featureID): self
    {
        $self = clone $this;
        $self['featureID'] = $featureID;

        return $self;
    }

    /**
     * The identifier for the inference associated with the context.
     */
    public function withInferenceID(string $inferenceID): self
    {
        $self = clone $this;
        $self['inferenceID'] = $inferenceID;

        return $self;
    }

    /**
     * The identifier for the trajectory, formatted as a UUID.
     */
    public function withTrajectoryID(string $trajectoryID): self
    {
        $self = clone $this;
        $self['trajectoryID'] = $trajectoryID;

        return $self;
    }
}
