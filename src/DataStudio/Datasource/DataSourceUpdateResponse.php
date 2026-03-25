<?php

declare(strict_types=1);

namespace HubspotSDK\DataStudio\Datasource;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataSourceUpdateResponseShape = array{
 *   datasourceID: int, datasourceName: string, previewLink: string
 * }
 */
final class DataSourceUpdateResponse implements BaseModel
{
    /** @use SdkModel<DataSourceUpdateResponseShape> */
    use SdkModel;

    /**
     * The unique identifier for the data source. It is an integer formatted as int64.
     */
    #[Required('datasourceId')]
    public int $datasourceID;

    /**
     * The name of the data source. It is a string.
     */
    #[Required]
    public string $datasourceName;

    /**
     * A URL string that provides a preview link for the data source.
     */
    #[Required]
    public string $previewLink;

    /**
     * `new DataSourceUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DataSourceUpdateResponse::with(
     *   datasourceID: ..., datasourceName: ..., previewLink: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DataSourceUpdateResponse)
     *   ->withDatasourceID(...)
     *   ->withDatasourceName(...)
     *   ->withPreviewLink(...)
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
     */
    public static function with(
        int $datasourceID,
        string $datasourceName,
        string $previewLink
    ): self {
        $self = new self;

        $self['datasourceID'] = $datasourceID;
        $self['datasourceName'] = $datasourceName;
        $self['previewLink'] = $previewLink;

        return $self;
    }

    /**
     * The unique identifier for the data source. It is an integer formatted as int64.
     */
    public function withDatasourceID(int $datasourceID): self
    {
        $self = clone $this;
        $self['datasourceID'] = $datasourceID;

        return $self;
    }

    /**
     * The name of the data source. It is a string.
     */
    public function withDatasourceName(string $datasourceName): self
    {
        $self = clone $this;
        $self['datasourceName'] = $datasourceName;

        return $self;
    }

    /**
     * A URL string that provides a preview link for the data source.
     */
    public function withPreviewLink(string $previewLink): self
    {
        $self = clone $this;
        $self['previewLink'] = $previewLink;

        return $self;
    }
}
