<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OperationVariants from \HubspotSDK\Crm\Lists\PublicEventFilterMetadata\Operation
 * @phpstan-import-type OperationShape from \HubspotSDK\Crm\Lists\PublicEventFilterMetadata\Operation
 *
 * @phpstan-type PublicEventFilterMetadataShape = array{
 *   operation: OperationShape, property: string
 * }
 */
final class PublicEventFilterMetadata implements BaseModel
{
    /** @use SdkModel<PublicEventFilterMetadataShape> */
    use SdkModel;

    /**
     * Defines the operation to be performed on the property.
     *
     * @var OperationVariants $operation
     */
    #[Required]
    public PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $operation;

    /**
     * Specifies the property on which the operation is to be applied.
     */
    #[Required]
    public string $property;

    /**
     * `new PublicEventFilterMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEventFilterMetadata::with(operation: ..., property: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicEventFilterMetadata)->withOperation(...)->withProperty(...)
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
     * @param OperationShape $operation
     */
    public static function with(
        PublicBoolPropertyOperation|array|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $operation,
        string $property,
    ): self {
        $self = new self;

        $self['operation'] = $operation;
        $self['property'] = $property;

        return $self;
    }

    /**
     * Defines the operation to be performed on the property.
     *
     * @param OperationShape $operation
     */
    public function withOperation(
        PublicBoolPropertyOperation|array|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $operation,
    ): self {
        $self = clone $this;
        $self['operation'] = $operation;

        return $self;
    }

    /**
     * Specifies the property on which the operation is to be applied.
     */
    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }
}
