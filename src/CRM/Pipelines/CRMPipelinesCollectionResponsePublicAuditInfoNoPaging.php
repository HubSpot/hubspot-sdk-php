<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type crm_pipelines_collection_response_public_audit_info_no_paging = array{
 *   results: list<CRMPipelinesPublicAuditInfo>
 * }
 */
final class CRMPipelinesCollectionResponsePublicAuditInfoNoPaging implements BaseModel, ResponseConverter
{
    /**
     * @use SdkModel<crm_pipelines_collection_response_public_audit_info_no_paging>
     */
    use SdkModel;

    use SdkResponse;

    /** @var list<CRMPipelinesPublicAuditInfo> $results */
    #[Api(list: CRMPipelinesPublicAuditInfo::class)]
    public array $results;

    /**
     * `new CRMPipelinesCollectionResponsePublicAuditInfoNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPipelinesCollectionResponsePublicAuditInfoNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPipelinesCollectionResponsePublicAuditInfoNoPaging)->withResults(...)
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
     * @param list<CRMPipelinesPublicAuditInfo> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<CRMPipelinesPublicAuditInfo> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
