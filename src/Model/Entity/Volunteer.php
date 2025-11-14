<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Volunteer extends Entity
{
    protected array $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'phone' => true,
        'email' => true,
        'availability' => true,
        'self_intro' => true,
        'date_submitted' => true,
        'created' => true,
        'modified' => true,
        'skills' => true,
        'documents' => true,
    ];

    protected function _getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Virtual field for display in dropdowns
     */
    protected function _getDisplayName()
    {
        $skills = '';
        if (!empty($this->skills)) {
            $skillNames = [];
            foreach ($this->skills as $skill) {
                $skillNames[] = $skill->name;
            }
            $skills = ' (' . implode(', ', array_slice($skillNames, 0, 2)) . ')';
        }
        return $this->first_name . ' ' . $this->last_name . $skills;
    }
}