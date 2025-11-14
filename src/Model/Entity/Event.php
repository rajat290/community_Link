<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property int|null $partner_organisation_id
 * @property string $title
 * @property string $location
 * @property string $host
 * @property \Cake\I18n\Date $event_date
 * @property int|null $event_size
 * @property string $contact_name
 * @property string $contact_email
 * @property string|null $description
 * @property string|null $required_equipment
 * @property string|null $required_skills
 * @property int|null $required_crews
 * @property string $status
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\PartnerOrganisation $partner_organisation
 * @property \App\Model\Entity\EventsVolunteer[] $events_volunteers
 */
class Event extends Entity
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
        'partner_organisation_id' => true,
        'title' => true,
        'location' => true,
        'host' => true,
        'event_date' => true,
        'event_size' => true,
        'contact_name' => true,
        'contact_email' => true,
        'description' => true,
        'required_equipment' => true,
        'required_skills' => true,
        'required_crews' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'partner_organisation' => true,
        'events_volunteers' => true,
    ];

    /**
     * Virtual field for display in dropdowns
     */
   /**
 * Virtual field for display in dropdowns
 */
protected function _getDisplayName()
{
    $date = $this->event_date ? $this->event_date->format('d M Y') : 'No Date';
    return $this->title . ' - ' . $date . ' [' . $this->status . ']';
}
}