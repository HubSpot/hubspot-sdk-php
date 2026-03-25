<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\AuditLogs;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CmsAuditLoggingExportFiltersShape = array{
 *   objectType: list<string>
 * }
 */
final class CmsAuditLoggingExportFilters implements BaseModel
{
    /** @use SdkModel<CmsAuditLoggingExportFiltersShape> */
    use SdkModel;

    /** @var list<string> $objectType */
    #[Required(list: 'string')]
    public array $objectType;

    /**
     * `new CmsAuditLoggingExportFilters()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsAuditLoggingExportFilters::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsAuditLoggingExportFilters)->withObjectType(...)
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
     * @param list<string> $objectType
     */
    public static function with(array $objectType): self
    {
        $self = new self;

        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * @param list<string> $objectType
     */
    public function withObjectType(array $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }
}
