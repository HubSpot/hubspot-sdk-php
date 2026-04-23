<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\DefinitionsAssociationDefinition;

/**
 * The cardinality from the destination object's perspective, either "ONE_TO_ONE" or "ONE_TO_MANY".
 */
enum InverseCardinality: string
{
    case ONE_TO_MANY = 'ONE_TO_MANY';

    case ONE_TO_ONE = 'ONE_TO_ONE';
}
