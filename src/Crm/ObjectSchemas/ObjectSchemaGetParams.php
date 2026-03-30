<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\ObjectSchemas;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve details of a custom object schema, including its properties and associations, using the object type ID or fully qualified name.
 *
 * @see HubspotSDK\Services\Crm\ObjectSchemasService::get()
 *
 * @phpstan-type ObjectSchemaGetParamsShape = array{
 *   includeAssociationDefinitions?: bool|null,
 *   includeAuditMetadata?: bool|null,
 *   includePropertyDefinitions?: bool|null,
 * }
 */
final class ObjectSchemaGetParams implements BaseModel
{
    /** @use SdkModel<ObjectSchemaGetParamsShape> */
    use SdkModel;
    use SdkParams;

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
        ?bool $includeAssociationDefinitions = null,
        ?bool $includeAuditMetadata = null,
        ?bool $includePropertyDefinitions = null,
    ): self {
        $self = new self;

        null !== $includeAssociationDefinitions && $self['includeAssociationDefinitions'] = $includeAssociationDefinitions;
        null !== $includeAuditMetadata && $self['includeAuditMetadata'] = $includeAuditMetadata;
        null !== $includePropertyDefinitions && $self['includePropertyDefinitions'] = $includePropertyDefinitions;

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
