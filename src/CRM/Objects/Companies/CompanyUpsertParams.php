<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Companies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectBatchInputUpsert;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CompanyUpsertParams); // set properties as needed
 * $client->crm.objects.companies->upsert(...$params->toArray());
 * ```
 * Create or update a batch of companies by unique property values.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.companies->upsert(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Companies->upsert
 *
 * @phpstan-type company_upsert_params = array{
 *   inputs: list<CRMObjectsSimplePublicObjectBatchInputUpsert>
 * }
 */
final class CompanyUpsertParams implements BaseModel
{
    /** @use SdkModel<company_upsert_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<CRMObjectsSimplePublicObjectBatchInputUpsert> $inputs */
    #[Api(list: CRMObjectsSimplePublicObjectBatchInputUpsert::class)]
    public array $inputs;

    /**
     * `new CompanyUpsertParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompanyUpsertParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompanyUpsertParams)->withInputs(...)
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
     * @param list<CRMObjectsSimplePublicObjectBatchInputUpsert> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CRMObjectsSimplePublicObjectBatchInputUpsert> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
