<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\OptionInput;
use HubspotSDK\PropertyCreate;
use HubspotSDK\PropertyCreate\DataSensitivity;
use HubspotSDK\PropertyCreate\FieldType;
use HubspotSDK\PropertyCreate\Type;

/**
 * Create a batch of properties using the same rules as when creating an individual property.
 *
 * @see HubspotSDK\Services\Crm\Properties\BatchService::create()
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   inputs: list<PropertyCreate|array{
 *     fieldType: value-of<FieldType>,
 *     groupName: string,
 *     label: string,
 *     name: string,
 *     type: value-of<Type>,
 *     calculationFormula?: string|null,
 *     dataSensitivity?: value-of<DataSensitivity>|null,
 *     description?: string|null,
 *     displayOrder?: int|null,
 *     externalOptions?: bool|null,
 *     formField?: bool|null,
 *     hasUniqueValue?: bool|null,
 *     hidden?: bool|null,
 *     options?: list<OptionInput>|null,
 *     referencedObjectType?: string|null,
 *   }>,
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PropertyCreate> $inputs */
    #[Required(list: PropertyCreate::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withInputs(...)
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
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
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
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
