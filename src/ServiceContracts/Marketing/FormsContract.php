<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Forms\FormDefinitionBase;
use HubspotSDK\Marketing\Forms\FormDisplayOptions;
use HubspotSDK\Marketing\Forms\FormListParams\FormType;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration;
use HubspotSDK\Marketing\Forms\HubSpotFormDefinition;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsExplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsImplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsNone;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type HubSpotFormConfigurationShape from \HubspotSDK\Marketing\Forms\HubSpotFormConfiguration
 * @phpstan-import-type FormDisplayOptionsShape from \HubspotSDK\Marketing\Forms\FormDisplayOptions
 * @phpstan-import-type LegalConsentOptionsShape from \HubspotSDK\Marketing\Forms\FormUpdateParams\LegalConsentOptions
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface FormsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        RequestOptions|array|null $requestOptions = null
    ): FormDefinitionBase;

    /**
     * @api
     *
     * @param string $formID the ID of the form to update
     * @param bool $archived whether this form is archived
     * @param HubSpotFormConfiguration|HubSpotFormConfigurationShape $configuration
     * @param FormDisplayOptions|FormDisplayOptionsShape $displayOptions options for styling the form
     * @param list<mixed> $fieldGroups the fields in the form, grouped in rows
     * @param LegalConsentOptionsShape $legalConsentOptions
     * @param string $name The name of the form. Expected to be unique for a hub.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        ?bool $archived = null,
        HubSpotFormConfiguration|array|null $configuration = null,
        FormDisplayOptions|array|null $displayOptions = null,
        ?array $fieldGroups = null,
        LegalConsentOptionsNone|array|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): FormDefinitionBase;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<FormType|value-of<FormType>> $formTypes the form types to be included in the results
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<HubSpotFormDefinition>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?array $formTypes = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $formID the ID of the form to archive
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $formID The unique identifier of the form
     * @param bool $archived whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $formID,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): FormDefinitionBase;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replace(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): FormDefinitionBase;
}
