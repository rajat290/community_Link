<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PartnerOrganisation Entity
 *
 * @property int $id
 * @property string $business_name
 * @property string $business_address
 * @property string $contact_name
 * @property string $contact_email
 * @property string $contact_phone
 * @property string|null $industry
 * @property string|null $help_description
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Event[] $events
 */
class PartnerOrganisation extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to false, this removes all fields from
     * mass assignment. Please make sure to only include fields that
     * should be mass assigned.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'business_name' => true,
        'business_address' => true,
        'contact_name' => true,
        'contact_email' => true,
        'contact_phone' => true,
        'industry' => true,
        'help_description' => true,
        'created' => true,
        'modified' => true,
        'events' => true,
    ];

    /**
     * Virtual field for display in dropdowns
     */
  protected function _getDisplayName()
{
    $industry = $this->industry ?: 'No Industry';
    return $this->business_name . ' - ' . $industry;
}
}