<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventsVolunteer Entity
 *
 * @property int $id
 * @property int $event_id
 * @property int $volunteer_id
 * @property string|null $role
 * @property string $participation_status
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\Volunteer $volunteer
 */
class EventsVolunteer extends Entity
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
        'event_id' => true,
        'volunteer_id' => true,
        'role' => true,
        'participation_status' => true,
        'created' => true,
        'modified' => true,
        'event' => true,
        'volunteer' => true,
    ];
}