<?php

declare(strict_types=1);

namespace HubspotSDK\DataStudio\Datasource;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\DataStudio\Datasource\DataSourceGetResponse\DatasourceType;
use HubspotSDK\DataStudio\Datasource\DataSourceGetResponse\LastIngestionStatus;

/**
 * @phpstan-import-type FileColumnShape from \HubspotSDK\DataStudio\Datasource\FileColumn
 *
 * @phpstan-type DataSourceGetResponseShape = array{
 *   columns: list<FileColumn|FileColumnShape>,
 *   createdAt: string,
 *   datasourceID: int,
 *   datasourceName: string,
 *   datasourceType: DatasourceType|value-of<DatasourceType>,
 *   lastIngestionStatus: LastIngestionStatus|value-of<LastIngestionStatus>,
 * }
 */
final class DataSourceGetResponse implements BaseModel
{
    /** @use SdkModel<DataSourceGetResponseShape> */
    use SdkModel;

    /**
     * An array of FileColumn objects representing the columns in the data source.
     *
     * @var list<FileColumn> $columns
     */
    #[Required(list: FileColumn::class)]
    public array $columns;

    /**
     * The creation date and time of the data source, represented as a string.
     */
    #[Required]
    public string $createdAt;

    /**
     * The unique identifier for the data source, represented as a 64-bit integer.
     */
    #[Required('datasourceId')]
    public int $datasourceID;

    /**
     * The name of the data source, represented as a string.
     */
    #[Required]
    public string $datasourceName;

    /**
     * The type of the data source, which is a string with a valid value of 'FILE'.
     *
     * @var value-of<DatasourceType> $datasourceType
     */
    #[Required(enum: DatasourceType::class)]
    public string $datasourceType;

    /**
     * The status of the last data ingestion process, represented as a string. Valid values include 'SUCCESSFUL', 'IN_PROGRESS', and 'FAILED'.
     *
     * @var value-of<LastIngestionStatus> $lastIngestionStatus
     */
    #[Required(enum: LastIngestionStatus::class)]
    public string $lastIngestionStatus;

    /**
     * `new DataSourceGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DataSourceGetResponse::with(
     *   columns: ...,
     *   createdAt: ...,
     *   datasourceID: ...,
     *   datasourceName: ...,
     *   datasourceType: ...,
     *   lastIngestionStatus: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DataSourceGetResponse)
     *   ->withColumns(...)
     *   ->withCreatedAt(...)
     *   ->withDatasourceID(...)
     *   ->withDatasourceName(...)
     *   ->withDatasourceType(...)
     *   ->withLastIngestionStatus(...)
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
     * @param list<FileColumn|FileColumnShape> $columns
     * @param DatasourceType|value-of<DatasourceType> $datasourceType
     * @param LastIngestionStatus|value-of<LastIngestionStatus> $lastIngestionStatus
     */
    public static function with(
        array $columns,
        string $createdAt,
        int $datasourceID,
        string $datasourceName,
        DatasourceType|string $datasourceType,
        LastIngestionStatus|string $lastIngestionStatus,
    ): self {
        $self = new self;

        $self['columns'] = $columns;
        $self['createdAt'] = $createdAt;
        $self['datasourceID'] = $datasourceID;
        $self['datasourceName'] = $datasourceName;
        $self['datasourceType'] = $datasourceType;
        $self['lastIngestionStatus'] = $lastIngestionStatus;

        return $self;
    }

    /**
     * An array of FileColumn objects representing the columns in the data source.
     *
     * @param list<FileColumn|FileColumnShape> $columns
     */
    public function withColumns(array $columns): self
    {
        $self = clone $this;
        $self['columns'] = $columns;

        return $self;
    }

    /**
     * The creation date and time of the data source, represented as a string.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The unique identifier for the data source, represented as a 64-bit integer.
     */
    public function withDatasourceID(int $datasourceID): self
    {
        $self = clone $this;
        $self['datasourceID'] = $datasourceID;

        return $self;
    }

    /**
     * The name of the data source, represented as a string.
     */
    public function withDatasourceName(string $datasourceName): self
    {
        $self = clone $this;
        $self['datasourceName'] = $datasourceName;

        return $self;
    }

    /**
     * The type of the data source, which is a string with a valid value of 'FILE'.
     *
     * @param DatasourceType|value-of<DatasourceType> $datasourceType
     */
    public function withDatasourceType(
        DatasourceType|string $datasourceType
    ): self {
        $self = clone $this;
        $self['datasourceType'] = $datasourceType;

        return $self;
    }

    /**
     * The status of the last data ingestion process, represented as a string. Valid values include 'SUCCESSFUL', 'IN_PROGRESS', and 'FAILED'.
     *
     * @param LastIngestionStatus|value-of<LastIngestionStatus> $lastIngestionStatus
     */
    public function withLastIngestionStatus(
        LastIngestionStatus|string $lastIngestionStatus
    ): self {
        $self = clone $this;
        $self['lastIngestionStatus'] = $lastIngestionStatus;

        return $self;
    }
}
