<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyCreate\DataSensitivity;
use HubspotSDK\PropertyCreate\FieldType;
use HubspotSDK\PropertyCreate\Type;

/**
 * @phpstan-type BatchInputPropertyCreateShape = array{
 *   inputs: list<PropertyCreate>
 * }
 */
final class BatchInputPropertyCreate implements BaseModel
{
    /** @use SdkModel<BatchInputPropertyCreateShape> */
    use SdkModel;

    /** @var list<PropertyCreate> $inputs */
    #[Required(list: PropertyCreate::class)]
    public array $inputs;

    /**
     * `new BatchInputPropertyCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPropertyCreate::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPropertyCreate)->withInputs(...)
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
     * @param list<PropertyCreate|array{
     *   fieldType: value-of<FieldType>,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   type: value-of<Type>,
     *   calculationFormula?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   description?: string|null,
     *   displayOrder?: int|null,
     *   externalOptions?: bool|null,
     *   formField?: bool|null,
     *   hasUniqueValue?: bool|null,
     *   hidden?: bool|null,
     *   options?: list<OptionInput>|null,
     *   referencedObjectType?: string|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PropertyCreate|array{
     *   fieldType: value-of<FieldType>,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   type: value-of<Type>,
     *   calculationFormula?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   description?: string|null,
     *   displayOrder?: int|null,
     *   externalOptions?: bool|null,
     *   formField?: bool|null,
     *   hasUniqueValue?: bool|null,
     *   hidden?: bool|null,
     *   options?: list<OptionInput>|null,
     *   referencedObjectType?: string|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
