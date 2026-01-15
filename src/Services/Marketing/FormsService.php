<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
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
use HubspotSDK\ServiceContracts\Marketing\FormsContract;

/**
 * @phpstan-import-type HubSpotFormConfigurationShape from \HubspotSDK\Marketing\Forms\HubSpotFormConfiguration
 * @phpstan-import-type FormDisplayOptionsShape from \HubspotSDK\Marketing\Forms\FormDisplayOptions
 * @phpstan-import-type LegalConsentOptionsShape from \HubspotSDK\Marketing\Forms\FormUpdateParams\LegalConsentOptions
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class FormsService implements FormsContract
{
    /**
     * @api
     */
    public FormsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FormsRawService($client);
    }

    /**
     * @api
     *
     * Add a new `hubspot` form
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        RequestOptions|array|null $requestOptions = null
    ): FormDefinitionBase {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update some of the form definition components
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
    ): FormDefinitionBase {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'configuration' => $configuration,
                'displayOptions' => $displayOptions,
                'fieldGroups' => $fieldGroups,
                'legalConsentOptions' => $legalConsentOptions,
                'name' => $name,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($formID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of forms based on the search filters. By default, it returns the first 20 `hubspot` forms
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
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'archived' => $archived,
                'formTypes' => $formTypes,
                'limit' => $limit,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a form definition. New submissions will not be accepted and the form definition will be permanently deleted after 3 months.
     *
     * @param string $formID the ID of the form to archive
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($formID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a form based on the form ID provided.
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
    ): FormDefinitionBase {
        $params = Util::removeNulls(['archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($formID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update all fields of a hubspot form definition.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replace(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): FormDefinitionBase {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->replace($formID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
