<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\ObjectSchemas;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve all custom object schemas, with options to include property definitions, association definitions, and audit metadata.
 *
 * @see HubspotSDK\Services\Crm\ObjectSchemasService::list()
 *
 * @phpstan-type ObjectSchemaListParamsShape = array{
 *   archived?: bool|null,
 *   includeAssociationDefinitions?: bool|null,
 *   includeAuditMetadata?: bool|null,
 *   includePropertyDefinitions?: bool|null,
 * }
 */
final class ObjectSchemaListParams implements BaseModel
{
    /** @use SdkModel<ObjectSchemaListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?bool $includeAssociationDefinitions;

    #[Optional]
    public ?bool $includeAuditMetadata;

    #[Optional]
    public ?bool $includePropertyDefinitions;

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
        ?bool $archived = null,
        ?bool $includeAssociationDefinitions = null,
        ?bool $includeAuditMetadata = null,
        ?bool $includePropertyDefinitions = null,
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $includeAssociationDefinitions && $self['includeAssociationDefinitions'] = $includeAssociationDefinitions;
        null !== $includeAuditMetadata && $self['includeAuditMetadata'] = $includeAuditMetadata;
        null !== $includePropertyDefinitions && $self['includePropertyDefinitions'] = $includePropertyDefinitions;

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

    public function withIncludeAssociationDefinitions(
        bool $includeAssociationDefinitions
    ): self {
        $self = clone $this;
        $self['includeAssociationDefinitions'] = $includeAssociationDefinitions;

        return $self;
    }

    public function withIncludeAuditMetadata(bool $includeAuditMetadata): self
    {
        $self = clone $this;
        $self['includeAuditMetadata'] = $includeAuditMetadata;

        return $self;
    }

    public function withIncludePropertyDefinitions(
        bool $includePropertyDefinitions
    ): self {
        $self = clone $this;
        $self['includePropertyDefinitions'] = $includePropertyDefinitions;

        return $self;
    }
}
