<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Forms\FieldGroup;
use HubspotSDK\Marketing\Forms\FormDisplayOptions;
use HubspotSDK\Marketing\Forms\FormReplaceParams\FormType;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration;
use HubspotSDK\Marketing\Forms\HubSpotFormDefinition;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsExplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsImplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsNone;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface FormsContract
{
    /**
     * @api
     *
     * @param mixed $formDefinitionCreateRequestBase
     *
     * @throws APIException
     */
    public function create(
        $formDefinitionCreateRequestBase,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param bool $archived whether this form is archived
     * @param HubSpotFormConfiguration $configuration
     * @param FormDisplayOptions $displayOptions options for styling the form
     * @param list<FieldGroup> $fieldGroups the fields in the form, grouped in rows
     * @param LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions
     * @param string $name The name of the form. Expected to be unique for a hub.
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
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<\HubspotSDK\Marketing\Forms\FormListParams\FormType|value-of<\HubspotSDK\Marketing\Forms\FormListParams\FormType>> $formTypes the form types to be included in the results
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<HubSpotFormDefinition>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $formTypes = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<HubSpotFormDefinition>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page;

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
     * @param bool $archived whether to return only results that have been archived
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
     * @param FormDisplayOptions $displayOptions options for styling the form
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
