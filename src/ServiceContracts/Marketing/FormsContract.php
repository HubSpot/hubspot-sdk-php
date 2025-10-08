<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Forms\CollectionResponseFormDefinitionBaseForwardPaging;
use HubspotSDK\Marketing\Forms\FieldGroup;
use HubspotSDK\Marketing\Forms\FormDisplayOptions;
use HubspotSDK\Marketing\Forms\FormReplaceParams\FormType;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsExplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsImplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsNone;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface FormsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param bool $archived
     * @param HubSpotFormConfiguration $configuration
     * @param FormDisplayOptions $displayOptions
     * @param list<FieldGroup> $fieldGroups
     * @param LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions
     * @param string $name
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        $archived = omit,
        $configuration = omit,
        $displayOptions = omit,
        $fieldGroups = omit,
        $legalConsentOptions = omit,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $formID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $after
     * @param bool $archived
     * @param list<\HubspotSDK\Marketing\Forms\FormListParams\FormType|value-of<\HubspotSDK\Marketing\Forms\FormListParams\FormType>> $formTypes
     * @param int $limit
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $formTypes = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseFormDefinitionBaseForwardPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseFormDefinitionBaseForwardPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param bool $archived
     *
     * @throws APIException
     */
    public function read(
        string $formID,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $formID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id
     * @param bool $archived
     * @param HubSpotFormConfiguration $configuration
     * @param \DateTimeInterface $createdAt
     * @param FormDisplayOptions $displayOptions
     * @param list<FieldGroup> $fieldGroups
     * @param LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions
     * @param string $name
     * @param \DateTimeInterface $updatedAt
     * @param FormType|value-of<FormType> $formType
     * @param \DateTimeInterface $archivedAt
     *
     * @throws APIException
     */
    public function replace(
        string $formID,
        $id,
        $archived,
        $configuration,
        $createdAt,
        $displayOptions,
        $fieldGroups,
        $legalConsentOptions,
        $name,
        $updatedAt,
        $formType = 'hubspot',
        $archivedAt = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function replaceRaw(
        string $formID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
